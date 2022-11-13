<?php

class ViewArticle{

    public function __construct(){

    }


    public function menu(){
        echo '<a href = "index.php?module=article&action=formArticle">Ajouter un article</a>', '<br/>';
        echo '<a href = "index.php?module=article&action=formDelete">Supprimer un article</a>', '<br/>';
        echo '<a href = "index.php?module=article&action=rechercherArticle">Rechercher un article</a>', '<br/>';
        
    }


    public function formArticle(){
        echo'</br>';
        echo'<form action="index.php?module=article&action=insertArticle" method="POST">
            <label for="date">Date Article</label>
            <input type = "date" name ="dateArticle">
            <label for = "titre">Titre article</label>
            <input type = "text" name = "titreArticle" maxlength = 100>
            <label for ="texte">Texte article</label>
            <input type = "text" name = "texteArticle">
            <input type = "submit" value ="Créer">
            </form>
        ';
        echo'<br/>';
    }

    public function formDelete(){
        echo'</br>';
        echo'<form action="index.php?module=article&action=deleteArticle" method="POST">
        <label for="titre">Titre article dont vous voulez supprimer</label>
        <input type ="text" name = "titrevoulu">
        <input type = "submit" value ="Supprimer">
        ';
        echo'<br/>';
    }

    public function rechercherArticle(){
        echo'</br>';
        echo'<form action="index.php?module=article&action=articleRecherche" method="POST">
            <label for="date"> Sélectionner une date :</label>
            <input type="date" name="datevoulu">
            <input type="submit" value="Rechercher">
            </form>
            ';
        echo'</br>';
    }

    public function afficherRecherche($recherche){
        if($recherche){
            foreach($recherche as $row){
                echo $row['titre'];
                echo '</br>';
                echo $row['texte'];
                echo '</br>';
            }

        }   
        else{
            echo'</br>';
            echo'Aucun article est disponible sur cette date';
        }

        

    }

}



?>