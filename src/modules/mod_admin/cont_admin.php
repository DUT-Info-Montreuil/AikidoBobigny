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
        $this->action=isset($_GET['action'])?$_GET['action']:"admin";
        $this->id=isset($_GET['id'])?$_GET['id']:1;
    }

    public function inscription(){
        $tab = $this->modele->getadherents();
        $this->vue->gerer_inscrip($tab);  
    }
    public function faq(){
    $tab = $this->modele->getfaq();
    $this->vue->gerer_faq($tab);
    }

    public function supp_adherent(){
        $this->modele->supprimerAdherents();
    }


    public function exec(){
        switch($this->action){
            case("admin"):
                $this->vue->menu();
                break;
            case("inscription"):
                $this->inscription();
                //$this->supp_adherent();
                /*
                if (isset($_POST['function'])) {
                    switch ($_POST['function']) {
                        case 'supprimeradherent':
                            echo 'test';
                            $this->supp_adherent();
                            break;
                    }
                }
                */
                break;
            case("faq"):
                $this->faq();
                break;

        }
    
    }
    public function afficheMod(){
        return $this->vue->getAffichage();
    }
}

?>