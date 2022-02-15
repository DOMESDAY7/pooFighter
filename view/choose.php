<main class="w-full">
    <h1 class="text-center text-5xl text-[#fddb22] mt-10">choisir vos combattants</h1>
    <button type="button" class="text-center  block m-auto mt-10 sticky top-10 border border-black rounded text-[#fddb22] p-3 bg-[#e42e19] shinyBtn custom-btn" id="fightBtn">comfirmer</button>
    <div class="flex flex-col justify-center self-center mt-10 sm:flex-row  ">
        <section class="sm:border-r sm:border-none border-b  grid grid-cols-3 grid-rows-3 gap-2  w-full sm:w-2/5 max-h-full p-5 combattant1">
            
            <?= $combattants ?>

        </section>
        <section class="sm:border-l  grid grid-cols-3 grid-rows-3 gap-2  w-full sm:w-2/5 mt-20 sm:mt-0 max-h-full p-5 combattant2">
           <?= $combattants ?>

        </section>
    </div>
</main>
<img src="./img/logo.svg" class="fixed top-1/4 left-1/4 translate -z-10 w-1/2">
<form mehtod="GET" action="?page=fight" class="fightForm">
    <input type="number" id=perso1 placeholder="perso1" name="perso1" class="hidden"><br>
    <input type="number" id=perso2 placeholder="perso2" name="perso2" class="hidden">
    
</form>
<script src="./assets/choose.js"></script>