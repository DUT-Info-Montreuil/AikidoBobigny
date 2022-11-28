<?php

	include_once './vue_generique.php';

	class VueMenu {

		private $contenu;

		public function __construct() {
			$this->contenu = 
			"<nav id='navbar'>
				<div class='logo'>
					<a href='index.php'>AÏKIDO BOBIGNY</a>
				</div>
				<ul>
					<li><a href='index.php' class='menu-link'>Acceuil</a></li>
					<li><a href='index.php?module=presentation&action=affiche' class='menu-link'>L'Aïkido</a></li>
					<li><a href='index.php?module=enseignant&action=affiche' class='menu-link'>Les Senseis</a></li>
					<li><a href='index.php?module=tarif&action=affiche' class='menu-link'>Tarifs</a></li>
					<li><a href='index.php?module=blog&action=affiche' class='menu-link'>Blog</a></li>
					<li><a href='index.php?module=contact&action=affiche' class='menu-link'>Contact</a></li>
					<li><a href='index.php?module=commentaire&action=commentaire' class='menu-link'>Commentaire</a></li>";			
		}

		public function completecontenu(){
			if(isset($_SESSION['connexion'])){
				$this->contenu.="<li><a href='index.php?module=compte'><i class='fa-regular fa-user'></i></a></li>";
			}else{
				$this->contenu.="<li><button class='menu-btn' id='log-btn' onclick=\"showForm()\">se connecter</button></li>
				<li><a href='index.php?module=inscription' class='menu-btn' id='sign-btn'>adherer</a></li>";
			}
			$this->contenu.="</ul></nav>";
		}

		public function getContenu() {
			return $this->contenu;
		}
    }
?>