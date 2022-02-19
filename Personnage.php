<?php
class Personnage
{
    private $id;
    private $pv;
    private $atk;
    private $nom;
    public function getId()
    {
        return $this->id ;
    }
    public function setId(int $id)
    {
        $this->id = $id;
    }
    public function getPv()
    {
        return $this->pv;
    }
    public function setPv( int $pv)
    {
        $this->pv = $pv;
    }
    public function getAtk()
    {
        return $this->atk;
    }
    public function setAtk( int $atk)
    {
        $this->atk = $atk;
    }
    public function getNom()
    {
        return $this->nom;
    }
    public function setNom( string $nom)
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
    public function isAlive($victimePv){
     
        if (is_null($victimePv) || $victimePv<=0 ) {
            
            return true ;
           
        } else {
            return false;
        }
    }

    public function __construct(array $data)
    {
        $this->hydrate($data);
    }
    public function attaque( Personnage $victime,$db){
        $victime->pv -= $this->atk;
        $manager =new personnageManager($db);
        $manager->updatePv($victime);
       if(Personnage::isAlive($victime->pv) == false){
        return ("<i>$victime->nom</i> : je n'ai plus que <i>$victime->pv</i> pv<br> mais heuresement je suis toujours en vie...<br>je reviendrais un jour");
       }else{
           return "<i>$victime->nom</i> :j'ai <i>0</i> pv ...☠️";
       } 
       
        
    }
}