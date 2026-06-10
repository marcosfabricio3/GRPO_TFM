import { mostrarExito, mostrarCarga, mostrarError } from "../modal-handler.js";

document.addEventListener("DOMContentLoaded",() => {
    document.getElementById("modalConfirmar").addEventListener("click",ejecutarAccionModal);
});

async function ejecutarAccionModal(){
    switch(window.modalState.action){
        case "eliminarClase":
            await eliminarClase(window.modalState.data.id);
            break;
        case "editarClase":
            await editarClase(window.modalState.data.id);
            break;
        default:
            bootstrap.Modal.getInstance(document.getElementById("modalGenerico")).hide();
            break;
    }
}

async function eliminarClase(idClase){
    try{
        mostrarCarga();
        const response = await fetch(`/clases/${idClase}`, {
            method: "DELETE",
            headers: {
                "X-Requested-With": "XMLHttpRequest",
                "Accept": "application/json"
            }
        });
        const data = await response.json();
        if(response.ok){
            mostrarExito("Clase eliminada correctamente. <br> Recargando...",2000, () =>  window.location.reload());
        }else{
            mostrarError( data.message || "Error eliminando la Clase. Contacte al administrador.");
        }
    } catch (error){
        mostrarError("Error eliminando la Clase. Contacte al administrador.");
    }
}
async function editarClase(idClase){
    const form = document.getElementById("formEditarClase");
    const formData = new FormData(form);
    formData.append("_method", "PUT");

    const token = document.querySelector('meta[name="csrf-token"]').content;
    
    try{
        const response = await fetch(`/clases/${idClase}`, {
            method: "POST",
            headers: {
                "X-CSRF-TOKEN": token,
                "X-Requested-With": "XMLHttpRequest",
                "Accept": "application/json"
            },
            body: formData
        });
        const data = await response.json();
        if(response.ok){
            mostrarExito("Clase editada correctamente. <br> Recargando...",2000, () =>  window.location.reload());
        }else{
            mostrarError( data.message || "Error editando la Clase. Contacte al administrador.");
        }
    } catch (error){
        mostrarError("Error editando la Clase. Contacte al administrador.");
    }
}
