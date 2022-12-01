<?php
require_once("cont_inscription.php");
class ModInscription{

    private $vue;

    public function __construct() {
        $this->vue = new VueInscription();
        $controleur = new ContInscription(new ModeleInscription(), $this->vue);
        $controleur->exec();
    }

    public function getAffichage() {
        return $this->vue->getAffichage();
    }
}
