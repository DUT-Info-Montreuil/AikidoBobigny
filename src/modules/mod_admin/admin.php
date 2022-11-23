<?php

session_start();
require_once("../../connexion.php");
Connexion::initConnexion();
            if($_POST["actionadherent"]==1){

                        if (isset($_POST["targetID"])) {
                            $req1 = Connexion::getConnexion()->prepare('DELETE from info_inscription where ID_adherent= ? ');
                            $req1->execute(array($_POST['targetID']));
                            $req = Connexion::getConnexion()->prepare('DELETE from adherent where ID_adherent= ? ');
                            $req->execute(array($_POST['targetID']));
                        }
            };

                
?>