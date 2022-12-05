<?php

include_once 'modele_compte.php';
include_once 'vue_compte.php';
include_once('./modules/mod_compte/modele_compte.php');

class ContCompte{

    private $vue;
    private $modele;
    private $action;


    public function __construct(){
        $this->vue = new VueCompte;
        $this->modele = new ModeleCompte;
        $this->action=isset($_GET['action'])?$_GET['action']:"compte";
    }

    public function affichage(){
            var_dump($_SESSION);
            $tab = $this->modele->getadherents();
            $this->vue->affichageprincipal($tab);
            if(isset($_SESSION['admin'])&& $_SESSION['admin']==1){
            $this->vue->afficheadmin(); 
            }
            

        
    }
    public function exec(){
        
        switch($this->action){
            case("compte"):
                $this->affichage();
            break;
        }  
    }

    public function afficheMod(){
        return $this->vue->getAffichage();
    }

}



?>