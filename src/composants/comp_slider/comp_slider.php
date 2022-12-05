<?php
  include_once 'cont_slider.php';

	class CompSlider {

        private $contenu;

		public function __construct() {
            $controleur = new ContSlider();
            $this->contenu = $controleur->exec();
        }

        public function affiche() {
            echo $this->contenu;
        }

    }
?>