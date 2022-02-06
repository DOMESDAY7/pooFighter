<?php
class personnageManager
{
    private $db;
    public function __construct($db){
        $this->db=$db;
    }

    
    public function getAllPersonnage()
    {
        $query = $this->db->query("SELECT * FROM personnages");
        while ($data =   $query->fetch(PDO::FETCH_ASSOC)) {
            $personnages[] = new Personnage($data);
        }
        return $personnages;
    }
    // public function deletePersonnage($id)
    // {
    //     $query = $this->db->query("SELECT * FROM personnages");
    //     while ($data =   $query->fetch(PDO::FETCH_ASSOC)) {
    //         $personnages[] = new Personnage($data);
    //     }
    //     return $personnages;
    // }


    //insertion de perso
    //INSERT INTO `personnages` (`id`, `nom`, `atk`, `pv`) VALUES (NULL, 'fzefzef', '453453', '453453');
    public function addPersonnage(Personnage $personnage)
    {   
        // var_dump($personnage) ;
        $nom =$personnage->getNom();
        $atk =$personnage->getAtk();
        $pv =$personnage->getPv();
      
        $this->db->query("INSERT INTO `personnages` (`id`, `nom`, `atk`, `pv`) VALUES (NULL, '$nom', '$atk', '$pv')");
     
    }
    public function deletePersonnage(int $id)
    {   
        
        $this->db->query("DELETE FROM `personnages` WHERE `personnages`.`id` = $id ");
     
    }
    public function getInfoById(int $id)
    {   
        
        $tabAssoc=$this->db->query("SELECT * FROM `personnages` WHERE `personnages`.`id` = $id ");
        $perso=new Personnage($tabAssoc->fetch(PDO::FETCH_ASSOC));
        return $perso;
    }
    public function modfiyPerso(int $id,$modPerso)
    {   
        $nom =$modPerso->getNom();
        $atk =$modPerso->getAtk();
        $pv =$modPerso->getPv();
        $tabAssoc=$this->db->query("UPDATE `modPersos` SET `nom` = 'zezedz' WHERE `personnages`.`id` = $id");
        $perso=new Personnage($tabAssoc->fetch(PDO::FETCH_ASSOC));
        return $perso;
    }
    
    //modifier
    //UPDATE `personnages` SET `nom` = 'zezedz' WHERE `personnages`.`id` = 5;
}
