<?php
session_start();
require_once("../../connexion.php");
Connexion::initConnexion();

    if($_POST["actioncalendrier"]==1){

        if (isset($_POST["targetID"])) {
            $req1 = Connexion::getConnexion()->prepare('DELETE from evenement where ID_evenement= ?');
            $req1->execute(array($_POST['targetID']));
        }
    
    }

    if($_POST["actioncalendrier"]==2){
       
        if($_POST)
            {
        $ajouter_evenement = Connexion::getConnexion() -> prepare('INSERT INTO evenement (debut_evenement,fin_evenement,intitule,evenement,ID_gymnase) VALUES (?,?,?,?,?)');
        $ajouter_evenement->execute(array($_POST["datedebut"],$_POST["datefin"],$_POST["intitule"],$_POST["description"],1));				
                } else {
                header('HTTP/1.1 500 Looks like mysql error, could not insert record!');
                exit();
        }
     };



?>