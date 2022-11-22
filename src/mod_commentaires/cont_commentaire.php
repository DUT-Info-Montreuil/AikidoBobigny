<?php
include_once("vue_commentaire.php");
include_once("modele_commentaire.php");

class ContCommentaire{

    private $modele;
    private $vue;
    private $action;
    private $id;

    public function __construct(ModeleCommentaire $modele,VueCommentaire $vue){
        $this->modele=$modele;
        $this->vue=$vue;
        $this->action=isset($_GET['action'])?$_GET['action']:"commentaire";
        $this->id=isset($_GET['id'])?$_GET['id']:1;
    }


    public function exec(){
        switch($this->action){
            case "ajout":
                $this->modele->ajoutCommentaire();
                break;
            case "commentaire":
                $this->vue->form_commentaire();
                break;

        }
    
    }
}

?>