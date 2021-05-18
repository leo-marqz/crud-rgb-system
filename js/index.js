import { CargarFormularioEditar } from './modulo.js';


const filas = document.querySelectorAll('.row');
filas.forEach((row, index) => {
    row.addEventListener('click', () => {
        let nodos = filas[index].children;
        CargarFormularioEditar(nodos)
    });
})