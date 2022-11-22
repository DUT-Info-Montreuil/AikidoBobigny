<?php
include_once("connexion.php");

class ModeleCommentaire extends Connexion{
       
        public function __construct(){
        }
    


        public function ajoutCommentaire(){
            if(isset($_POST['submit_commentaire'])){
                if(isset($_POST['commentaire']) AND !empty($_POST['commentaire'])){
                    $ajoutercommentaire = parent::$bdd -> prepare('INSERT INTO commentaires (texte,ID_Adherent,ID_article) VALUES (?,?,?)');
                    //$id_commentaire = parent::$bdd->lastInsertId();
                    $ajoutercommentaire->execute(array($_POST["commentaire"],2,$_POST["id_article"]));
                }else {
                    echo"Tous les champs doivent être completé";
                }
            }
        }
    
    }

?>