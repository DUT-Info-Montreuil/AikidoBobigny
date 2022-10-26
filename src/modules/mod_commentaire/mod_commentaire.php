<?php
require_once("cont_commentaire.php");
class ModCommentaire{

    private $controleur;
    public function __construct(){
        $vue=new VueCommentaire();
        $modele=new ModeleCommentaire();
        $this->controleur = new ContCommentaire($modele,$vue);
        echo($this->controleur->exec());
    }

    public function afficheModule(){
        return $this->controleur->afficheMod();
    }
}
?>