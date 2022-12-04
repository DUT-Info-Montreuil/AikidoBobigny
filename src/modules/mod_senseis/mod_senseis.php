<?php

    include_once 'cont_senseis.php';

	class ModSenseis {

        private $vue;

		public function __construct() {
            $this->vue = new VueSenseis();
            $controleur = new ContSenseis(new ModeleSenseis(), $this->vue);
            $controleur->exec();
        }

        public function getAffichage() {
            return $this->vue->getAffichage();
        }
    }

?>