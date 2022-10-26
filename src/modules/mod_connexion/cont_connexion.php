<?php
require_once("vue_connexion.php");
require_once("modele_connexion.php");
class ContConnexion{

    private $modele;
    private $vue;
    private $action;
    private $id;
    public function __construct(ModeleConnexion $modele,VueConnexion $vue){
        $this->modele=$modele;
        $this->vue=$vue;
        $this->action=isset($_GET['action'])?$_GET['action']:"form_connexion";
        $this->id=isset($_GET['id'])?$_GET['id']:1;
    }

   

    public function exec(){
        switch($this->action){
            case ("form_connexion"):
                $this->vue->form_connexion();
                break;
            case("connexion"):
                $this->modele->connexion();
                break;
            case("deconnexion"):
                $this->modele->deconnexion();
                break;
        }
    
    }
    public function afficheMod(){
        return $this->vue->getAffichage();
    }
}

?>