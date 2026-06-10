import { mostrarExito,mostrarCarga, mostrarError } from "../modal-handler";
document.getElementById("formCrearSocio").addEventListener("submit", async (e) => {
    e.preventDefault();

    const form = document.getElementById("formCrearSocio");
    const formData = new FormData(form);
    
    try {
        mostrarCarga();
        const response = await fetch("/socios", {
            method: "POST",
            headers: {
                "X-Requested-With": "XMLHttpRequest",
                "Accept": "application/json"
            },
            body: formData
        });

        const data = await response.json();

        if(response.ok){
            mostrarExito("Socio creado correctamente. <br> Recargando...",2000, () =>  window.location.reload());
        }else{
            mostrarError( data.message || "Error creando al socio. Contacte al administrador.");
        }
    } catch (error){
        mostrarError("Error creando al socio. Contacte al administrador.");
    }
});