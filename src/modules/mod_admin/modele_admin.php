<?php
require_once("cont_admin.php");
class ModeleAdmin extends Connexion{
       
        public function __construct(){
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
                $id = $_GET['ID_adherent'];
                $req = parent::$bdd -> prepare ('DELETE from adhenrent where ID_adherent= :id');
                $req->execute(array(':id'=>$id));
                echo "Suppresion effectué";
            
        }


    
    }

?>