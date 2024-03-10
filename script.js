// function changeImage() {
//     if (document.getElementById("heartVoid").src == "/images/HeartVoid.png"){
//         document.getElementById("heartVoid").src = "/images/HeartFill.png";
//     } else {
//         document.getElementById("heartVoid").src = "/images/HeartVoid.png";
//     }
// }
// const heart = document.getElementById("heartVoid");

// function changeImage(element) {
//     element.classList.add("clicked");
// }

function changeImage(element) {
    if (element.style.color == "red") {
        element.style.color = "grey"
    }
    else {
        element.style.color = "red"
    }
}