<?php
require_once "./vue_generique.php";
class VueInscription extends VueGenerique
{

	public function __construct()
	{
		parent::__construct();
	}

	public function form_inscription() {
		$token = uniqid(rand(), true);
		$_SESSION['token'] = $token;
		$_SESSION['token_time'] = time();
		echo '
			<form action="index.php?module=mod_inscription&action=ajout" method="POST">
				<label for="genre">Genre* :</label>
				<input type="radio" name="genre" value="M" checked> Homme<br>
				<input type="radio" name="genre" value="F"> Femme<br>

				<label for="nom">Nom* :</label>
				<input type="text" name="nom" required maxlength="50"/>

				<label for="prenom">Prenom :</label>
				<input type="text" name="prenom" required maxlength="50"/>

				<label for="email">Adresse mail* :</label>
				<input type="email" name="email" required maxlength="50"/>

				<label for="date_de_naissance">Date de naissance* :</label>
				<input type="date" name="date_de_naissance" required/>

				<label for="numero_de_telephone">Numéro de téléphone* :</label>
				<input type="tel" name="numero_de_telephone" required maxlength="10"/>

				<label for="adresse">Adresse* :</label>
				<input type="text" name="adresse" required maxlength="50"/>

				<label for="code_postal">Code postal* :</label>
				<input type="text" name="code_postal" required maxlength="5"/>

				<label for="ville">Ville* :</label>
				<input type="text" name="ville" required maxlength="50"/>

				<label for="pseudo">Pseudo* :</label>
				<input type="text" name="pseudo" required maxlength="50"/>

				<label for="mot_de_passe">Mot de passe* :</label>
				<input type="password" name="mot_de_passe" required maxlength="50"/>

				<label for="confirmation_mot_de_passe">Confirmation mot de passe* :</label>
				<input type="password" name="confirmation_mot_de_passe" required maxlength="50"/>

				<label for="numero_de_licence">Numéro de licence (si ancien licencié) :</label>
				<input type="text" name="numero_de_licence" maxlength="50"/>

				<label for="reinscription">Réinscription :</label>
				<input type="checkbox" name="reinscription" value="1"/>

				<label for="profession">Profession* :</label>
				<input type="text" name="profession" required maxlength="50"/>

				<label for="nationalite">Nationalité* :</label>
				<input type="text" name="nationalite" required maxlength="50"/>

				<label for="saison">Saison* :</label>
				<input type="text" name="saison" required maxlength="50"/>

				<label for="club">Club* :</label>
				<input type="text" name="club" required maxlength="50"/>

				<input type="hidden" name="token" value="'.$token.'"/>
				<input type="submit" value="Envoyer" />
			</form>';
	}
}