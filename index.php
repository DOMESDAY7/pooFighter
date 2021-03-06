<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Les indestructibles</title>
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
    <style>
        i{
            color:#f44336;
        }
        .regenerationArea .combattant{
            height:5rem;
            width: 5rem;

        }
        .containerAll .stat{
            display: none;
        }
    </style>
</head>

<body style="background: radial-gradient(circle, rgba(243,108,3,1) 0%, rgba(228,46,25,1) 32%, rgba(0,0,0,1) 100%); background-repeat: no-repeat; background-attachment:fixed" class="h-screen">
    <?php
    require "loadClass.php";
    $manager = new personnageManager($db);
    if (isset($_GET["page"])) {
        $page = $_GET["page"];
        $pathModel = "./model/".$page.".php";
        if (file_exists($pathModel)) {
            require $pathModel;
            $pathView =  "./view/" . $page . ".php";
            if (file_exists($pathView)) {
                require $pathView;
            } else {
                echo "404";
            }
        }
    }else{
        header("Location:?page=choose");
    }
    ?>
    <script src="https://cdn.lordicon.com/libs/mssddfmo/lord-icon-2.1.0.js"></script>
</body>

</html>