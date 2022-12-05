<?php
require_once("cont_loginForm.php");
class CompLoginForm{

    private $contenu;

		public function __construct() {
        }

        public function affiche() {
            $controleur = new ContLoginForm();
            $this->contenu = $controleur->exec();
            echo $this->contenu;
        }
}
?>