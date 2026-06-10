import { mostrarExito, mostrarError, mostrarCarga } from "../modal-handler";

document.addEventListener("DOMContentLoaded",() => {
    document.getElementById("modalConfirmar").addEventListener("click",ejecutarAccionModal);
});

async function ejecutarAccionModal(){
    switch(window.modalState.action){
        case "eliminarInstructor":
            await eliminarInstructor(window.modalState.data.id);
            break;
        case "editarInstructor":
            await editarInstructor(window.modalState.data.id);
            break;
        default:
            bootstrap.Modal.getInstance(document.getElementById("modalGenerico")).hide();
            break;
    }
}

async function eliminarInstructor(id){
    const token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
    try {
        mostrarCarga();
        const response = await fetch("/instructores/"+id, {
            method: "DELETE",
            headers: {
                "X-CSRF-TOKEN": token,
                "X-Requested-With": "XMLHttpRequest",
                "Accept": "application/json"
            }
        });
        const data = await response.json();
        if(response.ok){
            mostrarExito("Instructor eliminado correctamente. <br> Recargando...",2000, () =>  window.location.reload());
        }else{
            mostrarError( data.message || "Error eliminando el instructor. Contacte al administrador.");
        }
    } catch (error){
        mostrarError("Error eliminando el instructor. Contacte al administrador.");
    }
}

async function editarInstructor(id){
    const form = document.getElementById("formEditarInstructor");

    const formData = new FormData(form);
    formData.append("_method", "PUT");

    const token = document.querySelector('meta[name="csrf-token"]').content;
    
    try {
        const response = await fetch(`/instructores/${id}`, {
            method: "POST",
            headers: {
                "X-CSRF-TOKEN": token,
                "X-Requested-With": "XMLHttpRequest",
                "Accept": "application/json"
            },
            body: formData
        });

        if(response.ok){
            mostrarExito("Instructor actualizado correctamente. <br> Recargando...",2000, () =>  window.location.reload());
        }else{
            mostrarError("Error eliminando instructor. Contacte al administrador.");
        }
    } catch {
        mostrarError( "Error al actualizar el instructor. Contacte al administrador.");
    }
}