export function CargarFormularioEditar(data) {
    document.getElementById('id_producto').value = data[1].textContent;
    document.getElementById('nombre_producto').value = data[2].textContent;
    document.getElementById('precio_producto').value = data[3].textContent;
    document.getElementById('cantidad_producto').value = data[4].textContent;
    console.log(document.getElementById('id_producto').value);
}