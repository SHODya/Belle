// function changeImage() {
//     if (document.getElementById("heartVoid").src == "/images/HeartVoid.png"){
//         document.getElementById("heartVoid").src = "/images/HeartFill.png";
//     } else {
//         document.getElementById("heartVoid").src = "/images/HeartVoid.png";
//     }
// }
// const heart = document.getElementById("heartVoid");

function changeImage(element) {
    element.classList.add("clicked");
}