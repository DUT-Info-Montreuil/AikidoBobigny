<?php
require_once "./vue_generique.php";
class VueInscription extends VueGenerique{

	public function __construct(){
		parent::__construct();
	}   

	public function form_inscription(){
		$token = uniqid(rand(), true);       
		$_SESSION['token'] = $token;
		$_SESSION['token_time'] = time();
		echo'<form action="index.php?module=mod_inscription&action=inscription" method="POST">
				<p>Genre*:</p> <input type="text" name="sexe" required maxlength="50"/>
				<p>Nom* :</p> <input type="text" name="nom" required maxlength="50"/>
				<p>Prénom* :</p> <input type="text" name="prenom" required maxlength="50"/>
				<p>Date de naissance*:</p> <input type="date" name="date_de_naissance" required maxlength="50"/>
				<p>Adresse mail*:</p> <input type="email" name="adresse_mail" required maxlength="50"/>
				<p>Numéro de téléphone* :</p> <input type="tel" name="numero_de_telephone" required maxlength="50"/>
				<p>Adresse* :</p> <input type="text" name="adresse" required maxlength="50"/>
				<p>Code postal* :</p> <input type="text" name="code_postal" required maxlength="50"/>
				<p>Ville* :</p> <input type="text" name="ville" required maxlength="50"/>
				<p>Login*:</p> <input type="text" name="login" required maxlength="50"/>
				<p>Votre mot de passe* :</p> <input type="password" name="mot_de_passe" required maxlength="50"/>
				<p>Numéro de licence (si ancien licencier) :</p> <input type="tel" name="numero_de_licence" required maxlength="50"/>
				<p>Reinscription:</p> <input type="text" name="reinscription" required maxlength="50"/>
				<p>Profession*:</p> <input type="text" name="profession" required maxlength="50"/>
				<p>Nationalité*:</p> <input type="text" name="nationalite" required maxlength="50"/>
				<p>Saison*:</p> <input type="text" name="saison" required maxlength="50"/>
				<p>Club*:</p> <input type="text" name="club" required maxlength="50"/>
				<input type="hidden" name="token" id="token" value="'.$token.'"/>
				<input type="submit"/>
			</form>';
	}    
}


?>