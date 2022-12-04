<?php
require_once("modele_connexion.php");
class ContConnexion
{

    private $modele;
    private $action;

    public function __construct()
    {
        $this->modele = new ModeleConnexion();
        $this->action = isset($_GET['action']) ? $_GET['action'] : "connexion";
    }

    public function exec()
    {
        switch ($this->action) {
            case ("connexion"):
                $this->modele->connexion();
                /* header("Location:" . $_SERVER['HTTP_REFERER']); */
                break;
            case ("deconnexion"):
                $this->modele->deconnexion();
                header("Location:" . $_SERVER['HTTP_REFERER']);
                break;
        }
    }
}

?>