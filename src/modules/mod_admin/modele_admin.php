<?php
require_once("cont_admin.php");
require_once("../mod_mail/modele_mail.php");
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

        public function supprimerAdherents(){
                $id = $_POST['ID_adherent'];
                $req = parent::$bdd -> prepare ('DELETE from adhenrent where ID_adherent= :id');
                $req->execute(array(':id'=>$id));
                var_dump($id);
                echo "Suppresion effectué";
            
        }

        public function validerAdherents(){
            $id = $_POST['ID_adherent'];
            $req = parent::$bdd -> prepare ('UPDATE adherent SET inscripverif = 1 where ID_adherent = :id');
            $req->execute(array(':id'=>$id));
            $this->modelemail->message_Verif_inscription();
        }

        public function validermail(){
            $id = $_POST['ID_adherent'];
            $req = parent::$bdd -> prepare ('UPDATE adherent SET verifmail = 1 where ID_adherent = :id');
            $req->execute(array(':id'=>$id));
            $this->modelemail->message_Verif_inscription();
        }



    
    }

?>