<?php
require_once("cont_connexion.php");
class ModConnexion{

    private $vue;

    public function __construct() {
        $this->vue = new VueConnexion();
        $controleur = new ContConnexion(new ModeleConnexion(), $this->vue);
        $controleur->exec();
    }

    public function getAffichage() {
        return $this->vue->getAffichage();
    }
}
?>