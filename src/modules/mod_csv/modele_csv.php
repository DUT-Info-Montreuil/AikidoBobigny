<?php

	class ModeleCSV extends Connexion {
		
		public function __construct() {
			parent::__construct();
		}

		public function genererCSV() {
			$requete = "SELECT * FROM adherent;";
			$resultat = self::$bdd->query($requete);
			$donnees = $resultat->fetchAll(PDO::FETCH_ASSOC);
			$nom_fichier = "adherents.csv";
			$chemin = "fichiers/csv_adherents/".$nom_fichier;
			$fp = fopen($chemin, "w");
			foreach ($donnees as $ligne) {
				fputcsv($fp, $ligne, ";");
			}
			fclose($fp);
		}

	}

?>