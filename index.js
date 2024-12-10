document.addEventListener("DOMContentLoaded", () => {
    console.log("Bienvenue sur notre site !");
    const main = document.querySelector("main");
    if (main) {
        main.style.transition = "opacity 0.5s ease-in-out";
        main.style.opacity = "1";
    }
});
