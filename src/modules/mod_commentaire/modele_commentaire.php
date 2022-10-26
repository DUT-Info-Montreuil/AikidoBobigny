<?php
require_once("cont_commentaire.php");
class ModeleCommentaire extends Connexion{
       
        public function __construct(){
        }
    


        public function ajoutCommentaire(){
            if(isset($_POST['submit_commentaire'])){
                if(isset($_POST['commentaire']) AND !empty($_POST['commentaire'])){
                    $ajoutercommentaire = self::$bdd -> prepare('INSERT INTO commentaires (texte, ID_Adherent) VALUES (?,?)');
                    $ajoutercommentaire->execute(array($_POST["commentaire"],$_SESSION['connexion']));
                }else {
                    echo"Tous les champs doivent être completé";
                }
            }
        }
    
    }

?>