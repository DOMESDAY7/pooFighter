<main class="w-full">
    <h1 class="text-center text-5xl text-[#fddb22] mt-10">choisir vos combattants</h1>
    <button type="button" class="text-center  block m-auto mt-10 sticky top-10 border border-black rounded text-[#fddb22] p-3 bg-[#e42e19] shinyBtn custom-btn" id="fightBtn">comfirmer</button>

    <section class="grid grid-cols-3 w-1/2 sm:w1/4  m-auto mt-10 border border-4 rounded p-3 ">
        <div class="attaquant text-white justify-self-center self-center"></div>
        <section class="justify-self-center self-center text-3xl ">
            attaque
        </section>
        <div class="victime text-white justify-self-center self-center"></div>
    </section>

    <div class="flex flex-col justify-center self-center mt-10 sm:flex-row  ">
        <section class="sm:border-r sm:border-8 border-white sm:border-none border-b  grid grid-cols-3 grid-rows-3 gap-2  w-full sm:w-2/5 max-h-full p-5 combattant1">

            <?= $combattants ?>

        </section>
        <section class=" sm:border-l-8  grid grid-cols-3 grid-rows-3 gap-2  w-full sm:w-2/5 mt-20 sm:mt-0 max-h-full p-5 combattant2">
            <?= $combattants ?>


        </section>
    </div>
</main>
<img src="./img/logo.svg" class="fixed top-1/4 left-1/4 translate -z-10 w-1/2">
<form mehtod="GET" class="fightForm">
    <input type="text" name="page" value="fight" class="hidden">
    <input type="number" id=perso1 placeholder="perso1" name="perso1" class="hidden"><br>
    <input type="number" id=perso2 placeholder="perso2" name="perso2" class="hidden">

</form>
<script src="./assets/choose.js"></script>