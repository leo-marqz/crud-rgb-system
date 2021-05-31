import { cargarFormularioEditar, cargarFormularioEliminar } from './funciones.js';


const filas = document.querySelectorAll('.row');
filas.forEach((fila, indice) => {
    fila.addEventListener('click', () => {
        let data = filas[indice].children;
        if(data.length == 1){
            console.log("No hay datos que cargar al formulario editar producto");
        }else{
            cargarFormularioEditar(data);
            cargarFormularioEliminar(data);
        }
    });
});