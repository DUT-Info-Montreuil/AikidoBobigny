<?php
require_once("cont_admin.php");
//require_once("../mod_mail/modele_mail.php");
class ModeleAdmin extends Connexion{
       
        private $modelemail;
        public function __construct(){
            $this->modelemail = new ModeleMail();
        }
    
        public function getadherents(){
            $tab = parent::$bdd -> prepare('select * from adherent');
            $tab->execute();
            return $tab->fetchAll();
        }

        public function getfaq(){
            $tab = parent::$bdd -> prepare('select * from faq');
            $tab->execute();
            return $tab->fetchAll();
        }

        public function getcalendrier(){
            $tab = parent::$bdd -> prepare('select * from evenement');
            $tab->execute();
            return $tab->fetchAll();
        }

        public function getArticles(){
            $tab = parent::$bdd -> prepare('select * from article');
            $tab->execute();
            return $tab->fetchAll();
        }

        public function getlieux(){
            $tab = parent::$bdd -> prepare('select * from lieu');
            $tab->execute();
            return $tab->fetchAll();
        }
    
    }

?>