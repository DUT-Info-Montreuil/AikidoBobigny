<?php

include_once 'connexion.php';

class ModeleArticle extends Connexion{

    public function __construct(){
    }

    public function insertArticle(){
        $sql = ('INSERT INTO article (date,titre,texte,img_nom,img_taille,img_type,img_bin) VALUES (?,?,?,?,?,?,?)');
        $sth = parent::$bdd->prepare($sql);
        $sth->execute(array($_POST['dateArticle'],$_POST['titreArticle'],$_POST['texteArticle'],$_FILES['image']['name'],
        $_FILES['image']['size'],$_FILES['image']['type'],file_get_contents($_FILES['image']['tmp_name'])));
    }

    public function articleRecherche(){
        $dateVoulu = $_POST['datevoulu'] ;
        $sql =("SELECT titre,ID_article FROM article WHERE date = '$dateVoulu' ");
        $sth = parent::$bdd->prepare($sql);
        $sth->execute();
        return $sth->fetchAll();
    }


    public function articleRechercheDetails($id){ 
        $sql =("SELECT * FROM article WHERE ID_article = ? ");
        $sth = parent::$bdd->prepare($sql);
        $sth->execute(array($id));
        return $sth->fetch();
    }

    public function deleteArticle(){
        $titreVoulu = $_POST['titrevoulu'];
        $sql=("DELETE FROM article WHERE titre = '$titreVoulu'");
        $sth = parent::$bdd->prepare($sql);
        $sth->execute();
    }

    public function articleRechercheCommentaire(){
        $sql =("SELECT titre,ID_article FROM article");
        $sth = parent::$bdd->prepare($sql);
        $sth->execute();
        return $sth->fetchAll();
    }

    /*
    public function articlesRecent(){
        $sql = ("SELECT titre,ID_article FROM article WHERE DATEDIFF(NOW(),date) <= 7");
        $sth = parent::$bdd->prepare($sql);
        $sth->execute();
        return $sth->fetchAll();

    }
    */

}



?>