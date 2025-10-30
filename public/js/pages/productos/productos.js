document.querySelectorAll('.solo-numeros-punto').forEach(input => {
    input.addEventListener('input', function () {
        // Permitir solo números y puntos
        this.value = this.value.replace(/[^0-9.]/g, '');

        // Eliminar puntos consecutivos (deja solo uno)
        this.value = this.value.replace(/\.{2,}/g, '.');
    });
});


//API con la cual obtengo listado de productos
fetch("api/productos")
    .then(response => response.json())
    .then(data => {

        const productos = data.data;
        const tbody = document.querySelector("#tabla-productos tbody");

        productos.forEach(p => {
            const fila = `
                        <tr>
                            <td>${p.id}</td>
                            <td>${p.nombre}</td>
                            <td>${p.precio}</td>
                            <td>${p.peso}</td>
                            <td>${p.ancho}</td>
                            <td>${p.alto}</td>
                            <td>${p.largo}</td>
                            <td>${p.stock}</td>
                            <td style="text-align: center;">
                                <a href="#" data-bs-toggle="modal" data-bs-target="#modalProductos" onClick="modal_productos(${p.id});" style="font-size: 17px; color: #e36904;"><i class="fas fa-edit"></i></a>
                            </td>
                            <td style="text-align: center;">
                                <a href="#" onClick="eliminar_productos(${p.id});" style="font-size: 17px; color: #e36904;"><i class="fas fa-trash-alt"></i></a>
                            </td>
                        </tr>
                    `;
            tbody.innerHTML += fila;
        });
    })
    .catch(err => console.error("Error al cargar productos:", err));



//API con la cual abro la modal de edición del producto
function modal_productos(id) {
    $.ajax({
        type: "GET",
        url: url_modal_productos,
        data: { idproducto: id },
        success: async function (data) {

            $("#html_modal_productos").html(data);

            try {
                const res = await fetch(`/api/productos/${id}`);
                if (!res.ok) {

                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: "No se pudo obtener el producto",
                    })

                    return false;

                }

                const p = await res.json();

                document.getElementById("txt_idproducto").value = p.id;
                document.getElementById("txt_producto").value   = p.nombre;
                document.getElementById("txt_precio").value     = p.precio;
                document.getElementById("txt_peso").value       = p.peso;
                document.getElementById("txt_ancho").value      = p.ancho;
                document.getElementById("txt_alto").value       = p.alto;
                document.getElementById("txt_largo").value      = p.largo;
                document.getElementById("txt_stock").value      = p.stock;

            } catch (e) {
                console.error("Error al cargar el producto", e);
            }
        },
        error: function () {
            alert("La sesión expiró o la carga de los datos falló");
        }
    });
}




//API con la cual actualizo el producto
async function actualizo_producto() {

    const id = document.getElementById('txt_idproducto').value;

    const datos_producto = {
        nombre: document.getElementById('txt_producto').value,
        precio: document.getElementById('txt_precio').value,
        peso:   document.getElementById('txt_peso').value,
        ancho:  document.getElementById('txt_ancho').value,
        alto:   document.getElementById('txt_alto').value,
        largo:  document.getElementById('txt_largo').value,
        stock:  document.getElementById('txt_stock').value,
    };

    try {
        const res = await fetch(`api/productos/${id}`, {
            method: 'PUT',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify(datos_producto)
        });

        if (!res.ok) {

            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: "No se pudo actualizar",
            })

            return false;

        }

        const actualizado = await res.json();

        Swal.fire({
            icon: 'success',
            title: 'Éxito',
            text: 'Producto actualizado',
        })

        location.reload();

    } catch (error) {
        console.error(error);
        alert('Error de conexión');
    }
}



async function eliminar_productos(idproducto) {

    const result = await Swal.fire({
        title: "¿Está seguro de querer eliminar el producto?",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Sí, eliminarlo",
        cancelButtonText: "Cancelar"
    });

    if (!result.isConfirmed) return;

    try {
        const res = await fetch(`api/productos/${idproducto}`, {
            method: 'DELETE'
        });

        if (!res.ok) {
            const err = await res.text();
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: err || 'No se pudo eliminar el producto',
            });
            return;
        }

        await Swal.fire({
            icon: 'success',
            title: 'Eliminado',
            text: 'El producto fue eliminado correctamente',
        });

        location.reload();

    } catch (error) {
        console.error(error);
        alert('Error de conexión');
    }
}

