<?php
require_once("vue_mail.php");
require_once("modele_mail.php");
class ContMail{

    private $modele;
    private $vue;
    private $action;
    private $id;
    public function __construct(ModeleMail $modele,VueMail $vue){
        $this->modele=$modele;
        $this->vue=$vue;
        $this->action=isset($_GET['action'])?$_GET['action']:"default";
        $this->id=isset($_GET['id'])?$_GET['id']:1;
    }

    public function envoie_mail() {
        $this->modele->envoie_Verif_Mail();
    }

    



    public function exec(){
        switch($this->action){
            case ("verifmail"):
                $this->envoie_mail();
                break;
        
        }
    
    }
    public function afficheMod(){
        return $this->vue->getAffichage();
    }
}

?>