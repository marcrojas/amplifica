<div class="modal-header" style="background-color: #454d55; color: #ffffff; border: none; padding: 1rem 1.5rem;">
    <h6 class="modal-title text-uppercase fw-bold mb-0" id="exampleModalLabel">Formulario Productos</h6>
    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
</div>
<div class="modal-body">
    <div class="card-body">

        <input type="hidden" id="txt_idproducto" name="txt_idproducto" value="">

        <div class="row g-4" style="font-size: 14px;">

            <div class="col-lg-12 col-sm-12">
                <label for="txt_producto" class="form-label" style="color: #000;">PRODUCTO(*)</label>
                <input type="text" class="form-control" id="txt_producto" name="txt_producto" placeholder="Producto" value="">
            </div>

            <div class="col-lg-2 col-sm-12">
                <label for="txt_precio" class="form-label" style="color: #000;">PRECIO(*)</label>
                <input type="text" class="form-control solo-numeros-punto" id="txt_precio" name="txt_precio" placeholder="Precio" value="">
            </div>

            <div class="col-lg-2 col-sm-12">
                <label for="txt_peso" class="form-label" style="color: #000;">PESO(*)</label>
                <input type="text" class="form-control solo-numeros-punto" id="txt_peso" name="txt_peso" placeholder="Peso" value="">
            </div>

            <div class="col-lg-2 col-sm-12">
                <label for="txt_ancho" class="form-label" style="color: #000;">ANCHO</label>
                <input type="text" class="form-control solo-numeros-punto" id="txt_ancho" name="txt_ancho" placeholder="Ancho" value="">
            </div>

            <div class="col-lg-2 col-sm-12">
                <label for="txt_alto" class="form-label" style="color: #000;">ALTO(*)</label>
                <input type="text" class="form-control solo-numeros-punto" id="txt_alto" name="txt_alto" placeholder="Alto" value="">
            </div>

            <div class="col-lg-2 col-sm-12">
                <label for="txt_largo" class="form-label" style="color: #000;">LARGO(*)</label>
                <input type="text" class="form-control solo-numeros-punto" id="txt_largo" name="txt_largo" placeholder="Largo" value="">
            </div>

            <div class="col-lg-2 col-sm-12">
                <label for="txt_stock" class="form-label" style="color: #000;">STOCK(*)</label>
                <input type="text" class="form-control solo-numeros-punto" id="txt_stock" name="txt_stock" placeholder="Stock" value="">
            </div>

        </div>

    </div>

</div>
<div class="modal-footer">
    <button type="button" class="btn btn-sm btn-danger" data-bs-dismiss="modal">Cerrar</button>
    <button type="button" class="btn btn-sm btn-success" onclick='actualizo_producto();'>Guardar</button>
</div>


<script src="{{ asset('js/pages/productos/productos.js') }}?v={{ time() }}"></script>


