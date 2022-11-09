<?php

require_once "./vue_generique.php";

class VueCSV extends VueGenerique {

	public function __construct(){
		parent::__construct();
	}

	public function afficherGenererCSV() {
		echo '<h1> Génération du fichier CSV </h1>';
		echo '<p> <a href="index.php?module=csv&action=generate"> Générer un nouveau fichier CSV </a> </p>';
		if (file_exists("fichiers/csv_adherents/adherents.csv")) {
			echo '<p><a href="./fichiers/csv_adherents/adherents.csv" target="_blank">Télécharger le fichier CSV </a></p>';
		}
	}
}

?>