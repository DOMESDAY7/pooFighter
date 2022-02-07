<?php
class personnageManager
{
    private $db;
    public function __construct($db)
    {
        $this->db = $db;
    }


    public function getAllPersonnage()
    {
        $query = $this->db->query("SELECT * FROM personnages");
        while ($data =   $query->fetch(PDO::FETCH_ASSOC)) {
            $personnages[] = new Personnage($data);
        }
        return $personnages;
    }
 
    public function addPersonnage(Personnage $personnage)
    {
        // var_dump($personnage) ;
        $nom = $personnage->getNom();
        $atk = $personnage->getAtk();
        $pv = $personnage->getPv();

        $this->db->query("INSERT INTO `personnages` (`id`, `nom`, `atk`, `pv`) VALUES (NULL, '$nom', '$atk', '$pv')");
    }
    public function deletePersonnage(int $id)
    {

        $this->db->query("DELETE FROM `personnages` WHERE `personnages`.`id` = $id ");
    }
    public function getInfoById(int $id)
    {

        $tabAssoc = $this->db->query("SELECT * FROM `personnages` WHERE `personnages`.`id` = $id ");
        $perso = new Personnage($tabAssoc->fetch(PDO::FETCH_ASSOC));
        return $perso;
    }
    public function modfiyPerso(Personnage $replace)
    {
    
        $id = $replace->getId();
        $nom = $replace->getNom();
        $atk = $replace->getAtk();
        $pv = $replace->getPv();
        $cmd = "UPDATE `personnages` SET `nom` = '$nom',`atk`='$atk',`pv`='$pv' WHERE `personnages`.`id` = $id";
        $this->db->query($cmd);
    }

}
