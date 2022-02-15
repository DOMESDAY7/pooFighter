<?php
ob_start();
$tab = $manager->getAllPersonnage();
foreach ($tab as $value) {
    $imgPath = "./img/persoImg/" . $value->getNom() . ".png";
    if (!file_exists($imgPath)) {
        $imgPath = "./img/imgPerso/persoDefault.png";
    }
?>
    <div class="rounded-full sm:h-40 sm:w-40 h-28 w-28 border cursor-pointer overflow-hidden" data-perso=1>
        <img src=<?= $imgPath ?> alt="<?= $value->getNom() ?>">
        <div class="sm:h-40 sm:w-40 h-28 w-28 bg-white relative ease-in-out duration-300 top-full  whiteBloc"></div>
    </div>

<?php
}
$combattants = ob_get_clean(); ?>