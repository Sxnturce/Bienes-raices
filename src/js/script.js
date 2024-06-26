window.addEventListener("DOMContentLoaded", () => {

    const checkbox = document.getElementById("checkbox")
    const nav_links = document.querySelector(".nav__links")
    const body = document.querySelector("body")
    const radiomail = document.getElementById("radiomail")
    const radiophone = document.getElementById("radiophone")
    const desk_checkbox = document.querySelector(".desk_checkbox")
    const mb_checkbox = document.getElementById("mb-checkbox")
    //Eventos
    checkbox.addEventListener("click", activeNav)
    window.addEventListener("scroll", scrolled)
    desk_checkbox.addEventListener("click", activeEventCheckbox)
    mb_checkbox.addEventListener("click", activeEventCheckbox)

    //Modo oscuro
    function enableDarkMode() {
        body.classList.add("dark-mode")
        desk_checkbox.checked = true
        mb_checkbox.checked = true
        localStorage.setItem("dark-mode", "enabled")
    }


    function disableDarkMode() {
        body.classList.remove("dark-mode")
        desk_checkbox.checked = false
        mb_checkbox.checked = false
        localStorage.setItem("dark-mode", "disabled")
    }

    function activeEventCheckbox() {
        if (body.classList.contains("dark-mode")) {
            disableDarkMode()
        } else {
            enableDarkMode()
        }
    }

    let preference = localStorage.getItem("dark-mode")
    if (preference === "enabled") {
        enableDarkMode();
    } else if (preference === "disabled") {
        disableDarkMode();
    } else {
        if (window.matchMedia("(prefers-color-scheme: dark)").matches) {
            enableDarkMode()
        } else {
            disableDarkMode()
        }
    }


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


function activeEye() {
    const main = document.querySelector(".main");
    const child = main.firstElementChild;

    if (child.classList.contains("login")) {
        const eye_icon = document.getElementById("icon_eye");
        const pass = document.getElementById("pass");

        eye_icon.addEventListener("click", changeIcon);

        function changeIcon() {
            if (eye_icon.classList.contains("fa-eye-slash")) {
                pass.setAttribute("type", "text");
                eye_icon.classList.replace("fa-eye-slash", "fa-eye");
            } else {
                eye_icon.classList.replace("fa-eye", "fa-eye-slash");
                pass.setAttribute("type", "password");
            }
        }
    }
}

activeEye();

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