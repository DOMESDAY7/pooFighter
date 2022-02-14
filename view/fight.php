<main class="w-full">
    <h1 class="text-center text-5xl text-[#fddb22] mt-10">choisir vos combatants</h1>
    <div class="flex flex-col justify-center self-center mt-10 sm:flex-row  ">
        <section class="sm:border-r sm:border-none border-b  grid grid-cols-3 grid-rows-3 gap-2  w-full sm:w-2/5 max-h-full p-5 combattant1">
            <div class="rounded-full sm:h-40 sm:w-40 h-28 w-28 border cursor-pointer" data-perso=1></div>
            <div class="rounded-full sm:h-40 sm:w-40 h-28 w-28 border" data-perso=2></div>
            <div class="rounded-full sm:h-40 sm:w-40 h-28 w-28 border" data-perso=3></div>
            <div class="rounded-full sm:h-40 sm:w-40 h-28 w-28 border" data-perso=4></div>
            <div class="rounded-full sm:h-40 sm:w-40 h-28 w-28 border" data-perso=5></div>
            <div class="rounded-full sm:h-40 sm:w-40 h-28 w-28 border" data-perso=6></div>
            <div class="rounded-full sm:h-40 sm:w-40 h-28 w-28 border" data-perso=7></div>
            <div class="rounded-full sm:h-40 sm:w-40 h-28 w-28 border" data-perso=8></div>
            <div class="rounded-full sm:h-40 sm:w-40 h-28 w-28 border" data-perso=9></div>
            
        </section>
        <section class="sm:border-l  grid grid-cols-3 grid-rows-3 gap-2  w-full sm:w-2/5 mt-20 sm:mt-0 max-h-full p-5 combattant2">
            <div class="rounded-full sm:h-40 sm:w-40 h-28 w-28 border" data-perso=1></div>
            <div class="rounded-full sm:h-40 sm:w-40 h-28 w-28 border" data-perso=2></div>
            <div class="rounded-full sm:h-40 sm:w-40 h-28 w-28 border" data-perso=3></div>
            <div class="rounded-full sm:h-40 sm:w-40 h-28 w-28 border" data-perso=4></div>
            <div class="rounded-full sm:h-40 sm:w-40 h-28 w-28 border" data-perso=5></div>
        </section>
    </div>
</main>
<img src="./img/logo.svg" class="fixed top-1/4 left-1/4 translate -z-10 w-1/2">
<form mehtod="GET">
    <input type="number" id=perso1 placeholder="perso1"><br>
    <input type="number" id=perso2 placeholder="perso2">
    <button type="submit" class="border border-black rounded text-[#fddb22] p-3 bg-[#e42e19] shinyBtn custom-btn" >comfirmer</button>
</form>
<script src="./assets/choose.js"></script>