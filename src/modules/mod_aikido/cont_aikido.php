<?php

	include_once 'vue_aikido.php';
	include_once 'modele_aikido.php';

	class ContAikido {

		private $modele, $vue;

		public function __construct(ModeleAikido $modele, VueAikido $vue) {
			$this->modele = $modele;
			$this->vue = $vue;
		}

		function Aikido() {
			$this->vue->afficherAikido();
		}

		function exec() {
			$this->Aikido();
		}
		
	}

?>