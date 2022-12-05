<?php

include_once 'connexion.php';

class ModeleCompte extends Connexion{

    public function __construct(){
        
    }

    public function getadherents(){
        $tab = parent::$bdd ->prepare('select * from adherent where ID_adherent = ?');
        $tab->execute(array($_SESSION["idadh"]));
        return $tab->fetch();
    }
    

}



?>