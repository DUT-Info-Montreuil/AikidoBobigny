<?php

include_once 'connexion.php';

class ModeleCalendrier extends Connexion{

    public function __construct(){

    }

    public function insertEvenement(){
        $sql = ('INSERT INTO evenement (evenement,debut_evenement,fin_evenement,ID_gymnase) VALUES (?,?,?,?) ');
        $sth = parent::$bdd->prepare($sql);
        $sth->execute(array($_POST['titreEvenement'],$_POST['date_debut_evenement'],$_POST['date_fin_evenement'],$_POST['id_gymnase']));
    }

    public function deleteEvenement(){
    }

}



?>