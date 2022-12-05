<?php

    include_once 'cont_aikido.php';

	class ModAikido {

        private $vue;

		public function __construct() {
            $this->vue = new VueAikido();
            $controleur = new ContAikido(new ModeleAikido(), $this->vue);
            $controleur->exec();
        }

        public function getAffichage() {
            return $this->vue->getAffichage();
        }
    }

?>