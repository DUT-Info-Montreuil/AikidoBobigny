<?php

include_once 'modele_article.php';
include_once 'vue_article.php';

class ContArticle{

    private $vue;
    private $modele;
    private $action;


    public function __construct(){
        $this->vue = new VueArticle;
        $this->modele = new ModeleArticle;
        if(isset($_GET['action'])){
            $this->action = $_GET['action'];
        }
    }

    public function exec(){
        $this->vue->menu();
        switch($this->action){
            case("formArticle"):
                $this->form_ajout();
            break;
            case("insertArticle"):
                $this->ajout();
            break;
            case("rechercherArticle"):
                $this->form_recherche();
            break;
            case("articleRecherche"):
                $this->faireRecherche();
            break;
        }

    }


    public function form_ajout(){
        $this->vue->formArticle();
    }

    public function ajout(){
        $this->modele->insertArticle();
    }

    public function form_recherche(){
        $this->vue->rechercherArticle();
    }

    public function faireRecherche(){
        $this->vue->afficherRecherche($this->modele->articleRecherche());
    }




}



?>