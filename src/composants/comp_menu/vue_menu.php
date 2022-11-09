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
					<li><a href='index.php?module=upload&action=form_upload'>Déposer un fichier</a></li>
					<li><a href='index.php?module=csv&action=menu'>Générer un fichier CSV</a></li>
          			<li><a href='index.php?module=commentaire&action=Commentaire'>Commentaire</a><li>";
		}

		public function completecontenu(){
			if(isset($_SESSION['connexion'])){
				$this->contenu.="<li><a href='index.php?module=connexion&action=deconnexion'>Deconnexion</a></li>";
			}else{
				$this->contenu.="<li><a href='index.php?module=connexion&action=form_connexion'>Se connecter</a></li>
                          <li><a href='index.php?module=inscription&action=form_inscription'>Inscription</a></li>";
			}
			$this->contenu.="</ul></div>";
		}

		public function getContenu() {
			return $this->contenu;
		}
    }
?>