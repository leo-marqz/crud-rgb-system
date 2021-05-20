export function cargarFormularioEditar(data) {
    let id = document.getElementById('id_producto').value = data[1].textContent;
    let producto = document.getElementById('nombre_producto').value = data[2].textContent;
    let cantidades = document.getElementById('cantidad_producto').value = data[3].textContent;
    let precio = document.getElementById('precio_producto').value = data[4].textContent.slice(1);
    console.log(id)
}