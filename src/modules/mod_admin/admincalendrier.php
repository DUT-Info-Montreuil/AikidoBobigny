<?php
session_start();
require_once("../../connexion.php");
Connexion::initConnexion();

if($_POST["actioncalendrier"]==1){

    if (isset($_POST["targetID"])) {
        $req1 = Connexion::getConnexion()->prepare('DELETE from evenement where ID_evenement= ?');
        $req1->execute(array($_POST['targetID']));

    }
    };

?>