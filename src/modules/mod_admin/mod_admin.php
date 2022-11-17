<?php
require_once("cont_admin.php");
class ModAdmin{

    private $vue;

    public function __construct(){
        $this->vue=new VueAdmin();
        $controleur = new ContAdmin(new ModeleAdmin(),$this->vue);
        $controleur->exec();
    }

    public function getAffichage(){
        return $this->vue->getAffichage();
    }
}
?>