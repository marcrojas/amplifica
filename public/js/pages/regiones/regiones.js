const regiones = json_regiones;

document.getElementById('region').addEventListener('change', function() {
    const regionSeleccionada = this.value;
    const selectComuna = document.getElementById('comuna');
    selectComuna.innerHTML = '<option value="">Seleccione comuna</option>';

    const region = regiones.find(r => r.region === regionSeleccionada);
    if (region && region.comunas) {
        region.comunas.forEach(c => {
            const opt = document.createElement('option');
            opt.value = c;
            opt.textContent = c;
            selectComuna.appendChild(opt);
        });
    }
});
