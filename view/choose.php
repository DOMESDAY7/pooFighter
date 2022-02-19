<main class="w-full">
    <h1 class="text-center text-5xl text-[#fddb22] mt-10">choisir vos combattants</h1>





    <section class="grid grid-cols-3 w-3/4 sm:w-1/4  m-auto mt-10 border border-4 rounded p-3 bg-[#660003] sticky top-10 z-30">
        <div class="attaquant text-white justify-self-center self-center"></div>
        <section class="justify-self-center self-center text-3xl text-[#fddb22] ">
            attaque
        </section>
        <div class="victime text-white justify-self-center self-center"></div>
    </section>
    <button type="button" class="text-center  block m-auto mt-10 sticky top-32 border border-black rounded text-[#fddb22] p-3 bg-[#e42e19] shinyBtn custom-btn z-30" id="fightBtn" style="width:200px">comfirmer le combat</button>
    <button type="button" class="text-center  block m-auto mt-10  border border-black rounded text-[#fddb22] p-3 bg-[#e42e19] shinyBtn custom-btn z-30 sticky top-[24%]" id="btnSlide" style="width:200px">regenerer un personnage</button>

    <div class="flex flex-col justify-center self-center mt-10 sm:flex-row relative containerAll">
        <section class="sm:border-r sm:border-8 border-white sm:border-none border-b  grid grid-cols-3 grid-rows-3 gap-2  w-full sm:w-2/5 max-h-full p-5 combattant1">

            <?= $combattants ?>

        </section>
        <section class=" sm:border-l-8 border-dashed  grid grid-cols-3 grid-rows-3 gap-2  w-full sm:w-2/5 mt-20 sm:mt-0 max-h-full p-5 combattant2">
            <?= $combattants ?>


        </section>

    </div>
</main>
<img src="./img/logo.svg" class="fixed top-1/4 left-1/4 translate -z-10 w-1/2">

<div class="fixed inset-0 overflow-hidden z-40 hidden " aria-labelledby="slide-over-title" role="dialog" aria-modal="true">
    <div class="absolute inset-0 overflow-hidden">
        <!--
      Background overlay, show/hide based on slide-over state.

      Entering: "ease-in-out duration-500"
        From: "opacity-0"
        To: "opacity-100"
      Leaving: "ease-in-out duration-500"
        From: "opacity-100"
        To: "opacity-0"
    -->
        <div class="absolute inset-0 bg-gray-500 bg-opacity-75 transition-opacity ease-in-out duration-500 opacity-0" aria-hidden="true" id=bgModal></div>
        <div class="fixed inset-y-0 right-0 pl-10 max-w-full flex ">
            <!--
        Slide-over panel, show/hide based on slide-over state.

        Entering: "transform transition ease-in-out duration-500 sm:duration-700"
          From: "translate-x-full"
          To: "translate-x-0"
        Leaving: "transform transition ease-in-out duration-500 sm:duration-700"
          From: "translate-x-0"
          To: "translate-x-full"
      -->
            <div class="relative w-screen max-w-md ">
                <!--
          Close button, show/hide based on slide-over state.

          Entering: "ease-in-out duration-500"
            From: "opacity-0"
            To: "opacity-100"
          Leaving: "ease-in-out duration-500"
            From: "opacity-100"
            To: "opacity-0"
        -->
                <div class="absolute top-0 left-0 -ml-8 pt-4 pr-2 flex sm:-ml-10 sm:pr-4">
                    <button type="button" class="rounded-md text-gray-300 hover:text-white focus:outline-none focus:ring-2 focus:ring-white" id=closeModal>
                        <span class="sr-only">Close panel</span>
                        
                        <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>

                <div class="h-full flex flex-col py-6 bg-[#660003] shadow-xl transform ease-in-out duration-500 sm:duration-700 translate-x-full  border-l-8 border-[#fddb22]" id="modal"> 
                    <!-- la -->
                    <div class="px-4 sm:px-6">
                        <h2 class="text-lg font-medium text-[#fddb22] text-center" id="slide-over-title">regeneration de personnage</h2>
                    </div>
                    <div class="mt-6 relative flex-1 px-4 sm:px-6">
                       
                        <div class="absolute inset-0 px-4 sm:px-6">
                            <div class=" gap-4 regenerationArea grid grid-cols-2" aria-hidden="true">
                                <?= $combattants ?>
                            </div>
                            <br>
                            <form method="POST" class=" text-center flex flex-col self-center justify-center ">

                                <input type="number" name="pv" placeholder="point de vie a regenerer" class="border rounded mb-5 p-3 outline  text-center outline-4" min="0" id=pvRegen><br>
                                <input type="number" id="idRegen">
                                <button type="button" class="text-center  block mt-10  border border-black rounded text-[#fddb22] p-3 bg-[#e42e19] shinyBtn custom-btn justify-center self-center" id="regenerer" style="width:200px; margin:unset">regenerer un personnage</button>

                            </form>
                        </div>
                       
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<form mehtod="GET" class="fightForm">
    <input type="text" name="page" value="fight" class="hidden">
    <input type="number" id=perso1 placeholder="perso1" name="perso1" class="hidden"><br>
    <input type="number" id=perso2 placeholder="perso2" name="perso2" class="hidden">

</form>
<script src="./assets/choose.js"></script>