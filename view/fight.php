<?php
$perso1 = $_GET["perso1"];
$perso2 = $_GET["perso2"];
$renderPerso1=$manager->getInfoById($perso1);
$renderPerso2 = $manager->getInfoById($perso2);
 ?>
 <section class="flex">
     <img src="./img/persoImg/<?= $renderPerso1->getNom() ?>.png" alt="">
     <img src="./img/persoImg/<?= $renderPerso2->getNom() ?>.png" alt=""  class="scale-[-1] ">
 </section>