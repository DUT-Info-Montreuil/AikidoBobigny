
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

            $sql =("SELECT ID_commentaires,texte,ID_article,commentaires.ID_Adherent,date_com,com_validation,adherent.login 
            FROM commentaires INNER JOIN adherent ON commentaires.ID_Adherent = adherent.ID_adherent WHERE ID_article = ? and com_validation = 1 ");
            $sth = parent::$bdd->prepare($sql);
            $sth->execute(array($id));
            return $sth->fetchAll();
        }

        public function voirGestionCommentaire($id){
            $sql =("SELECT ID_commentaires,texte,ID_article,commentaires.ID_Adherent,date_com,com_validation,adherent.login 
            FROM commentaires INNER JOIN adherent ON commentaires.ID_Adherent = adherent.ID_adherent WHERE ID_article = ?");
            $sth = parent::$bdd->prepare($sql);
            $sth->execute(array($id));
            return $sth->fetchAll();
        }

        public function deleteCommentaire(){

            if(isset($_POST['supprimer_valider'])){
                foreach($_POST['supprimer_valider'] as $articleVerif){
                    $sql =("DELETE FROM commentaires WHERE ID_commentaires = $articleVerif");
                    $sth = parent::$bdd->prepare($sql);
                    $sth->execute();        
                }
            }
            echo'</br>';
            echo 'Commentaire(s) effacés avec succès !';
        }

        public function validationCommentaire(){
            if(isset($_POST['supprimer_valider'])){
                foreach($_POST['supprimer_valider'] as $articleVerif){
                    $sql = ("UPDATE commentaires SET com_validation = '1' WHERE ID_commentaires = $articleVerif ");

                    $sth = parent::$bdd->prepare($sql);
                    $sth->execute();
                }
            }

            echo '</br>';
            echo 'Commentaire(s) validés !';

        }
    }

?>