<?php
  include_once 'cont_menu.php';

	class CompMenu {

        private $contenu;

		public function __construct() {
            $controleur = new ContMenu();
            $this->contenu = $controleur->exec();
        }

        public function affiche() {
            echo $this->contenu;
        }

    }

?>