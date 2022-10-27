<?php
require_once("cont_inscription.php");
class ModeleInscription extends Connexion{
       
        public function __construct(){
        }
    


        public function ajoutInscription_ville(){
            $id_ville = "";
            if(isset($_SESSION['token']) && isset($_SESSION['token_time']) && isset($_POST['token'])){
                if($_SESSION['token'] == $_POST['token']){
                    $timestamp_ancien = time() - (15*60);
                        if($_SESSION['token_time'] >= $timestamp_ancien){
                                $ajouterville = parent::$bdd -> prepare('INSERT INTO ville (code_postal,ville) VALUES (?,?)');
                                $ajouterville->execute(array($_POST["code_postal"],$_POST["ville"]));
                                $id_ville = parent::$bdd->lastInsertId();
                            
                        
                           
                        }
                    }
                }
                echo"idvillemodele = $id_ville";
            return $id_ville;
            } 

            public function ajoutInscription_adherent($id_ville){ 
                $id_adherent="";
                if(isset($_SESSION['token']) && isset($_SESSION['token_time']) && isset($_POST['token'])){
                    if($_SESSION['token'] == $_POST['token']){
                        $timestamp_ancien = time() - (15*60);
                            if($_SESSION['token_time'] >= $timestamp_ancien){
                                 $ajouteradhe = parent::$bdd -> prepare('INSERT INTO adherent (sexe,nom,prenom,date_de_naissance,adresse_mail,numero_de_telephone,numero_de_licence,login,mot_de_passe,adresse,ID_ville) VALUES (?,?,?,?,?,?,?,?,?,?,?)');
                                 $ajouteradhe->execute(array($_POST['sexe'],$_POST['nom'],$_POST['prenom'],$_POST['date_de_naissance'],$_POST['email'],$_POST['numero_de_telephone'],$_POST['numero_de_licence'],$_POST['pseudo'],password_hash($_POST['mot_de_passe'],PASSWORD_DEFAULT),$_POST['adresse'],$id_ville));    
                                 $id_adherent = parent::$bdd->lastInsertId();
                            }
                    }
                }
                echo"idadherentmodele = $id_adherent";
                return $id_adherent;
            }


            public function ajoutInscription_inscription($id_adherent){ 
                if(isset($_SESSION['token']) && isset($_SESSION['token_time']) && isset($_POST['token'])){
                    if($_SESSION['token'] == $_POST['token']){
                        $timestamp_ancien = time() - (15*60);
                            if($_SESSION['token_time'] >= $timestamp_ancien){
                                 $ajouter = parent::$bdd-> prepare('INSERT INTO info_inscription (reinscription,profession,nationalite,saison,club,ID_Adherent) VALUES (?,?,?,?,?,?)');
                                 $ajouter->execute(array($_POST["reinscription"],$_POST["profession"],$_POST["nationalite"],$_POST["saison"],$_POST["club"],$id_adherent));
                            }
                    }
                }
            }
    }

?>