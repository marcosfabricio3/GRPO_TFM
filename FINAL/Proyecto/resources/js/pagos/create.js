import { mostrarExito,mostrarCarga, mostrarError } from "../modal-handler";

document.getElementById("formCrearPago").addEventListener("submit", async (e) => {
    e.preventDefault();

    const form = document.getElementById("formCrearPago");
    const formData = new FormData(form);
    
    try {
        mostrarCarga();
        const response = await fetch("/pagos", {
            method: "POST",
            headers: {
                "X-Requested-With": "XMLHttpRequest",
                "Accept": "application/json"
            },
            body: formData
        });

        const data = await response.json();

        if(response.ok){
            mostrarExito("Pago registrado correctamente. <br> Recargando...",2000, () =>  window.location.reload());
        }else{
            mostrarError( data.message || "Error registrando el Pago. Contacte al administrador.");
        }
    } catch (error){
        mostrarError("Error registrando el Pago. Contacte al administrador.");
    }
});