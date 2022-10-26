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
        $this->action=isset($_GET['action'])?$_GET['action']:"default";
        $this->id=isset($_GET['id'])?$_GET['id']:1;
    }

   

    public function exec(){
        switch($this->action){
            case ("Se-connecter"):
                $this->vue->form_connexion();
                break;
            case("Connexion"):
                $this->modele->Connexion();
                break;
            case("Deconnexion"):
                $this->modele->Deconnexion();

        }
    
    }
    public function afficheMod(){
        return $this->vue->getAffichage();
    }
}

?>