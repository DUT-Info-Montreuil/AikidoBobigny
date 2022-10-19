
<?php
require_once "./vue_generique.php";
class VueConnexion extends VueGenerique{

    public function __construct(){
        parent::__construct();
    }   
    

    public function form_connexion(){
        $token = uniqid(rand(), true);       
        $_SESSION['token'] = $token;
        $_SESSION['token_time'] = time();
        echo'<form action="index.php?module=mod_connexion&action=Connexion" method="POST">
	        <p>login :</p> <input type="text" name="login" maxlength="50"/>
            <p>mot de passe :</p> <input type="password" name="mdp" maxlength="50"/>
            <input type="submit"/>
            <input type="hidden" name="token" id="token" value="'.$token.'"/>
            </form>';
    }

    public static function afficherDeconnexion(){
        echo "<a href='index.php?module=mod_connexion&action=Deconnexion'>Deconnexion</a><br>";
    }

    public static function afficherConnexion(){
        echo "<a href='index.php?module=mod_connexion&action=Se-connecter'>Se connecter</a><br>";
    }

    
}


?>