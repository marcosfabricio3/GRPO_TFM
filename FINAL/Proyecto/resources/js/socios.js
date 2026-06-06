import { mostrarExito, mostrarError, mostrarCarga } from "./modal-handler";

document.addEventListener("DOMContentLoaded",() => {
    document.getElementById("modalConfirmar").addEventListener("click",ejecutarAccionModal);
});

async function ejecutarAccionModal(){
    switch(window.modalState.action){
        case "eliminarSocio":
            await eliminarSocio(window.modalState.data.id);
            break;

        case "editarSocio":
            await editarSocio(window.modalState.data.id);
            break;

        default:
            bootstrap.Modal.getInstance(document.getElementById("modalGenerico")).hide();
            break;
    }
}

async function eliminarSocio(id) {
    const token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
    try {
        mostrarCarga();
        const response = await fetch(`/socios/${id}`, {
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
                "Socio eliminado correctamente. <br> Recargando...",
                2000,
                () =>  window.location.reload());
        }else {
            mostrarError( data.message || "Error eliminando socio. Contacte al administrador.");
        }


    } catch(error){
        mostrarError("Error eliminando socio. Contacte al administrador.");
    }
}

async function editarSocio(id) {
    const form = document.getElementById("formEditarSocio");

    const formData = new FormData(form);
    formData.append("_method", "PUT");

    const token = document.querySelector('meta[name="csrf-token"]').content;
    
    try {
        const response = await fetch(`/socios/${id}`, {
            method: "POST",
            headers: {
                "X-CSRF-TOKEN": token,
                "X-Requested-With": "XMLHttpRequest",
                "Accept": "application/json"
            },
            body: formData
        });

        if(response.ok){
            mostrarExito("Socio actualizado correctamente. <br> Recargando...",2000, () =>  window.location.reload());
        }else{
            mostrarError("Error eliminando socio. Contacte al administrador.");
        }
    } catch {
        mostrarError( "Error al actualizar el socio. Contacte al administrador.");
    }
}