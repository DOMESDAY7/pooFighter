let combattants1 = document.querySelectorAll(".combattant1>[data-perso]");
let combattants2 = document.querySelectorAll(".combattant2>[data-perso]");
let input1 = document.querySelector("#perso1")
let input2 = document.querySelector("#perso2")

combattants1.forEach(combattant => {
    combattant.addEventListener("click",()=>{
    console.log("click")
        input1.value=combattant.getAttribute("data-perso")
    })
});

combattants2.forEach(combattant => {
    combattant.addEventListener("click",()=>{
    console.log("click")
        input2.value=combattant.getAttribute("data-perso")
    })
});

