<?php
require_once("cont_mail.php");
class ModeleMail extends Connexion
{
	
	public function __construct(){
		
	}

	public function envoie_Verif_Mail(){
		
		$req = self::$bdd->prepare("SELECT  * from adherent where ID_adherent=".$_SESSION['idadh']."");
		$req->execute(array($_SESSION['idadh']));
		$userest = $req->rowCount();

		if($userest == 1){
			$user = $req->fetch();
			if($user['mailverif'] == 0){
					$update = self::$bdd->prepare("UPDATE adherent SET mailverif = 1 where ID_adherent = ? ");
					$update -> execute(array($_SESSION['idadh']));
					echo"Votre mail a bien été confirmé, vous recevrez un mail quand tout vos documents seront vérifié .";
			}else{
				echo"Votre compte a déjà été confirmé";
			}
		}else{
			echo "L'utilisateur n'existe pas";
		}
	}

	public function message_Valid_Commentaire(){
		$req = self::$bdd->prepare("SELECT  * from adherent where ID_adherent=".$_SESSION['idadh']."");
		$req->execute(array($_SESSION['idadh']));
		$userest = $req->rowCount();

		if($userest == 1){
			$user = $req->fetch();
			if($user['mailverif'] == 0){
				$update = self::$bdd->prepare("UPDATE adherent SET mailverif = 1 where ID_adherent = ? ");
				$update -> execute(array($_SESSION['idadh']));
			}
		}else{
			echo "L'utilisateur n'existe pas";
		}

	}

	public function message_Verif_inscription(){
	
		$req = self::$bdd->prepare("SELECT  * from adherent where ID_adherent=".$_SESSION['idadh']."");
		$req->execute(array($_SESSION['idadh']));
		$userest = $req->rowCount();

		if($userest == 1){
			$user = $req->fetch();
			if($user['mailverif'] == 0){
					$update = self::$bdd->prepare("UPDATE adherent SET inscripverif = 1 where id = ? ");
					$update -> execute(array($_SESSION['id']));
			}
		}else{
			echo "L'utilisateur n'existe pas";
		}
	}


}
