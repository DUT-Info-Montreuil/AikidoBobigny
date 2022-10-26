<?php

    include_once 'vue_menu.php';
    include_once 'modele_menu.php';

	class ContMenu {

        private $modele, $vue;

		public function __construct(ModeleMenu $modele, VueMenu $vue) {
            $this->modele = $modele;
            $this->vue = $vue;
		}

        public function exec() {
            return $this->vue->getContenu();
        }
        
    }

?>