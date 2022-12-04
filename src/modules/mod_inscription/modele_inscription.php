<?php

class ModeleInscription extends Connexion
{
							
	public function __construct(){}

	public function ajout_ville() {
		$id_ville = "";
		if (isset($_SESSION['token']) && isset($_SESSION['token_time']) && isset($_POST['token'])) {
			if ($_SESSION['token'] == $_POST['token']) {
				$timestamp_ancien = time() - (15 * 60);
				if ($_SESSION['token_time'] >= $timestamp_ancien) {
					$requete = self::$bdd->prepare("SELECT * FROM ville WHERE code_postal = :code_postal");
					$requete->execute(array(':code_postal' => $_POST['code_postal']));
					$donnees = $requete->fetch();
					if ($donnees) {
						$id_ville = $donnees['ID_ville'];
					} else {
						$requete = self::$bdd->prepare("INSERT INTO ville (code_postal, ville) VALUES (:code_postal, :ville)");
						$requete->execute(array(':code_postal' => $_POST['code_postal'], ':ville' => $_POST['ville']));
						$id_ville = self::$bdd->lastInsertId();
					}
				}
			}
		}
		return $id_ville;
	}

	public function ajout_adherent_inscription() {
		$id_adherent = "";
		if (isset($_SESSION['token']) && isset($_SESSION['token_time']) && isset($_POST['token'])) {
			if ($_SESSION['token'] == $_POST['token']) {
				$timestamp_ancien = time() - (15 * 60);
				if ($_SESSION['token_time'] >= $timestamp_ancien) {
					$ajouteradhe = self::$bdd->prepare('INSERT INTO adherent (sexe,nom,prenom,date_de_naissance,adresse_mail,numero_de_telephone,login,mot_de_passe,adresse,ID_ville) VALUES (?,?,?,?,?,?,?,?,?,?)');
					$ajouteradhe->execute(array($_POST['sexe'], $_POST['nom'], $_POST['prenom'], $_POST['date_naissance'], $_POST['email'], $_POST['tel_port'], $_POST['identifiant'], password_hash($_POST['mdp'], PASSWORD_DEFAULT), $_POST['adresse'], $this->ajout_ville()));
					$_SESSION['mail'] = $_POST['email'];
					$id_adherent = self::$bdd->lastInsertId();
					$_SESSION ['idadh']= $id_adherent;
/* 					var_dump($ajouteradhe->errorInfo()); */
				}
			}
		}
		return $id_adherent;
	}


	public function inscription() {
		if (isset($_SESSION['token']) && isset($_SESSION['token_time']) && isset($_POST['token'])) {
			if ($_SESSION['token'] == $_POST['token']) {
				$timestamp_ancien = time() - (15 * 60);
				if ($_SESSION['token_time'] >= $timestamp_ancien) {
					$ajouter = parent::$bdd->prepare('INSERT INTO info_inscription (profession,nationalite,saison,ID_Adherent) VALUES (?,?,?,?)');
					$ajouter->execute(array( $_POST["profession"], $_POST["nationalite"], $_POST["saison"], $this->ajout_adherent_inscription()));
				}
			}
		}
		
	}
}
