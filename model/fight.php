<?php
$perso1 = $_GET["perso1"];
$perso2 = $_GET["perso2"];
$attaquant=$manager->getInfoById($perso1);
$victime = $manager->getInfoById($perso2);
