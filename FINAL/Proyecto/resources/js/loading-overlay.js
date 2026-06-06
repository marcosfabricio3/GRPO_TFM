window.addEventListener("load", () => {

    const overlays = document.querySelectorAll("#loadingOverlay");

    overlays.forEach(o => {
        o.remove();
    });

});