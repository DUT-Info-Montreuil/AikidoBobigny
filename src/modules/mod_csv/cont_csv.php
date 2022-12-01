<?php

require_once("vue_csv.php");
require_once("modele_csv.php");

class ContCSV {

    private $vue;
    private $modele;
    private $action;

    public function __construct() {
        $this->vue = new VueCSV();
        $this->modele = new ModeleCSV();
        $this->action = isset($_GET['action']) ? $_GET['action'] : "menu";
    }

    public function genererCSV() {
        $this->modele->genererCSV();
        $this->vue->afficherGenererCSV();
    }

    public function afficherGenererCSV() {
        $this->vue->afficherGenererCSV();
    }

    public function exec(){
        switch($this->action){
            case "generate":
                $this->genererCSV();
                break;
            case "menu":
                $this->afficherGenererCSV();
                break;
        }
    }
}

?>