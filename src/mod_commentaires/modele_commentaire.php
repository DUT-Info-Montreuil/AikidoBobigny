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
                    $ajoutercommentaire->execute(array($_POST["commentaire"],/*$id_commentaire*/2,$_POST["id_article"]));
                }else {
                    echo'</br>';
                    echo"Tous les champs doivent être completé";
                }
            }
        }

        public function voirCommentaire($id){
            $sql =("SELECT texte,ID_article,commentaires.ID_Adherent,date_com,adherent.login FROM commentaires INNER JOIN adherent on commentaires.ID_Adherent = adherent.ID_adherent WHERE ID_article = ? ");
            $sth = parent::$bdd->prepare($sql);
            $sth->execute(array($id));
            return $sth->fetchAll();
        }
    
    }

?>