 <section class="grid grid-cols-3  duration-300 h-full">
     <img src="./img/persoImg/<?= $attaquant->getNom() ?>.png" alt="" class="ease-in-out duration-300 w-3/4 justify-self-center">
     <section class="h-full bg-[#660003] flex self-center justify-center skew-x-[-6deg] border-x-8 border-[#fddb22]">
         <div class="text-white  self-center justify-self-center text-2xl skew-x-[6deg] w-3/4  text-center ">
             <span class="text-center">-<i><?= $attaquant->getNom() ?></i> lance une attaque contre <i><?= $victime->getNom() ?></i></span>-<br><br>
             <?php echo $attaquant->attaque($victime,$db); ?>
         </div>
     </section>
     <img src="./img/persoImg/<?= $victime->getNom() ?>.png" alt=""  style="transform:rotateY(180deg)" class="ease-in-out duration-300 w-3/4 justify-self-center">
 </section>