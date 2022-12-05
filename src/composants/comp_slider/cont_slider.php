<?php

  include_once 'vue_slider.php';
  include_once 'modele_slider.php';

	class ContSlider {

        private $modele, $vue;

		public function __construct() {
            $this->modele = new ModeleSlider();
            $this->vue = new VueSlider();
		}

        public function exec() {
            return $this->vue->getContenu();
        }
        
    }

?>