<?php

	class VueMenu {

		private $contenu;

		public function __construct() {
			$this->contenu = 
			"<div id='header'>
				<ul>
					<li><a href='index.php'>AIKIDO BOBIGNY</a></li>
					<li><a href='index.php?module=upload&action=form_upload'>Déposer un fichier</a></li>
				</ul>
			</div>";
		}

		public function getContenu() {
			return $this->contenu;
		}
    }

?>