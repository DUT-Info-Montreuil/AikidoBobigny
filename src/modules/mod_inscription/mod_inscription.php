<?php
require_once("cont_inscription.php");
class ModInscription{

    private $controleur;
    public function __construct(){
        $vue=new VueInscription();
        $modele=new ModeleInscription();
        $this->controleur = new ContInscription($modele,$vue);
        echo($this->controleur->exec());
    }

    public function afficheModule(){
        return $this->controleur->afficheMod();
    }
}
?>