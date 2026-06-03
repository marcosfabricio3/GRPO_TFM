document.addEventListener("DOMContentLoaded", () => {
    const savedTheme = localStorage.getItem("theme");

    if (savedTheme) {
        document.documentElement.setAttribute("data-bs-theme",savedTheme);
    } else {
        const prefersDark = window.matchMedia("(prefers-color-scheme: dark)").matches;
        document.documentElement.setAttribute("data-bs-theme", prefersDark ? "dark" : "light");
        const navBar = document.querySelector('.navbar');
        if (navBar){
            navBar.classList.toggle('bg-dark', prefersDark);
            navBar.classList.toggle('bg-light', !prefersDark);
        }
    }

    const toggleSwitch = document.querySelector('#themeSwitch');
    if (toggleSwitch){
     
    

    document.getElementById('themeSwitch').addEventListener('click', () => {
        const html = document.documentElement;
        const currentTheme = html.getAttribute('data-bs-theme');
        html.setAttribute('data-bs-theme', currentTheme === 'light' ? 'dark' : 'light');

        const navBar = document.querySelector('.navbar');
        if (!navBar){
            return;
        }
        navBar.classList.toggle('bg-dark', html.getAttribute('data-bs-theme') === 'dark');
        navBar.classList.toggle('bg-light', html.getAttribute('data-bs-theme') === 'light');

    });

    }
});