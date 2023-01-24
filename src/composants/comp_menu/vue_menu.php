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
					<li><a href='index.php' class='menu-link'>Accueil</a></li>
					<li><a href='index.php?module=aikido' class='menu-link'>L'Aïkido</a></li>
					<li><a href='index.php?module=senseis' class='menu-link'>Les Senseis</a></li>
					<li><a href='index.php?module=article' class='menu-link'>Blog</a></li>
					<li><a href='index.php?module=faq' class='menu-link'>FAQ</a></li>";			
		}

		public function completecontenu(){
			if(isset($_SESSION['idadh'])){
				$this->contenu.="<li> <a href='index.php?module=compte' id='decoBtn'><i class='fa-regular fa-user' style='float: right;'></i></a></li>";
			}else{
				$this->contenu.="<li><button class='menu-btn' id='log-btn' >se connecter</button></li>
				<li><a href='index.php?module=inscription' class='menu-btn' id='sign-btn'>adherer</a></li>";
			}
			$this->contenu.="</ul></nav>";
		}
		
		public function completeadmin(){
			///if(isset($_SESSION['admin'])&& $_SESSION['admin']==1){
				return "<li><a href='index.php?module=admin&action=admin'>Admin</a><li>";
			///}
		}
		

		public function getContenu() {
			return $this->contenu;
		}
    }
?>