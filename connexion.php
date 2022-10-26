<?php
class Connexion{
    static protected $bdd;

    public function __construct(){
    }   

    public static function initConnexion(){
        self::$bdd = $bdd = new PDO('mysql:host=localhost;dbname=sae', "root", "");
    }

}

?>