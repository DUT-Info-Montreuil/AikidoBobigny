<?php

session_start();
require_once("../../connexion.php");
include_once('./modules/mod_mail/vue_mail.php');
Connexion::initConnexion();
            if($_POST["actionadherent"]==1){
                        
                if (isset($_POST["targetID"])) {
                    $req1 = Connexion::getConnexion()->prepare('DELETE from info_inscription where ID_adherent= ? ');
                    $req1->execute(array($_POST['targetID']));
                    $req = Connexion::getConnexion()->prepare('DELETE from adherent where ID_adherent= ? ');
                    $req->execute(array($_POST['targetID']));
                }
            }

            if($_POST["actionadherent"]==2){
                if (isset($_POST["targetID"])) {
                    $req = Connexion::getConnexion()->prepare('UPDATE adherent SET mailverif = 1 where ID_adherent = ?');
                    $req->execute(array($_POST['targetID']));
                }
            }

            if($_POST["actionadherent"]==3){
                if (isset($_POST["targetID"])) {
                    $req = Connexion::getConnexion()->prepare('UPDATE adherent SET inscripverif = 1 where ID_adherent = ?');
                    $req->execute(array($_POST['targetID']));
                }
            }

            if($_POST["actionadherent"]==4){
                if (isset($_POST["targetID"])) {
                    $req = Connexion::getConnexion()->prepare('UPDATE adherent SET admin = 1 where ID_adherent = ?');
                    $req->execute(array($_POST['targetID']));
                }
            };

            if($_POST["actionadherent"]==5){
                if (isset($_POST["targetID"])) {
                    $req = Connexion::getConnexion()->prepare('UPDATE adherent SET inscripverif = 0 where ID_adherent = ?');
                    $req->execute(array($_POST['targetID']));
                }
            };


            if($_POST["actionadherent"]==6){
                if (isset($_POST["targetID"])) {
                    $req = Connexion::getConnexion()->prepare('UPDATE adherent SET mailverif = 0 where ID_adherent = ?');
                    $req->execute(array($_POST['targetID']));
                }
            };

                
?>