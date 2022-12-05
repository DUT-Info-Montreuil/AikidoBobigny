
<?php

require_once "./vue_generique.php";
class VueCompte extends VueGenerique
{

	public function __construct()
	{
		parent::__construct();
	}

	public function affichageprincipal($tableau)
	{
		$infos = "
			<div class='infosPersosCompte'>
				<h2>Informations personnelles</h2>
				<p>Nom : ".htmlspecialchars($tableau['nom'])."</p>
				<p>Prénom : ".htmlspecialchars($tableau['prenom'])."</p>
				<p>Date de naissance : ".htmlspecialchars($tableau['date_de_naissance'])."</p>
				<p>Adresse : ".htmlspecialchars($tableau['adresse'])."</p>
				<p>Code postal : ".htmlspecialchars($tableau['code_postal'])."</p>
				<p>Téléphone : ".htmlspecialchars($tableau['numero_de_telephone'])."</p>
				<p>Mail : ".htmlspecialchars($tableau['adresse_mail'])."</p>
				<p>Identifiant : ".htmlspecialchars($tableau['login'])."</p>";
		if(isset($_SESSION['admin']) && $_SESSION['admin'] == 1){
			$infos .= "<a href='index.php?module=admin&action=admin' class='lienAdmin'>ADMINISTRATION</a>";
		}
		$infos .= "</div>";
		echo $infos;
	}
}






?>