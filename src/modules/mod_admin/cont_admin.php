<?php
require_once("vue_admin.php");
require_once("modele_admin.php");
class ContAdmin{

    private $modele;
    private $vue;
    private $action;
    private $id;
    public function __construct(ModeleAdmin $modele,VueAdmin $vue){
        $this->modele=$modele;
        $this->vue=$vue;
        $this->action=isset($_GET['action'])?$_GET['action']:"default";
        $this->id=isset($_GET['id'])?$_GET['id']:1;
    }

   

    public function exec(){
        switch($this->action){

        }
    
    }
    public function afficheMod(){
        return $this->vue->getAffichage();
    }
}

?>