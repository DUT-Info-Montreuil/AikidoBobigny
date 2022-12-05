<?php

include_once './vue_generique.php';

class VueFooter
{

	private $contenu;

	public function __construct()
	{
		$this->contenu =
			'<footer class="footer">
			<div class="footer-top">
			<img class="hublogo" src="fichiers/logo_acb.png" alt="logo" />
		</div>
		<div class="footer-bottom">
			<div id="footer-left">
				<h2>Documents Pratiques</h2>
				<a href="fichiers/reglement.pdf" target="_blank">Reglement du club</a>
				<a href="fichiers/livret-jeune.pdf" target="_blank">Livret Jeune</a>
				<a href="fichiers/guide-debutant.pdf" target="_blank">Guide Débutant</a>
				<a href="fichiers/formulaire-adhesion.pdf" target="_blank">Formulaire d\'adhesion</a>
			</div>
			<div id="footer-middle">
				<h2>En Savoir +</h2>
				<a href="index.php?module=aikido">L\'aikido</a>
				<a href="index.php?module=article">Blog</a>
				<a href="index.php?module=faq">FAQ</a>
			</div>
			<div id="footer-right">
				<h2>Liens Utiles</h2>
			';
			if(isset($_SESSION['idadh'])){
				$this->contenu.='<a href="index.php?module=compte">Mon Profil</a>';
			} else {
				$this->contenu.='<a href="index.php?module=inscription">Adhérer</a>
				<a onclick="showForm()">Connexion</a>';
			}
			$this->contenu.='
				<a href="index.php">Nous contacter</a>
				<a href="index.php">Nos reseaux</a>
			</div>
		</div>

		</footer>';
	}

	public function getContenu()
	{
		return $this->contenu;
	}
}

?>