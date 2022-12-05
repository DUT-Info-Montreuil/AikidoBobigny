<?php
require_once("vue_inscription.php");
require_once("modules/mod_mail/vue_mail.php");
class ContInscription{

    private $modele;
    private $vue;
    private $vuemail;
    private $action;
    private $id;

    public function __construct(VueInscription $vue){
        $this->vue=$vue;
        $this->vuemail = new VueMail();
        $this->action=isset($_GET['action'])?$_GET['action']:"form_inscription";
        $this->id=isset($_GET['id'])?$_GET['id']:1;
    }
    
    public function form_inscription(){
        $this->vue->form_inscription();
    }

    public function exec(){
        switch($this->action){
            case ("form_inscription"):
                $this->form_inscription();
                break;
        }
    
    }
}

?>