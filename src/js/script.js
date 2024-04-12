window.addEventListener("DOMContentLoaded", () => {

    const checkbox = document.getElementById("checkbox")
    const nav_links = document.querySelector(".nav__links")
    const body = document.querySelector("body")
    const radiomail = document.getElementById("radiomail")
    const radiophone = document.getElementById("radiophone")


    //Eventos
    checkbox.addEventListener("click", activeNav)
    window.addEventListener("scroll", scrolled)

    //Activar nav
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

    //Cambia el color del header
    function scrolled() {
        const header_node = document.querySelector(".header")
        const header = document.querySelector(".container-header")
        const child = header_node.firstElementChild
        const scrollposition = window.scrollY

        switch (child.classList.contains("container-header")) {
            case true:
                if (scrollposition > 0) {
                    header.classList.add("header_color")
                } else {
                    header.classList.remove("header_color")
                }
                break
            case false:
                break
        }
    }
})

//Checkbox contacto
function activeEventCheckbox() {
    const main = document.querySelector(".main");
    const child = main.firstElementChild;

    if (child.classList.contains("contacto")) {
        radiomail.addEventListener("click", detectInput)
        radiophone.addEventListener("click", detectInput)
        //Detectar input
        function detectInput(e) {
            if (e.target.classList.contains("radiomail")) {
                disabledInput();
                return
            } activeInput()
        }
        return
    }

    function disabledInput() {
        document.getElementById("fechahora").disabled = true
        document.getElementById("fechadate").disabled = true
    }

    function activeInput() {
        document.getElementById("fechahora").disabled = false
        document.getElementById("fechadate").disabled = false
    }
}

activeEventCheckbox();