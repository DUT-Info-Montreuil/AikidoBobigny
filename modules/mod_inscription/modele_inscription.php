<?php
require_once("cont_inscription.php");
class ModeleInscription extends Connexion{
       
        public function __construct(){
        }
    


        public function ajoutInscription(){

            if(isset($_SESSION['token']) && isset($_SESSION['token_time']) && isset($_POST['token'])){
                if($_SESSION['token'] == $_POST['token']){
                    $timestamp_ancien = time() - (15*60);
                        if($_SESSION['token_time'] >= $timestamp_ancien){
                            $ajouterville = parent::$bdd -> prepare('INSERT INTO Ville (Code_postal,ville) VALUES (?,?)');
                            $ajouterville->execute(array($_POST["Code_postal"],$_POST["ville"]));
                            $id_ville = parent::$bdd->lastInsertId();
                            $ajouteradhe = parent::$bdd -> prepare('INSERT INTO adherent (sexe,nom,prenom,date_de_naissance,adresse_mail,numero_de_telephone,numero_de_licence,login,mot_de_passe,adresse,ID_ville) VALUES (?,?,?,?,?,?,?,?,?,?,?)');
                            $ajouteradhe->execute(array($_POST['sexe'],$_POST['nom'],$_POST['prenom'],$_POST['date_de_naissance'],$_POST['adresse_mail'],$_POST['numero_de_telephone'],$_POST['numero_de_licence'],$_POST['login'],password_hash($_POST['mot_de_passe'],PASSWORD_DEFAULT),$_POST['adresse'],$id_ville));    
                            $id_adherent = parent::$bdd->lastInsertId();
                            $ajouter = parent::$bdd-> prepare('INSERT INTO info_inscription (reinscription,profession,nationalite,saison,club,ID_Adherent) VALUES (?,?,?,?,?,?)');
                            $ajouter->execute(array($_POST["reinscription"],$_POST["profession"],$_POST["nationalite"],$_POST["saison"],$_POST["club"],$id_adherent));
                            echo"Inscription réussi";
                        }
                    }
                }
            } 

        }

?>