<?php

include_once 'connexion.php';

class ModeleArticle extends Connexion{

    public function __construct(){

    }

    public function insertArticle(){
        $sql = ('INSERT INTO article (date,titre,texte) VALUES (?,?,?) ');
        $sth = parent::$bdd->prepare($sql);
        $sth->execute(array($_POST['dateArticle'],$_POST['titreArticle'],$_POST['texteArticle']));
    }

    public function articleRecherche(){
        $sql =('SELECT titre,texte FROM article where date = ? ');
        $sth = parent::$bdd->prepare($sql);
        $sth->execute(array($_POST['datevoulu']));
        return $sth->fetch();
    }

    public function deleteArticle($id){
    }

}



?>
