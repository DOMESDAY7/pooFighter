<?php
class Personnage
{
    private $db;
    private $pv;
    private $atk;
    private $nom;
    public function getId()
    {
        return $this->id ;
    }
    public function setId( $id)
    {
        $this->id = $id;
    }
    public function getDb()
    {
        $this->db ;
    }
    public function setDb(PDO $db)
    {
        $this->db = $db;
    }
    public function getPv()
    {
        return $this->pv;
    }
    public function setPv( $pv)
    {
        $this->pv = $pv;
    }
    public function getAtk()
    {
        return $this->atk;
    }
    public function setAtk( $atk)
    {
        $this->atk = $atk;
    }
    public function getNom()
    {
        return $this->nom;
    }
    public function setNom( $nom)
    {
        $this->nom = $nom;
    }


    public function hydrate(array $donnees)
    {
        foreach ($donnees as $key => $value) {
            // On récupère le nom du setter correspondant à l'attribut.
            $method = 'set' . ucfirst($key);
            // Si le setter correspondant existe.
            if (method_exists($this, $method)) {
                // On appelle le setter.
                $this->$method($value);
            }
        }
    }

    public function __construct(array $data)
    {
        $this->hydrate($data);
    }
}