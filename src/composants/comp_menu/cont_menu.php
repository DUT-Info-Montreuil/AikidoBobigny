<?php

  include_once 'vue_menu.php';
  include_once 'modele_menu.php';

	class ContMenu {

        private $vue;

		public function __construct() {
            $this->vue = new VueMenu();
		}

        public function exec() {
            $this->vue->completecontenu();
            return $this->vue->getContenu();
        }
        
    }

?>