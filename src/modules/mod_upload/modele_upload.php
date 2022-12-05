<?php
    include_once './connexion.php';

	class ModeleUpload extends Connexion {

		public function __construct() {}

        function upload() {
			if(isset($_SESSION['token']) && isset($_SESSION['token_time']) && isset($_POST['token'])){
				if($_SESSION['token'] == ($_POST['token'])){
					$timestamp_ancien = time() - (15*60);
					if($_SESSION['token_time'] >= $timestamp_ancien){
			if (isset($_FILES['piece_identite']) && isset($_FILES['attestation_sante']) && isset($_FILES['droit_image']) && isset($_FILES['certificat_medical']) && isset($_FILES['autorisation_parentale'])) {
				$fichier1 = $_FILES['piece_identite'];
				$fichier2 = $_FILES['attestation_sante'];
				$fichier3 = $_FILES['droit_image'];
				$fichier4 = $_FILES['certificat_medical'];
				$fichier5 = $_FILES['autorisation_parentale'];
				$fichiers = array($fichier1, $fichier2, $fichier3, $fichier4, $fichier5);// on crée un tableau avec les fichiers
				
                $i = 1;
				foreach ($fichiers as $fichier) {
					// si le fichier a bien été envoyé
					if ($fichier['error'] == 0) {
						$extension = pathinfo($fichier['name'], PATHINFO_EXTENSION);// on récupère son extension
						$extensions_autorisees = array('jpg', 'jpeg', 'pdf', 'png');// on crée un tableau avec les extensions autorisées
						// si l'extension du fichier est autorisée
						if (in_array($extension, $extensions_autorisees)) {
							$nom_unique = md5(uniqid(rand(), true));// on crée un nom unique pour le fichier
							$nom_fichier = $nom_unique . '.' . $extension;// on crée le nom du fichier
							$chemin_fichier = 'fichiers/' . $nom_fichier;// on crée le chemin du fichier
							move_uploaded_file($fichier['tmp_name'], $chemin_fichier);// on déplace le fichier temporaire vers le chemin de destination
                            $requete = self::$bdd->prepare('INSERT INTO pieces_justificatives (ID_adherent, ID_type, nom_piece) VALUES (?, ?, ?)');
                            $requete->execute(array($_SESSION['ID_adherent'], $i, $nom_fichier));
							var_dump($requete->errorInfo());
							echo 'Le fichier ' . $fichier['name'] . ' a bien été envoyé.<br>';// on affiche un message de succès
						} else {
							echo 'Le fichier ' . $fichier['name'] . ' n\'a pas été envoyé car son extension n\'est pas autorisée.<br>';// on affiche un message d'erreur
						}
					} else {
						echo 'Le fichier ' . $fichier['name'] . ' n\'a pas été envoyé.<br>';// on affiche un message d'erreur
					}
                    $i++;
				}
			} else {
                echo "il manque des fichiers";
            }
		}}};
        }
	
        
    }

?>