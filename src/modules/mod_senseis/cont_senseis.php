<?php

	include_once 'vue_senseis.php';
	include_once 'modele_senseis.php';

	class ContSenseis {

		private $modele, $vue;

		public function __construct(ModeleSenseis $modele, VueSenseis $vue) {
			$this->modele = $modele;
			$this->vue = $vue;
		}

		function Senseis() {
			$this->vue->afficherSenseis();
		}

		function exec() {
			$this->Senseis();
		}
		
	}

?>