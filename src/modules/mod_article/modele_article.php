<?php

include_once 'connexion.php';

class ModeleArticle extends Connexion{

    public function __construct(){
    }

    public function insertArticle(){
        if(isset($_SESSION['token']) && isset($_SESSION['token_time']) && isset($_POST['token'])){
	        if($_SESSION['token'] == ($_POST['token'])){
		        $timestamp_ancien = time() - (15*60);
		        if($_SESSION['token_time'] >= $timestamp_ancien){
        $sql = ('INSERT INTO article (date,titre,texte,img_nom,img_taille,img_type,img_bin) VALUES (?,?,?,?,?,?,?)');
        $sth = parent::$bdd->prepare($sql);
        $sth->execute(array($_POST['dateArticle'],$_POST['titreArticle'],$_POST['texteArticle'],$_FILES['image']['name'],
        $_FILES['image']['size'],$_FILES['image']['type'],file_get_contents($_FILES['image']['tmp_name'])));
                }}};
    }

    public function articleRecherche(){
        if(isset($_SESSION['token']) && isset($_SESSION['token_time']) && isset($_POST['token'])){
	        if($_SESSION['token'] == ($_POST['token'])){
		        $timestamp_ancien = time() - (15*60);
		        if($_SESSION['token_time'] >= $timestamp_ancien){
        $dateVoulu = $_POST['datevoulu'] ;
        $sql =("SELECT titre,ID_article FROM article WHERE date = '$dateVoulu' ");
        $sth = parent::$bdd->prepare($sql);
        $sth->execute();
        return $sth->fetchAll();
                }}};
    }


    public function articleRechercheDetails($id){ 
        $sql =("SELECT * FROM article WHERE ID_article = ? ");
        $sth = parent::$bdd->prepare($sql);
        $sth->execute(array($id));
        return $sth->fetch();
    }

    public function deleteArticle(){
        if(isset($_SESSION['token']) && isset($_SESSION['token_time']) && isset($_POST['token'])){
	        if($_SESSION['token'] == ($_POST['token'])){
		        $timestamp_ancien = time() - (15*60);
		        if($_SESSION['token_time'] >= $timestamp_ancien){
        $titreVoulu = $_POST['titrevoulu'];
        $sql=("DELETE FROM article WHERE titre = '$titreVoulu'");
        $sth = parent::$bdd->prepare($sql);
        $sth->execute();
                }}};
    }

    public function articleRechercheCommentaire(){
        $sql =("SELECT titre,ID_article FROM article");
        $sth = parent::$bdd->prepare($sql);
        $sth->execute();
        return $sth->fetchAll();
    }


    
    public function dernierArticle(){
        $sql = ("SELECT * FROM article ORDER BY ID_article DESC LIMIT 0,1");
        $sth = parent::$bdd->prepare($sql);
        $sth->execute();
        while($row = $sth->fetch()){
            echo"Voici le dernier artcile publié le : ".$row['date']."</br>";
            echo htmlspecialchars($row['titre']);
            echo"<br>";
            echo htmlspecialchars($row ['texte']);
            echo"<br>";
            echo '<img src = "data:image/jpg;base64,'. base64_encode($row['img_bin']) .'" width = "400px" height = "400px"/>';
        }
    }
    

}



?>