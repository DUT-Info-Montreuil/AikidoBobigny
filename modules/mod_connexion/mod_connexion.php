<?php
require_once("cont_connexion.php");
class ModConnexion{

    private $controleur;
    public function __construct(){
        $vue=new VueConnexion();
        $modele=new ModeleConnexion();
        $this->controleur = new ContConnexion($modele,$vue);
        echo($this->controleur->exec());
    }

    public function afficheModule(){
        return $this->controleur->afficheMod();
    }
}
?>