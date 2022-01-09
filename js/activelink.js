let links = document.getElementsByClassName("theme_link");
let url = window.location.href;
for (let i = 0; i < 7; i++) {
    if (url.charAt(url.length - 1) == i) {
        links[i].classList.add("active");
        break;
    }
}