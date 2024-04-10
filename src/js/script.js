const checkbox = document.getElementById("checkbox")
const nav_links = document.querySelector(".nav__links")
const body = document.querySelector("body")

checkbox.addEventListener("click", activeNav)


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
