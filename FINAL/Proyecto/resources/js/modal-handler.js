import * as bootstrap from 'bootstrap';
window.bootstrap = bootstrap;

window.modalState = {
    action: null,
    data: null
};

const confirmMessage = `<div class="alert alert-danger text-center" role="alert">¿Estas seguro de realizar esta accion? <br> Esta accion no se puede deshacer</div>`

document.addEventListener("DOMContentLoaded", () => {
    document.addEventListener("click",async (e) => {
        const btn = e.target.closest(".abrir-modal");
        if (!btn) return;

        const title = btn.dataset.title || "Información";
        const url = btn.dataset.url;
        const action = btn.dataset.action || "";
        const confirmText = btn.dataset.confirmText || "Confirmar";
        
        document.getElementById("modalTitulo").innerText = title;
        document.getElementById("modalConfirmar").innerText = confirmText;
        document.getElementById("modalCancelarBtn").innerText = "Cancelar";
        document.getElementById("modalConfirmar").hidden = false;
        document.getElementById("modalCancelarBtn").hidden = false;
        
        window.modalState.action = action;
        window.modalState.data = btn.dataset;
         
        try {
            const response = await fetch(url);
            const html = await response.text();
            if (btn.dataset.action.startsWith("eliminar")) {
                document.getElementById("modalContenido").innerHTML = confirmMessage + html
            } else {
                document.getElementById("modalContenido").innerHTML = html
            }
        } catch {
            document.getElementById("modalContenido").innerHTML = "Error cargando datos.";
        }

        bootstrap.Modal.getOrCreateInstance(document.getElementById("modalGenerico")).show();
    });
});

export function mostrarExito(mensaje, callbackTime, callback = null) {
    document.getElementById("modalCancelarBtn").hidden = true;

    const btn = document.getElementById("modalConfirmar");
    btn.innerText = "Aceptar";
    btn.replaceWith(btn.cloneNode(true));
    
    const nuevoBtn = document.getElementById("modalConfirmar");
    
    if(callback){
        nuevoBtn.addEventListener("click", callback);
    }

    document.getElementById("modalContenido").innerHTML = `
        <div class="alert alert-success text-center">
            ${mensaje}
        </div>
    `;

    if( callbackTime ){
        setTimeout(() => {
            bootstrap.Modal.getOrCreateInstance(document.getElementById("modalGenerico")).hide();
            callback();
        }, callbackTime);
    }
}

export function mostrarError(mensaje) {

    document.getElementById("modalConfirmar").hidden = true;

    document.getElementById("modalCancelarBtn").innerText = "Cerrar";

    document.getElementById("modalContenido").innerHTML = `
        <div class="alert alert-danger text-center">
            ${mensaje}
        </div>
    `;
}

export function mostrarCarga(){
    document.getElementById("modalContenido").innerHTML = `
        <div class="text-center p-4">
            <div class="spinner-border" role="status"></div>
            <div class="mt-2">
                Cargando información...
            </div>
        </div>
        `;
    bootstrap.Modal.getOrCreateInstance(document.getElementById("modalGenerico")).show();
} 