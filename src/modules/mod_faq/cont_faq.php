<?php
require_once("vue_faq.php");
require_once("modele_faq.php");
class ContFAQ{

    private $modele;
    private $vue;
    private $action;
    private $id;
    public function __construct(ModeleFAQ $modele,VueFAQ $vue){
        $this->modele=$modele;
        $this->vue=$vue;
        $this->action=isset($_GET['action'])?$_GET['action']: "default";
        $this->id=isset($_GET['id'])?$_GET['id']:1;
    }


    public function faq(){
        $tab = $this->modele->getfaq();
        $this->vue->affichequestionreponse($tab);
        }

   

    public function exec(){
        switch($this->action){
            case ("FAQ"):
                $this->faq();

                $this->vue->form_faq();
                break;
            case("question_faq"):
                $this->modele->question_faq();
                break;
           
        }
    
    }
    public function afficheMod(){
        return $this->vue->getAffichage();
    }
}

?>