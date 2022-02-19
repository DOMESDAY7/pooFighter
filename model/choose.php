<?php
$tab = $manager->getAllPersonnage();
ob_start();

foreach ($tab as $value) {
    $imgPath = "./img/persoImg/" . $value->getNom() . ".png";
    if (!file_exists($imgPath)) {
        $imgPath = "./img/imgPerso/persoDefault.png";
    }
?>
    <section class="flex justify-space-between container ">
        <div class="  combattant rounded-full sm:h-40 sm:w-40 h-28 w-28 border cursor-pointer overflow-hidden relative bg-black" data-perso=<?= $value->getId() ?> data-name="<?= $value->getNom() ?>">
            <div class="sm:h-40 sm:w-40 h-28 w-28 bg-white relative ease-in-out duration-300 top-full  whiteBloc z-20"></div>
            <img src=<?= $imgPath ?> alt="<?= $value->getNom() ?>" class="absolute  z-10 top-0">
        </div>
        <section class="stat text-white ml-3 self-center justify-self-center">
            <p>pv: <?= $value->getPv() ?></p>
            <p>atk: <?= $value->getAtk() ?></p>
        </section>
    </section>

<?php
}
$combattants = ob_get_clean(); 

