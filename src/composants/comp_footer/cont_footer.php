<?php

  include_once 'vue_footer.php';
  include_once 'modele_footer.php';

	class ContFooter {

        private $vue;

		public function __construct() {
            $this->vue = new VueFooter();
		}

        public function exec() {
            return $this->vue->getContenu();
        }
        
    }

?>