<?php

	include_once 'vue_accueil.php';
	include_once 'modele_accueil.php';

	class ContAccueil {

		private $modele, $vue;

		public function __construct(ModeleAccueil $modele, VueAccueil $vue) {
			$this->modele = $modele;
			$this->vue = $vue;
		}

		function accueil() {
			$this->vue->afficherAccueil();
		}

		function exec() {
			$this->accueil();
		}
		
	}

?>