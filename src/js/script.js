const checkbox = document.getElementById("checkbox")
const nav_links = document.querySelector(".nav__links")


checkbox.addEventListener("click", activeNav)


function activeNav() {
    if (checkbox.checked) {
        nav_links.style.transform = "translateX(0%)"

    }
    else {
        nav_links.style.transform = ""
    }
}