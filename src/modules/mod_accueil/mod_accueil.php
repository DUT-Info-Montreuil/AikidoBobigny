<?php

    include_once 'cont_accueil.php';

	class ModAccueil {

        private $vue;

		public function __construct() {
            $this->vue = new VueAccueil();
            $controleur = new ContAccueil(new ModeleAccueil(), $this->vue);
            $controleur->exec();
        }

        public function getAffichage() {
            return $this->vue->getAffichage();
        }
    }

?>