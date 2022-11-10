<?php
	class Connexion {
        static protected $bdd;
		public function __construct() {}

        public static function initConnexion() {
            self::$bdd = new PDO("mysql:host=localhost;dbname=bddsae;", "root", "");

        }

	}
?>