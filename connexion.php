<?php
	class Connexion {
        static protected $bdd;


		public function __construct() {

        }

        public static function initConnexion() {
            self::$bdd = new PDO("mysql:host=database-etudiants.iut.univ-paris8.fr;dbname=dutinfopw201633;", "dutinfopw201633", "mejetuju"); 

        }

	}
?>