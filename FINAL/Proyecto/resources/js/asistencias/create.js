import { mostrarExito,mostrarCarga, mostrarError } from "../modal-handler";
document.getElementById("formCrearAsistencia").addEventListener("submit", async (e) => {
    e.preventDefault();

    const form = document.getElementById("formCrearAsistencia");
    const formData = new FormData(form);
    
    try {
        mostrarCarga();
        const response = await fetch("/asistencias", {
            method: "POST",
            headers: {
                "X-Requested-With": "XMLHttpRequest",
                "Accept": "application/json"
            },
            body: formData
        });

        const data = await response.json();

        if(response.ok){
            mostrarExito("Asistencia registrada correctamente. <br> Recargando...",2000, () =>  window.location.reload());
        }else{
            mostrarError( data.message || "Error registrando la Asistencia. Contacte al administrador.");
        }
    } catch (error){
        mostrarError("Error registrando la Asistencia. Contacte al administrador.");
    }
});
