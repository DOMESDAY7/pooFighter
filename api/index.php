<?php
header("Access-Control-Allow-Origin: *");
require "../loadClass.php";
$data =json_decode(file_get_contents("php://input"));
// var_dump($data);
if(isset($_GET ["q"])){
    $q=$_GET["q"];
    if($q=="regene"){
           $manager = new personnageManager($db);
           $perso = new Personnage($data);
           $manager->updatePv($perso);
    }
}