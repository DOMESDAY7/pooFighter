<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Projet</title>
    <link rel="stylesheet" href="./assets/button.css">
    <script src="./assets/3.0.18"></script>
    <script>
        tailwind.config = {
            theme: {
                fontFamily: {
                    'sans': ["incredible"]
                }
            }
        }
    </script>
    <link rel="shortcut icon" href="./img/logo.svg" type="image/x-icon">
</head>

<body style="background: radial-gradient(circle, rgba(243,108,3,1) 0%, rgba(228,46,25,1) 32%, rgba(0,0,0,1) 100%); background-repeat: no-repeat; background-attachment:fixed" class="h-screen" >
    <?php
    function chargerClasse($classe)
    {
        require  $classe . '.php';
    }
    spl_autoload_register('chargerClasse');
    $db = new PDO('mysql:host=localhost;dbname=poo_sgbd', 'root', '', array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
    $manager = new personnageManager($db);
    if (isset($_GET["page"])) {
        $page = $_GET["page"];
        $path =  "./view/" . $page . ".php";
        if (file_exists($path)) {
            require $path;
        } else {
            echo "404";
        }
    }
    ?>
    <script src="https://cdn.lordicon.com/libs/mssddfmo/lord-icon-2.1.0.js"></script>
</body>

</html>