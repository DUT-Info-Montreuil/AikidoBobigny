<?php
require_once("cont_loginForm.php");
class CompLoginForm{

    private $contenu;

		public function __construct() {
            $controleur = new ContLoginForm();
            $this->contenu = $controleur->exec();
        }

        public function affiche() {
            echo $this->contenu;
        }
}
?>