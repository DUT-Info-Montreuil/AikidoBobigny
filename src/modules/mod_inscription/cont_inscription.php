<?php
require_once("vue_inscription.php");
require_once("modele_inscription.php");
class ContInscription{

    private $modele;
    private $vue;
    private $action;
    private $id;

    public function __construct(ModeleInscription $modele,VueInscription $vue){
        $this->modele=$modele;
        $this->vue=$vue;
        $this->action=isset($_GET['action'])?$_GET['action']:"form_inscription";
        $this->id=isset($_GET['id'])?$_GET['id']:1;
    }
    
    public function form_inscription(){
        $this->vue->form_inscription();
    }

    public function inscription() {
        $this->
    }

    public function exec(){
        switch($this->action){
            case ("inscription"):
                $id_ville=$this->modele->ajoutInscription_ville();
                echo"idvillecontroleur = $id_ville";
                $id_adherent=$this->modele->ajoutInscription_adherent($id_ville);
                echo"idadherentcontroleur = $id_adherent";
                $this->modele->ajoutInscription_inscription($id_adherent);
                break;
            case ("form_inscription"):
                $this->form_inscription();
                break;

        }
    
    }
    public function afficheMod(){
        return $this->vue->getAffichage();
    }
}

?>