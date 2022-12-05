<?php
include_once ('cont_compte.php');

class ModCompte{

    private $vue;
    public function __construct(){
        $this->vue= new VueCompte();
        $controleurCompte = new ContCompte();
        $controleurCompte->exec();
        
    }

    public function getAffichage() {
        return $this->vue->getAffichage();
    }
}
?>