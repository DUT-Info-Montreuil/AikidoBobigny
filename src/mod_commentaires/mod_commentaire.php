<?php
require_once("cont_commentaire.php");
class ModCommentaire{

    private $vue;

    public function __construct(){
        $this->vue=new VueCommentaire();
        $controleur = new ContCommentaire(new ModeleCommentaire(),$this->vue);
        $controleur->exec();
    }

}
?>