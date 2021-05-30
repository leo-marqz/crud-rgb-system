import { cargarFormularioEditar, cargarFormularioEliminar } from './funciones.js';


const filas = document.querySelectorAll('.row');
filas.forEach((fila, indice) => {
    fila.addEventListener('click', () => {
        let data = filas[indice].children;
        cargarFormularioEditar(data);
        cargarFormularioEliminar(data);
    });
});