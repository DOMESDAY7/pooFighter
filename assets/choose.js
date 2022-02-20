let combattants1 = document.querySelectorAll(".combattant1 [data-perso]");
let combattants2 = document.querySelectorAll(".combattant2 [data-perso]");
let input1 = document.querySelector("#perso1");
let input2 = document.querySelector("#perso2");
let fightBtn = document.querySelector("#fightBtn");
let attaquant = document.querySelector(".attaquant");
let victime = document.querySelector(".victime");
let modal = document.querySelector("#modal");
let bgModal = document.querySelector("#bgModal");
let cache = document.querySelector("[role='dialog']");
let btnSlide = document.querySelector("#btnSlide");
let closeModal = document.querySelector("#closeModal");
let regenerer = document.querySelector('#regenerer');
let idRegen = document.querySelector('#idRegen');
let pvRegen = document.querySelector('#pvRegen');
let combattantRegen = document.querySelectorAll('.regenerationArea .combattant');

combattantRegen.forEach(combattant => {
    combattant.addEventListener("click", () => {
        idRegen.value = combattant.getAttribute("data-perso")
    })
});
btnSlide.addEventListener("click", showModal)
closeModal.addEventListener("click", hideModal)
regenerer.addEventListener("click", sendData)

function sendData() {
    if (isNull(pvRegen.value) == false && isNull(idRegen.value) == false) {
        let obj = {
            id: idRegen.value,
            pv: pvRegen.value
        }
        console.log(obj)
        fetch("./api/index.php", {
                headers: {
                    "Content-Type": "application/json"
                },
                method: "POST",
                body: JSON.stringify(obj)
            })
            .then(animateNumber)
            .catch((e) => {
                console.log(e)
            })
    } else {
        refuse(regenerer)
    }
}

function isNull(value) {
    if (value == "" || value == null) {
        return true
    } else {
        return false
    }
}

function animateNumber() {
    console.log("c'est bon")
}

function showModal() {
    cache.classList.toggle("hidden")
    modal.classList.toggle("translate-x-full")
    modal.classList.toggle("translate-x-0")
    bgModal.classList.toggle("opacity-100")
}

function hideModal() {
    cache.classList.toggle("hidden")
    modal.classList.toggle("translate-x-full")
    modal.classList.toggle("translate-x-0")
    bgModal.classList.toggle("opacity-100")
}
combattants1.forEach(combattant => {
    combattant.addEventListener("click", (e) => {
        document.querySelectorAll(".combattant1 .whiteBloc").forEach(element => {
            desactivate(element)
        });
        e.target.parentNode.childNodes[1].classList.toggle("top-full");
        e.target.parentNode.childNodes[1].classList.toggle("top-3/4")
        attaquant.innerHTML = combattant.getAttribute("data-name")
        input1.value = combattant.getAttribute("data-perso")
    })
});

combattants2.forEach(combattant => {
    combattant.addEventListener("click", (e) => {
        document.querySelectorAll(".combattant2 .whiteBloc").forEach(element => {
            desactivate(element)
        });
        e.target.parentNode.childNodes[1].classList.toggle("top-full");
        e.target.parentNode.childNodes[1].classList.toggle("top-3/4")
        console.log(victime)
        victime.innerHTML = combattant.getAttribute("data-name")
        input2.value = combattant.getAttribute("data-perso")
    })
});
fightBtn.addEventListener("click", () => {
    if (input1.value == "" || input2.value == "" || input1.value == input2.value) {
        refuse(fightBtn)
    } else {
        document.querySelector(".fightForm").submit()
    }

})

function refuse(el) {
    el.animate([{
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
}

function activate(el) {
    console.log(el)

    el.classList.remove("top-full")
    el.classList.add("top-3/4")
}

function desactivate(el) {
    el.classList.remove("top-3/4")
    el.classList.add("top-full")

}