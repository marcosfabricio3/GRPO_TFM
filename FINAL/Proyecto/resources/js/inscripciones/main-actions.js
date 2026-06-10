import { mostrarExito, mostrarCarga, mostrarError } from "../modal-handler.js";

document.addEventListener("DOMContentLoaded",() => {
    document.getElementById("modalConfirmar").addEventListener("click",ejecutarAccionModal);
});

async function ejecutarAccionModal(){
    switch(window.modalState.action){
        case "eliminarInscripcion":
            await eliminarInscripcion(window.modalState.data.id);
            break;
        case "editarInscripcion":
            await editarInscripcion(window.modalState.data.id);
            break;
        default:
            bootstrap.Modal.getInstance(document.getElementById("modalGenerico")).hide();
            break;
    }
}

async function eliminarInscripcion(idInscripcion) {
    try {
        mostrarCarga();
        const response = await fetch(`/inscripciones/${idInscripcion}`, {
            method: "DELETE",
            headers: {
                "X-Requested-With": "XMLHttpRequest",
                "Accept": "application/json"
            }
        });
        const data = await response.json();
        if (response.ok) {
            mostrarExito(
                "Inscripcion eliminada correctamente. <br> Recargando...",
                2000,
                () => window.location.reload()
            );
        } else {
            mostrarError(data.message || "Error eliminando Inscripcion. Contacte al administrador.");
        }
    } catch (error) {
        mostrarError("Error eliminando Inscripcion. Contacte al administrador.");
    }
}

async function editarInscripcion(idInscripcion) {
    const form = document.getElementById("formEditarInscripcion");

    const formData = new FormData(form);
    formData.append("_method", "PUT");

    const token = document.querySelector('meta[name="csrf-token"]').content;

    try {
        const response = await fetch(`/inscripciones/${idInscripcion}`, {
            method: "POST",
            headers: {
                "X-CSRF-TOKEN": token,
                "X-Requested-With": "XMLHttpRequest",
                "Accept": "application/json"
            },
            body: formData
        });
        const data = await response.json();
        if (response.ok) {
            mostrarExito("Inscripcion editada correctamente. <br> Recargando...", 2000, () => window.location.reload());
        } else {
            mostrarError(data.message || "Error editando Inscripcion. Contacte al administrador.");
        }
    } catch (error) {
        mostrarError("Error editando Inscripcion. Contacte al administrador.");
    }
}