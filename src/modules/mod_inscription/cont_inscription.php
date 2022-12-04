<?php
require_once("vue_inscription.php");
require_once("modules/mod_mail/vue_mail.php");
require_once("modele_inscription.php");
class ContInscription{

    private $modele;
    private $vue;
    private $vuemail;
    private $action;
    private $id;

    public function __construct(ModeleInscription $modele,VueInscription $vue){
        $this->modele=$modele;
        $this->vue=$vue;
        $this->vuemail = new VueMail();
        $this->action=isset($_GET['action'])?$_GET['action']:"form_inscription";
        $this->id=isset($_GET['id'])?$_GET['id']:1;
    }
    
    public function form_inscription(){
        $this->vue->form_inscription();
    }

    public function inscription () {
        $this->modele->inscription();
        /* $this->vuemail->message_Verif_Mail(); */
    }


    public function exec(){
        switch($this->action){
            case ("submit"):
                $this->inscription();
                header("Location: index.php");
                break;
            case ("form_inscription"):
                $this->form_inscription();
                break;
        }
    
    }
}

?>