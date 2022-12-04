<?php
session_start();
require_once("../../connexion.php");
Connexion::initConnexion();
$bdd = Connexion::getConnexion();
$reponse = "";

if (isset($_SESSION['token']) && isset($_SESSION['token_time']) && isset($_POST['token'])) {
	if ($_SESSION['token'] == $_POST['token']) {
		$timestamp_ancien = time() - (15 * 60);
		if ($_SESSION['token_time'] >= $timestamp_ancien) {
			if (isset($_POST['sexe']) && isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['date_naissance']) && isset($_POST['email']) && isset($_POST['tel_port']) && isset($_POST['identifiant']) && isset($_POST['mdp']) && isset($_POST['adresse']) && isset($_POST['code_postal']) && isset($_POST['ville'])) {
				
				$verifLogin = $bdd->prepare('SELECT * FROM adherent WHERE login = ?');
				$verifLogin->execute(array($_POST['identifiant']));
				$donnees = $verifLogin->fetch();
				if ($donnees) {
					$reponse = "loginUsed";
				} else {
					$verifNomMail = $bdd->prepare('SELECT * FROM adherent WHERE adresse_mail = ? AND nom = ? AND prenom = ?');
					$verifNomMail->execute(array($_POST['email'], $_POST['nom'], $_POST['prenom']));
					$donnees = $verifNomMail->fetch();
					if ($donnees) {
						$reponse = "alreadyRegistered";
					} else {
						$requete = $bdd->prepare("SELECT * FROM ville WHERE code_postal = :code_postal");
						$requete->execute(array(':code_postal' => $_POST['code_postal']));
						$donnees = $requete->fetch();
						if ($donnees) {
							$id_ville = $donnees['ID_ville'];
						} else {
							$requete = $bdd->prepare("INSERT INTO ville (code_postal, ville) VALUES (:code_postal, :ville)");
							$requete->execute(array(':code_postal' => $_POST['code_postal'], ':ville' => $_POST['ville']));
							$id_ville = $bdd->lastInsertId();
						}
						$ajouteradhe = $bdd->prepare('INSERT INTO adherent (sexe,nom,prenom,date_de_naissance,adresse_mail,numero_de_telephone,login,mot_de_passe,adresse,ID_ville) VALUES (?,?,?,?,?,?,?,?,?,?)');
						$ajouteradhe->execute(array($_POST['sexe'], $_POST['nom'], $_POST['prenom'], $_POST['date_naissance'], $_POST['email'], $_POST['tel_port'], $_POST['identifiant'], password_hash($_POST['mdp'], PASSWORD_DEFAULT), $_POST['adresse'], $id_ville));
						$id_adherent = $bdd->lastInsertId();
						$_SESSION['mail'] = $_POST['email'];
						$_SESSION['idadh'] = $id_adherent;
						$ajouter = $bdd->prepare('INSERT INTO info_inscription (profession,nationalite,saison,ID_Adherent) VALUES (?,?,?,?)');
						$ajouter->execute(array($_POST["profession"], $_POST["nationalite"], $_POST["saison"], $id_adherent));

						if (isset($_FILES['piece_identite']) && isset($_FILES['attestation_sante']) && isset($_FILES['droit_image']) && isset($_FILES['certificat_medical']) && isset($_FILES['autorisation_parentale'])) {
							$fichier1 = $_FILES['piece_identite'];
							$fichier2 = $_FILES['attestation_sante'];
							$fichier3 = $_FILES['droit_image'];
							$fichier4 = $_FILES['certificat_medical'];
							$fichier5 = $_FILES['autorisation_parentale'];
							$fichiers = array($fichier1, $fichier2, $fichier3, $fichier4, $fichier5); // on crée un tableau avec les fichiers
							try {
								mkdir('fichiers/fichiers_adherents/' . $_SESSION['idadh'], 0777, true); // on crée le dossier avec l'id de l'adhérent
							} catch (\Throwable $th) {
							}
							$i = 1;
							foreach ($fichiers as $fichier) {
								// si le fichier a bien été envoyé
								if ($fichier['error'] == 0) {
									$extension = pathinfo($fichier['name'], PATHINFO_EXTENSION); // on récupère son extension
									$extensions_autorisees = array('jpg', 'jpeg', 'pdf', 'png'); // on crée un tableau avec les extensions autorisées
									// si l'extension du fichier est autorisée
									if (in_array($extension, $extensions_autorisees)) {
										$nom_unique = md5(uniqid(rand(), true)); // on crée un nom unique pour le fichier
										$nom_fichier = $nom_unique . '.' . $extension; // on crée le nom du fichier
										$chemin_fichier = 'fichiers/fichiers_adherents/' . $_SESSION['idadh'] . '/' . $nom_fichier; // on crée le chemin du fichier
										move_uploaded_file($fichier['tmp_name'], $chemin_fichier); // on déplace le fichier temporaire vers le chemin de destination
										$requete = $bdd->prepare('INSERT INTO pieces_justificatives (ID_adherent, ID_type, nom_piece) VALUES (?, ?, ?)');
										$requete->execute(array($_SESSION['idadh'], $i, $nom_fichier));
									}
								}
								$i++;
							}
						}
						$reponse = 'ok';
					}
				}
			}
		}
	}
}
echo $reponse;