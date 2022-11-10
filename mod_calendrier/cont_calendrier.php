<?php

include_once 'modele_calendrier.php';
include_once 'vue_calendrier.php';

class ContCalendrier{

    private $vue;
    private $modele;
    private $action;


    public function __construct(){
        $this->vue = new VueCalendrier;
        $this->modele = new ModeleCalendrier;
        if(isset($_GET['action'])){
            $this->action = $_GET['action'];
        }
    }

    public function exec(){
        $this->vue->menu("Bonjour");
        switch($this->action){
            case("formEvenement"):
                $this->form_ajout();
            break;
            case("insertEvenement"):
                //var_dump($this);
                $this->ajout();
            break;
            case("affichageCalendrier"):
                $this->calendrier();
            break;
                
        }

    }


    public function form_ajout(){
        $this->vue->formEvenement();
    }

    public function ajout(){
        $this->modele->insertEvenement();
    }

    public function calendrier(){
        $this->vue->affichageCalendrier();
    }




}



?>