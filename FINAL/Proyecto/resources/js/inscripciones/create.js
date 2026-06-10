import { mostrarExito,mostrarCarga, mostrarError } from "../modal-handler";
document.getElementById("formCrearInscripcion").addEventListener("submit", async (e) => {
    e.preventDefault();

    const form = document.getElementById("formCrearInscripcion");
    const formData = new FormData(form);
    
    try {
        mostrarCarga();
        const response = await fetch("/inscripciones", {
            method: "POST",
            headers: {
                "X-Requested-With": "XMLHttpRequest",
                "Accept": "application/json"
            },
            body: formData
        });

        const data = await response.json();

        if(response.ok){
            mostrarExito("Inscripcion creada correctamente. <br> Recargando...",2000, () =>  window.location.reload());
        }else{
            mostrarError( data.message || "Error creando la Inscripcion. Contacte al administrador.");
        }
    } catch (error){
        mostrarError("Error creando Inscripcion. Contacte al administrador.");
    }
})