<?php

include_once 'connexion.php';

class ModeleCompte extends Connexion{

    public function __construct(){
        
    }

    public function getadherents(){
        $tab = parent::$bdd ->prepare('select * from adherent join ville on adherent.ID_ville = ville.ID_ville where ID_adherent = ?');
        $tab->execute(array($_SESSION["idadh"]));
        return $tab->fetch();
    }
    

}



?>