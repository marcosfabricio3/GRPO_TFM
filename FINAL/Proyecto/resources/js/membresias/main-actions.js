import { mostrarExito, mostrarError, mostrarCarga } from "../modal-handler";

document.addEventListener("DOMContentLoaded",() => {
    document.getElementById("modalConfirmar").addEventListener("click",ejecutarAccionModal);
});

async function ejecutarAccionModal(){
    switch(window.modalState.action){
        case "eliminarMembresia":
            await eliminarMembresia(window.modalState.data.id);
            break;

        case "editarMembresia":
            await editarMembresia(window.modalState.data.id);
            break;

        default:
            bootstrap.Modal.getInstance(document.getElementById("modalGenerico")).hide();
            break;
    }
}

async function eliminarMembresia(id){
    const token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
    try {
        mostrarCarga();
        const response = await fetch(`/membresias/${id}`, {
            method: "DELETE",
            headers: {
                "X-CSRF-TOKEN": token,
                "X-Requested-With": "XMLHttpRequest",
                "Accept":"application/json"
            }
        });

        const data = await response.json();

        if (response.ok) {
            mostrarExito(
                "Membresia eliminada correctamente. <br> Recargando...",
                2000,
                () =>  window.location.reload());
        }else {
            mostrarError( data.message || "Error eliminando membresia. Contacte al administrador.");
        }
    } catch(error){
        mostrarError("Error eliminando membresia. Contacte al administrador.");
    }
}

async function editarMembresia(id){
    const form = document.getElementById("formEditarMembresia");

    const formData = new FormData(form);
    formData.append("_method", "PUT");

    const token = document.querySelector('meta[name="csrf-token"]').content;
    
    try {
        const response = await fetch(`/membresias/${id}`, {
            method: "POST",
            headers: {
                "X-CSRF-TOKEN": token,
                "X-Requested-With": "XMLHttpRequest",
                "Accept": "application/json"
            },
            body: formData
        });

        if(response.ok){
            mostrarExito("Membresia actualizado correctamente. <br> Recargando...",2000, () =>  window.location.reload());
        }else{
            mostrarError("Error eliminando membresia. Contacte al administrador.");
        }
    } catch {
        mostrarError( "Error al actualizar la membresia. Contacte al administrador.");
    }
}
