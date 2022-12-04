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


        public function validerAdherents(){
            if(isset($_SESSION['token']) && isset($_SESSION['token_time']) && isset($_POST['token'])){
                if($_SESSION['token'] == ($_POST['token'])){
                    $timestamp_ancien = time() - (15*60);
                    if($_SESSION['token_time'] >= $timestamp_ancien){
            $id = $_POST['ID_adherent'];
            $req = parent::$bdd -> prepare ('UPDATE adherent SET inscripverif = 1 where ID_adherent = :id');
            $req->execute(array(':id'=>$id));
                    }}}
        }
    
    }

?>