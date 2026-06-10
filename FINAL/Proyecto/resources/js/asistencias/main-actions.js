import { mostrarExito, mostrarCarga, mostrarError } from "../modal-handler.js";

document.addEventListener("DOMContentLoaded",() => {
    document.getElementById("modalConfirmar").addEventListener("click",ejecutarAccionModal);
});

async function ejecutarAccionModal(){
    switch(window.modalState.action){
        case "eliminarAsistencia":
            await eliminarAsistencia(window.modalState.data.id);
            break;
        case "editarAsistencia":
            await editarAsistencia(window.modalState.data.id);
            break;
        default:
            bootstrap.Modal.getInstance(document.getElementById("modalGenerico")).hide();
            break;
    }
}

async function eliminarAsistencia(idAsistencia) {
    try {
        mostrarCarga();
        const response = await fetch(`/asistencias/${idAsistencia}`, {
             method: "DELETE",
             headers: {
                 "X-Requested-With": "XMLHttpRequest",
                 "Accept": "application/json"
             } 
            
        });
        const data = await response.json();
        if (response.ok) {
            mostrarExito(
                "Asistencia eliminada correctamente. <br> Recargando...",
                2000,
                () => window.location.reload()
            );
        } else {
            mostrarError(data.message || "Error eliminando la Asistencia. Contacte al administrador.");
        }
    } catch (error) {
        mostrarError("Error eliminando la Asistencia. Contacte al administrador.");
    }
}

async function editarAsistencia(idAsistencia) {
    const form = document.getElementById("formEditarAsistencia");
    const formData = new FormData(form);
    formData.append("_method", "PUT");

    const token = document.querySelector('meta[name="csrf-token"]').content;
    
    try {
        const response = await fetch(`/asistencias/${idAsistencia}`, {
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
            mostrarExito("Asistencia actualizada correctamente. <br> Recargando...",2000, () =>  window.location.reload());
        }else{
            mostrarError( data.message || "Error eliminando asistencia. Contacte al administrador.");
        }
    } catch {
        mostrarError( "Error al actualizar la asistencia. Contacte al administrador.");
    }
}