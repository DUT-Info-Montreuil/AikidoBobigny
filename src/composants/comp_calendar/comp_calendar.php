<?php

    include_once 'cont_calendar.php';

	class CompCalendar {

        private $contenu;

		public function __construct() {
            $controleur = new ContCalendar();
            $this->contenu = $controleur->exec();
        }

        public function affiche() {
            echo $this->contenu;
        }
    }

?>