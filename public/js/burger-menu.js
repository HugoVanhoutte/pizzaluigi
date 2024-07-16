let menuButton = document.querySelector("#nav-button");
let menu = document.querySelector("nav");

menuButton.addEventListener("click", function() {

    if (menu.style.display === "none") {
        menu.style.display = "flex";
    } else {
        menu.style.display = "none";
    }
})