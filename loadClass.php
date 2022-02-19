<?php
function chargerClasse($classe)
{
    require  $classe . '.php';
}
spl_autoload_register('chargerClasse');
$db = new PDO('mysql:host=localhost;dbname=poo_sgbd', 'root', '', array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));