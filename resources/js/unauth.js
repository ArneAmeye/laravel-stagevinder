let btnInternship = document.querySelectorAll(".preview__inner--unauth");
let popup = document.querySelector(".popup__unauth--container");

btnInternship.forEach((internship) => {
    internship.onclick = () => {
        popup.style.display = "block";
    };
});


