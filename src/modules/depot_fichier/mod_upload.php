<?php

    include_once 'cont_upload.php';

	class ModUpload {

        private $vue;

		public function __construct() {
            $this->vue = new VueUpload();
            $controleur = new ContUpload(new ModeleUpload(), $this->vue);
            $controleur->exec();
        }

        public function getAffichage() {
            return $this->vue->getAffichage();
        }
    }

?>