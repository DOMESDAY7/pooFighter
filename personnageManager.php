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
        $preNom = $personnage->getNom();
        $nom = htmlspecialchars($preNom);
        $atk = $personnage->getAtk();
        $pv = $personnage->getPv();
        $req = $this->db->prepare("INSERT INTO `personnages` (`id`, `nom`, `atk`, `pv`) VALUES (:id , :nom , :atk , :pv)");
        $req->bindValue(":nom", $nom, PDO::PARAM_STR);
        if ($atk < 0) {
            $atk = 0;
            $req->bindValue(":atk", $atk, PDO::PARAM_INT);
        } else {
            $req->bindValue(":atk", $atk, PDO::PARAM_INT);
        }
        if ($pv < 0) {
            $pv = 0;
            $req->bindValue(":pv", $pv, PDO::PARAM_INT);
        } else {
            $req->bindValue(":pv", $pv, PDO::PARAM_INT);
        }
        $req->bindValue(":id", NULL, PDO::PARAM_STR);
        $req->execute();
    }
    public function deletePersonnage(int $id)
    {

        $req = $this->db->prepare("DELETE FROM `personnages` WHERE `personnages`.`id` = :id ");
        $req->bindValue(":id", $id, PDO::PARAM_INT);
        $req->execute();
    }
    public function getInfoById(int $id)
    {

        $req = $this->db->prepare("SELECT * FROM `personnages` WHERE `personnages`.`id` = :id ");
        $req->bindValue(":id", $id, PDO::PARAM_STR);
        $req->execute();
        $tabAssoc = $req;
        $perso = new Personnage($tabAssoc->fetch(PDO::FETCH_ASSOC));
        return $perso;
    }
    public function modfiyPerso(Personnage $replace)
    {

        $id = $replace->getId();
        $preNom = $replace->getNom();
        $preNom = htmlspecialchars($preNom);
        $nom = strtolower($preNom);
        $atk = $replace->getAtk();
        $pv = $replace->getPv();
        $cmd = "UPDATE `personnages` SET `nom` = :nom ,`atk`= :atk ,`pv`= :pv WHERE `personnages`.`id` = :id ";
        $req = $this->db->prepare($cmd);
        $req->bindValue(":id", $id, PDO::PARAM_INT);
        $req->bindValue(":nom", $nom, PDO::PARAM_STR);
        $req->bindValue(":atk", $atk, PDO::PARAM_INT);
        $req->bindValue(":pv", $pv, PDO::PARAM_INT);
        $req->execute();
    }
    public function removePoint(Personnage $victime)
    {
        $sql = "UPDATE `personnages` SET `pv`= :pv WHERE `personnages`.`id` = :id  ";
        $req = $this->db->prepare($sql);
        $req->bindValue(":pv", $victime->getPv(), PDO::PARAM_INT);
        $req->bindValue(":id", $victime->getId(), PDO::PARAM_INT);
        $req->execute();
    }
    public function regenerer(Personnage $perso)
    {
        $id = $perso->getId();
        $pv = $perso->getPv();
        $sql = "UPDATE `personnages` SET `pv`= :pv WHERE `personnages`.`id` = :id  ";
        $req = $this->db->prepare($sql);
        if ($pv < 0) {
            $pv = 0;
        } else {
            $req->bindValue(":pv", $pv, PDO::PARAM_INT);
        }
        $req->bindValue(":id", $id, PDO::PARAM_INT);
        $req->execute();
    }
}
