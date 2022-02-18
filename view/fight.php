<?php
$perso1 = $_GET["perso1"];
$perso2 = $_GET["perso2"];
$renderPerso1=$manager->getInfoById($perso1);
$renderPerso2 = $manager->getInfoById($perso2);
 ?>
 <section class="grid grid-cols-3  duration-300 h-full">
     <img src="./img/persoImg/<?= $renderPerso1->getNom() ?>.png" alt="" class="ease-in-out duration-300">
     <div class="h-full bg-[#660003] flex self-center justify-center skew-x-12">
         <section class="text-white ">
             -<?= $renderPerso1->getNom() ?> lance une attaque contre <?= $renderPerso2->getNom() ?>
         </section>
     </div>
     <img src="./img/persoImg/<?= $renderPerso2->getNom() ?>.png" alt=""  style="transform:rotateY(180deg)" class="ease-in-out duration-300">
 </section>