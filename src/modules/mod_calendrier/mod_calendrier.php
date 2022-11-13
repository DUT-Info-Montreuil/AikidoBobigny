<?php

    include_once 'cont_calendrier.php';

	class ModCalendrier {

        private $vue;

		public function __construct() {
            $this->vue = new VueCalendrier();
            $controleur = new ContCalendrier(new ModeleCalendrier(), $this->vue);
            $controleur->exec();
        }

        public function getAffichage() {
            return $this->vue->getAffichage();
        }
    }

?>