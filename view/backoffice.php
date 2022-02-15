<div class="flex flex-col sm:flex-row items-center  justify-evenly my-5 sm:my-[0] sm:h-screen ">
    <div class="flex ">
        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                    <table class="min-w-full divide-y divide-gray-200 w-1/2">
                        <thead class="bg-black">

                            <tr>
                                <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-[#fddb22] tracking-wider">
                                    name
                                </th>
                                <th scope="col" class="px-6 py-3 text-center text-xs font-medium  text-[#fddb22]  tracking-wider">
                                    point d'attaque
                                </th>
                                <th scope="col" class="px-6 py-3 text-center text-xs font-medium  text-[#fddb22]  tracking-wider">
                                    pv
                                </th>

                                <th scope="col" class="relative px-6 py-3">
                                    <span class="sr-only">Edit</span>
                                </th>
                            </tr>
                        </thead>
                        <?php foreach ($tab as $value) { ?>
                            <tbody class="bg-[#660003] divide-y divide-gray-200">
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div class="flex-shrink-0 h-10 w-10 border rounded-full overflow-hidden">
                                                <?php
                                                $imgPath = "./img/persoImg/" . $value->getNom() . ".png";
                                                if (file_exists($imgPath)) { ?>
                                                    <img class="h-10 w-10 object-cover object-top" src=<?= $imgPath ?> alt=<?= $value->getNom(); ?>>
                                                <?php } else { ?>
                                                    <img src="./img/persoImg/persoDefault.png" class="h-10 w-10 object-cover object-top" alt="<?= $value->getNom() ?>">
                                                <?php } ?>
                                            </div>
                                            <div class="ml-4">
                                                <div class="text-sm font-medium  text-[#fddb22] tracking-widest">
                                                    <?= $value->getNom() ?>
                                                </div>

                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-black text-[#fddb22]">
                                            <?= $value->getAtk()  ?>
                                        </span>

                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-center">
                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-black text-[#fddb22]">
                                            <?= $value->getPv()  ?>
                                        </span>
                                    </td>

                                    <td>
                                        <a href="<?= "?page=backoffice&idDelete=" . $value->getId() ?>&modal=true"><button class="bg-[#e42e19] text-red-600 rounded-full p-2 m-3">
                                                <lord-icon src="https://cdn.lordicon.com/gsqxdxog.json" trigger="hover" colors="primary:#fddb22,secondary:#fddb22">
                                                </lord-icon>
                                            </button></a>

                                        <a href="<?= "?page=backoffice&idMod=" . $value->getId() ?>&modalMod=true"><button class="bg-[#fddb22] text-teal-900 rounded-full p-2 m-3">
                                                <lord-icon src="https://cdn.lordicon.com/sbiheqdr.json" trigger="hover" colors="primary:#00000,secondary:#ffffff">
                                                </lord-icon>
                                            </button></a>
                                    </td>
                                </tr>
                            <?php } ?>
                            </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="mt-5">
        <div class="bg-black rounded-t py-3">
            <h1 class="text-center text-[#fddb22]">rajouter un personnage</h1>
        </div>
        <form method="POST" action="?page=backoffice" class=" rounded-b  text-center bg-[#660003] px-10 py-5">
            <div>
                <input type="text" name="nom" placeholder="nom de votre personnage" class=" rounded mb-5 p-3 outline  outline-4"><br>
                <input type="number" name="atk" placeholder="point d'attaque" class="border rounded mb-5 p-3 outline  outline-4"><br>
                <input type="number" name="pv" placeholder="point de vie " class="border rounded mb-5 p-3 outline  outline-4"><br>
                <button type="submit" name="subAdd" class="text-white bg-[#e42e19] rounded p-3 h-14 shinyBtn custom-btn">rajouter <lord-icon src="https://cdn.lordicon.com/dxjqoygy.json" trigger="hover" colors="primary:#ffffff,secondary:#ffffff" alt="new perso">
                    </lord-icon></button>
            </div>
        </form>
    </div>
</div>

<section class="flex text-center">




    <?php
    if (isset($_GET["modalMod"])) {
        $modifTab = $manager->getInfoById($_GET["idMod"]);
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
                                    modification du personnage: <?= $modifTab->getNom() ?>
                                </h3>
                                <div class="mt-2">
                                    <form method="POST" action="?page=backoffice" class="text-center">
                                        <input type="text" name="id" class="border mb-5 rounded p-3 outline-none hidden" value="<?= $modifTab->getId() ?>"><br>
                                        <input type="text" name="nom" placeholder="nom" class="border mb-5 rounded p-3 outline-none" value="<?= $modifTab->getNom() ?>"><br>
                                        <input type="text" name="pv" placeholder="pv" class="border mb-5 rounded p-3 outline-none" value="<?= $modifTab->getPv() ?>"><br>
                                        <input type="text" name="atk" placeholder="atk" class="border mb-5 rounded p-3 outline-none" value="<?= $modifTab->getAtk() ?>"><br>
                                        <input type="submit" value="modifier le personnage" name="subMod" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-red-600 text-base font-medium text-white hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 sm:ml-3 sm:w-auto sm:text-sm cursor-pointer ">
                                        <a href="?page=backoffice">
                                            <button type="button" class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">
                                                annuler
                                            </button>
                                        </a>

                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                    </div>
                </div>
            </div>
        </div>
    <?php
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
                                    suppression du personnage
                                </h3>
                                <div class="mt-2">
                                    <p class="text-sm text-gray-500">
                                        etes vous sur de vouloir supprimer ce personnage ?
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                        <a href="?page=backoffice&idDelete=<?= $_GET["idDelete"] ?>&comfirmDel=true">
                            <button type="button" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-red-600 text-base font-medium text-white hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 sm:ml-3 sm:w-auto sm:text-sm">
                                supprimer
                            </button>
                        </a>
                        <a href="?page=backoffice">
                            <button type="button" class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">
                                annuler
                            </button>
                        </a>
                    </div>
                </div>
            </div>
        </div>

    <?php } ?>

    <a href="?page=choose" class="border border-black rounded text-[#fddb22] p-3 bg-[#e42e19]">combattre</a>
</section>
<img src="./img/logo.svg" class="fixed top-1/4 left-1/4 translate -z-10 w-1/2">