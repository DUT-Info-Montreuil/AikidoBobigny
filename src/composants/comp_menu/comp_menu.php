<?php
require_once("cont_menu.php");
class CompMenu{

    private $contenue;
    public function __construct(){ 
        $controleur = new ContMenu();
        $this->contenue = $controleur->exec();
    }

    public function affiche(){
        echo $this->contenue;
    }
}
?>