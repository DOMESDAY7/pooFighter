let combattants1 = document.querySelectorAll(".combattant1>[data-perso]");
let combattants2 = document.querySelectorAll(".combattant2>[data-perso]");
let input1 = document.querySelector("#perso1")
let input2 = document.querySelector("#perso2")
let fightBtn = document.querySelector("#fightBtn")
combattants1.forEach(combattant => {
    combattant.addEventListener("click", (e) => {
        // combattant.id
        document.querySelectorAll(".combattant1 .whiteBloc").forEach(element => {
            desactivate(element)
        });
        activate(e.target.childNodes[1])




        input1.value = combattant.getAttribute("data-perso")
    })
});

combattants2.forEach(combattant => {
    combattant.addEventListener("click", (e) => {
        document.querySelectorAll(".combattant2 .whiteBloc").forEach(element => {
            desactivate(element)
        });
        e.target.childNodes[1].classList.toggle("top-full");
        e.target.childNodes[1].classList.toggle("top-3/4")
        input2.value = combattant.getAttribute("data-perso")
    })
});
fightBtn.addEventListener("click", () => {
    if (input1.value == "" || input2.value == "") {
        fightBtn.animate([{
                transform: "translateX(0px)"
            },
            {
                transform: "translateX(10px)"
            },
            {
                transform: " translateX(-10px) "
            },
            {
                transform: "translateX(0px)"
            },
        ], 500)
    } else {
        document.querySelector(".fightForm").submit()
    }

})

function activate(el) {

    el.classList.remove("top-full")
    el.classList.add("top-3/4")
}

function desactivate(el) {
    el.classList.remove("top-3/4")
    el.classList.add("top-full")

}