<?php
if (isset($_GET["comfirmDel"])) {
    $manager->deletePersonnage($_GET["idDelete"]);
}
if (isset($_POST["subAdd"])) {
    $insertPerso = new Personnage($_POST);
    $manager->addPersonnage($insertPerso);
}
if (isset($_POST["subMod"])) {
    $modPerso = new Personnage($_POST);
    $manager->modfiyPerso($modPerso);
}
$tab = $manager->getAllPersonnage();