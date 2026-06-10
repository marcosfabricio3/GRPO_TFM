import { mostrarExito,mostrarCarga, mostrarError } from "../modal-handler";
document.getElementById("formCrearMembresia").addEventListener("submit", async (e) => {
    e.preventDefault();

    const form = document.getElementById("formCrearMembresia");
    const formData = new FormData(form);
    
    try {
        mostrarCarga();
        const response = await fetch("/membresias", {
            method: "POST",
            headers: {
                "X-Requested-With": "XMLHttpRequest",
                "Accept": "application/json"
            },
            body: formData
        });

        const data = await response.json();

        if(response.ok){
            mostrarExito("Membresía registrada correctamente. <br> Recargando...",2000, () =>  window.location.reload());
        }else{
            mostrarError( data.message || "Error creando la Membresía. Contacte al administrador.");
        }
    } catch (error){
        mostrarError("Error creando Membresía. Contacte al administrador.");
    }
});