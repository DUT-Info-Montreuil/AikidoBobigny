<?php
  include_once 'cont_footer.php';

	class CompFooter {

        private $contenu;

		public function __construct() {
            $controleur = new ContFooter();
            $this->contenu = $controleur->exec();
        }

        public function affiche() {
            echo $this->contenu;
        }

    }
?>