<?php
require_once("cont_admin.php");
class ModAdmin{

    private $controleur;
    public function __construct(){
        $vue=new VueAdmin();
        $modele=new ModeleAdmin();
        $this->controleur = new ContAdmin($modele,$vue);
        echo($this->controleur->exec());
    }

    public function afficheModule(){
        return $this->controleur->afficheMod();
    }
}
?>