import { mostrarExito,mostrarCarga, mostrarError } from "../modal-handler";
document.getElementById("formCrearClase").addEventListener("submit", async (e) => {
    e.preventDefault();

    const form = document.getElementById("formCrearClase");
    const formData = new FormData(form);
    
    try {
        mostrarCarga();
        const response = await fetch("/clases", {
            method: "POST",
            headers: {
                "X-Requested-With": "XMLHttpRequest",
                "Accept": "application/json"
            },
            body: formData
        });

        const data = await response.json();

        if(response.ok){
            mostrarExito("Clase creada correctamente. <br> Recargando...",2000, () =>  window.location.reload());
        }else{
            mostrarError( data.message || "Error creando la Clase. Contacte al administrador.");
        }
    } catch (error){
        mostrarError("Error creando Clase. Contacte al administrador.");
    }
})