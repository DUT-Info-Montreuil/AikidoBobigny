<?php

	include_once './vue_generique.php';

	class VueMenu {

		private $contenu;

		public function __construct() {
			$this->contenu = 
			"<div id='menu'>
				<ul>
					<li><a href='index.php'>Acceuil</a></li>
					<li><a href='index.php?module=presentation&action=affiche'>L'Aïkido</a></li>
					<li><a href='index.php?module=enseignant&action=affiche'>Les Senseis</a></li>
					<li><a href='index.php?module=tarif&action=affiche'>Tarifs</a></li>
					<li><a href='index.php?module=blog&action=affiche'>Blog</a></li>
					<li><a href='index.php?module=contact&action=affiche'>Contact</a></li>
				</ul>
			</div>";
					
		}

		public function getContenu() {
			return $this->contenu;
		}
    }

?>