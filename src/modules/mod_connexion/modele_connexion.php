<?php
class ModeleConnexion extends Connexion{
       
        public function __construct(){
        }

        public function connexion(){
        if(isset($_SESSION['token']) && isset($_SESSION['token_time']) && isset($_POST['token'])){
	        if($_SESSION['token'] == ($_POST['token'])){
		        $timestamp_ancien = time() - (15*60);
		        if($_SESSION['token_time'] >= $timestamp_ancien){
                    $log= parent::$bdd -> prepare('SELECT * FROM adherent where login=?');
                    $log->execute(array(htmlspecialchars(($_POST['login']))));
                    $tab=$log->fetch();
                    if(password_verify(htmlspecialchars($_POST['mdp']),$tab['mot_de_passe'])){
                        echo"connexion OK";
                        $_SESSION['connexion'] = $tab['ID_adherent'];
                        $_SESSION['admin']=$tab['admin'];
                    }else{
                        echo "Erreur Lors de la connexion";
            }
        }
    }
}
        }
        

        
        public function deconnexion(){
            unset($_SESSION['connexion']);
            echo "Deconnexion réussi";
        }
    }
    


?>