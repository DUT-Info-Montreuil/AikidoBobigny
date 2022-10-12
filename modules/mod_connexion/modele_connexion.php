<?php
require_once("cont_connexion.php");
class ModeleConnexion extends Connexion{
       
        public function __construct(){
        }
        public function Connexion(){
            $log= parent::$bdd -> prepare('SELECT * FROM Connexion where login=?');
            $log->execute(array($_POST['login']));
            $tab=$log->fetch();
            if(password_verify($_POST['mdp'],$tab['mdp'])){
                echo"connexion OK";
                $_SESSION['connexion'] = $tab['id'];
            }else{
                echo "Erreur";
            }
        }

        
        public function Deconnexion(){
            unset($_SESSION['connexion']);
            echo "Deconnexion réussi";
        }
    }
    


?>