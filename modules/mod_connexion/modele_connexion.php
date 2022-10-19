<?php
require_once("cont_connexion.php");
class ModeleConnexion extends Connexion{
       
        public function __construct(){
        }
        public function Connexion(){
        if(isset($_SESSION['token']) && isset($_SESSION['token_time']) && isset($_POST['token'])){
	        if($_SESSION['token'] == htmlspecialchars($_POST['token'])){
		        $timestamp_ancien = time() - (15*60);
		        if($_SESSION['token_time'] >= $timestamp_ancien){
                    $log= parent::$bdd -> prepare('SELECT * FROM Connexion where login=?');
                    $log->execute(array(htmlspecialchars(($_POST['login']))));
                    $tab=$log->fetch();
                    if(password_verify(htmlspecialchar($_POST['mdp']),$tab['mdp'])){
                        echo"connexion OK";
                        $_SESSION['connexion'] = $tab['id'];
                    }else{
                        echo "Erreur Lors de la connexion";
            }
        }
    }
}
        }
        

        
        public function Deconnexion(){
            unset($_SESSION['connexion']);
            echo "Deconnexion réussi";
        }
    }
    


?>