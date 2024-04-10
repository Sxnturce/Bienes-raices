window.addEventListener("DOMContentLoaded", () => {

    const checkbox = document.getElementById("checkbox")
    const nav_links = document.querySelector(".nav__links")
    const body = document.querySelector("body")

    //Eventos
    checkbox.addEventListener("click", activeNav)
    window.addEventListener("scroll", scrolled)



    //Funciones
    function activeNav() {
        if (checkbox.checked) {
            nav_links.style.transform = "translateX(0%)"
            body.classList.add("no-scroll")
        }
        else {
            nav_links.style.transform = ""
            body.classList.remove("no-scroll")
        }
    }


    function scrolled() {
        const header = document.querySelector(".container-header")
        const scrollposition = window.scrollY
        if (scrollposition > 100) {
            header.classList.add("header_color")
        }
        else {
            header.classList.remove("header_color")
        }
    }
})