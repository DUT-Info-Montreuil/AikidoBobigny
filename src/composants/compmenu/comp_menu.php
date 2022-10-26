<?php

    include_once 'cont_menu.php';

	class CompMenu {

        private $contenu;

		public function __construct() {
            $controleur = new ContMenu(new ModeleMenu(), new VueMenu());
            $this->contenu = $controleur->exec();
        }

        public function affiche() {
            echo $this->contenu;
        }

    }

?>