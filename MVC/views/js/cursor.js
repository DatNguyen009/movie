var mouseCursor = document.querySelector(".cursor");
var cursor__dot = document.querySelector(".cursor__dot");

window.addEventListener('mousemove', cursor);

function cursor(e) {
    mouseCursor.style.top = e.pageY + "px";
    mouseCursor.style.left = e.pageX + "px";
}