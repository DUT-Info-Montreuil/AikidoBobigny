<?php
require_once("cont_inscription.php");
class ModeleInscription extends Connexion{
       
        public function __construct(){
        }
    


        public function ajoutInscription(){
            $ajouter = parent::$bdd -> prepare('INSERT INTO Adhérent (Sexe,nom,prenom,date_de_naissance,adresse_mail,Numéro_de_téléphone,Numéro_de_licence,adresse,login,mdp) VALUES (?,?,?,?,?,?,?,?,?,?)');
            $ajouter->execute(array($_POST['login'],password_hash($_POST['mdp'],PASSWORD_DEFAULT)));    
            
        }
    
    }

?>