<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Projet</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
    <?php
    function chargerClasse($classe)
    {
        require  $classe . '.php';
    }
    spl_autoload_register('chargerClasse');
    $db = new PDO('mysql:host=localhost;dbname=poo_sgbd', 'root', '', array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
    $manager = new personnageManager($db);
    if (isset($_GET["comfirmDel"])) {
        $manager->deletePersonnage($_GET["idDelete"]);
    }
    if (isset($_POST["subAdd"])) {
        $insertPerso = new Personnage($_POST);
        $manager->addPersonnage($insertPerso);
    }
    if(isset($_POST["subMod"])){
        $modPerso = new Personnage($_POST);
        $manager->modfiyPerso($_GET["idMod"],$modPerso);
    }
    $tab = $manager->getAllPersonnage();


    ?>
    <div class="flex flex-col">
        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">

                            <tr>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Name
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    point d'attaque
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    PV
                                </th>

                                <th scope="col" class="relative px-6 py-3">
                                    <span class="sr-only">Edit</span>
                                </th>
                            </tr>
                        </thead>
                        <?php foreach ($tab as $value) { ?>
                            <tbody class="bg-white divide-y divide-gray-200">
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div class="flex-shrink-0 h-10 w-10">
                                                <img class="h-10 w-10 rounded-full" src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=4&w=256&h=256&q=60" alt="">
                                            </div>
                                            <div class="ml-4">
                                                <div class="text-sm font-medium text-gray-900">
                                                    <?= $value->getNom() ?>
                                                </div>

                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-900"><?= $value->getAtk()  ?></div>

                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                            <?= $value->getPv()  ?>
                                        </span>
                                    </td>

                                    <td>
                                        <a href="<?= "?idDelete=" . $value->getId() ?>&modal=true"><button class="bg-red-50 text-red-600 rounded-full p-2">delete</button></a>

                                        <a href="<?= "?idMod=" . $value->getId() ?>&modalMod=true"><button class="bg-teal-100 text-teal-900 rounded-full p-2">Modifier</button></a>
                                    </td>
                                </tr>
                            <?php } ?>
                            </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <section class="flex text-center">
        <form method="POST" class="border rounded-lg mt-10 text-center ">
            <div class="my-10">
                <h1 class="text-center">Rajouter un personnage</h1>
                <input type="text" name="nom" placeholder="nom de votre personnage" class="border rounded mb-5 p-3"><br>
                <input type="text" name="atk" placeholder="point d'attaque" class="border rounded mb-5 p-3"><br>
                <input type="text" name="pv" placeholder="le nombre de point de vie de votre personnage p-3" class="border rounded mb-5"><br>
                <button type="submit" name="subAdd" class="text-white bg-zinc-800 rounded p-3">Créé un nouveau personnage</button>
            </div>
        </form>

      

        <?php
        if (isset($_GET["modalMod"])) {
            $modifTab = $manager->getInfoById($_GET["idMod"]);
            foreach ($modifTab as $data) {
        ?>
                <div class="fixed z-10 inset-0 overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true">
                    <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
                        <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true"></div>


                        <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>


                        <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
                            <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                                <div class="sm:flex sm:items-start">
                                    <div class="mx-auto flex-shrink-0 flex items-center justify-center h-12 w-12 rounded-full bg-red-100 sm:mx-0 sm:h-10 sm:w-10">

                                        <svg class="h-6 w-6 text-red-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                                        </svg>
                                    </div>
                                    <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                                        <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-title">
                                            Modification du personnage: <?= $modifTab->getNom() ?>
                                        </h3>
                                        <div class="mt-2">
                                            <form action="" class="text-center">
                                                <input type="text" name="nom" placeholder="nom" class="border mb-5 rounded p-3 outline-none" value="<?= $modifTab->getNom() ?>"><br>
                                                <input type="text" name="pv" placeholder="pv" class="border mb-5 rounded p-3 outline-none" value="<?= $modifTab->getPv() ?>"><br>
                                                <input type="text" name="atk" placeholder="atk" class="border mb-5 rounded p-3 outline-none" value="<?= $modifTab->getAtk() ?>"><br>

                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                                
                                    <button type="submit" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-red-600 text-base font-medium text-white hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 sm:ml-3 sm:w-auto sm:text-sm" name="subMod">
                                        modifier le personnage
                                    </button>
                               
                                <a href=".">
                                    <button type="button" class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">
                                        Cancel
                                    </button>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php  }
        }
        if (isset($_GET["modal"])) { ?>
            <div class="fixed z-10 inset-0 overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true">
                <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
                    <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true"></div>


                    <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>


                    <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
                        <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                            <div class="sm:flex sm:items-start">
                                <div class="mx-auto flex-shrink-0 flex items-center justify-center h-12 w-12 rounded-full bg-red-100 sm:mx-0 sm:h-10 sm:w-10">

                                    <svg class="h-6 w-6 text-red-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                                    </svg>
                                </div>
                                <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                                    <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-title">
                                        Suppression du personnage
                                    </h3>
                                    <div class="mt-2">
                                        <p class="text-sm text-gray-500">
                                            êtes vous sûr de vouloir supprimer ce personnage ?
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                            <a href="?idDelete=<?= $_GET["idDelete"] ?>&comfirmDel=true">
                                <button type="button" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-red-600 text-base font-medium text-white hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 sm:ml-3 sm:w-auto sm:text-sm">
                                    Delete
                                </button>
                            </a>
                            <a href=".">
                                <button type="button" class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">
                                    Cancel
                                </button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

        <?php } ?>


    </section>

</body>

</html>