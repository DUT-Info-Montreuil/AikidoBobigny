<?php
require_once("vue_faq.php");
require_once("modele_faq.php");
class ContFAQ
{

    private $modele;
    private $vue;
    private $action;
    private $id;
    public function __construct(ModeleFAQ $modele, VueFAQ $vue)
    {
        $this->modele = $modele;
        $this->vue = $vue;
        $this->action = isset($_GET['action']) ? $_GET['action'] : "FAQ";
        $this->id = isset($_GET['id']) ? $_GET['id'] : 1;
    }



    public function faq()
    {
        $tab = $this->modele->getfaq();
        $this->vue->affichequestionreponse($tab);
        if (isset($_SESSION['idadh'])) {
            $this->vue->form_faq();
        }
    }



    public function exec()
    {
        switch ($this->action) {
            case ("FAQ"):
                $this->faq();
                break;
            case ("question_faq"):
                $this->modele->question_faq();
                break;
        }
    }
    public function afficheMod()
    {
        return $this->vue->getAffichage();
    }
}

?>