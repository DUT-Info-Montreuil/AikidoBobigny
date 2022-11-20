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

        public function supprimerAdherents(){
            if(isset($_SESSION['token']) && isset($_SESSION['token_time']) && isset($_POST['token'])){
                if($_SESSION['token'] == htmlspecialchars($_POST['token'])){
                    $timestamp_ancien = time() - (15*60);
                    if($_SESSION['token_time'] >= $timestamp_ancien){
                $id = $_POST['ID_adherent'];
                $req1 = parent::$bdd -> prepare ('DELETE from info_inscription where ID_adherent= ? ');
                $req1->execute(array($id));
                $req = parent::$bdd -> prepare ('DELETE from adherent where ID_adherent= ? ');
                $req->execute(array($id));
                
                var_dump($id);
                echo "Suppresion effectué";  
                    }}}  
        }

        public function validerAdherents(){
            if(isset($_SESSION['token']) && isset($_SESSION['token_time']) && isset($_POST['token'])){
                if($_SESSION['token'] == htmlspecialchars($_POST['token'])){
                    $timestamp_ancien = time() - (15*60);
                    if($_SESSION['token_time'] >= $timestamp_ancien){
            $id = $_POST['ID_adherent'];
            $req = parent::$bdd -> prepare ('UPDATE adherent SET inscripverif = 1 where ID_adherent = :id');
            $req->execute(array(':id'=>$id));
                    }}}
        }

        public function validermail(){
            if(isset($_SESSION['token']) && isset($_SESSION['token_time']) && isset($_POST['token'])){
                if($_SESSION['token'] == htmlspecialchars($_POST['token'])){
                    $timestamp_ancien = time() - (15*60);
                    if($_SESSION['token_time'] >= $timestamp_ancien){
            $id = $_POST['ID_adherent'];
            $req = parent::$bdd -> prepare ('UPDATE adherent SET verifmail = 1 where ID_adherent = :id');
            $req->execute(array(':id'=>$id));
                    }}}
        }


        public function passezadmin(){
            if(isset($_SESSION['token']) && isset($_SESSION['token_time']) && isset($_POST['token'])){
                if($_SESSION['token'] == htmlspecialchars($_POST['token'])){
                    $timestamp_ancien = time() - (15*60);
                    if($_SESSION['token_time'] >= $timestamp_ancien){
            $id = $_POST['ID_adherent'];
            $req = parent::$bdd -> prepare ('UPDATE adherent SET passeradmin = 1 where ID_adherent = :id');
            $req->execute(array(':id'=>$id));
                    }}}
        }

        public function repondrequestion($reponse){
            if(isset($_SESSION['token']) && isset($_SESSION['token_time']) && isset($_POST['token'])){
                if($_SESSION['token'] == htmlspecialchars($_POST['token'])){
                    $timestamp_ancien = time() - (15*60);
                    if($_SESSION['token_time'] >= $timestamp_ancien){
            $id = $_POST['ID_adherent'];
            $req = parent::$bdd -> prepare('UPDATE faq SET reponse = '.$reponse.' where id_faq = :id');
            $req -> execute (array(':id' =>$id));
                    }}}
        }

        public function modifierquestion($modifierquestion){
            if(isset($_SESSION['token']) && isset($_SESSION['token_time']) && isset($_POST['token'])){
                if($_SESSION['token'] == htmlspecialchars($_POST['token'])){
                    $timestamp_ancien = time() - (15*60);
                    if($_SESSION['token_time'] >= $timestamp_ancien){
            $id = $_POST['ID_adherent'];
            $req = parent::$bdd -> prepare('UPDATE faq SET question = '.$modifierquestion.' where id_faq = :id');
            $req -> execute (array(':id' =>$id));
                    }}}
        }

        public function ajout_question_reponse(){
            if(isset($_SESSION['token']) && isset($_SESSION['token_time']) && isset($_POST['token'])){
                if($_SESSION['token'] == htmlspecialchars($_POST['token'])){
                    $timestamp_ancien = time() - (15*60);
                    if($_SESSION['token_time'] >= $timestamp_ancien){
            $ajouterquestion_reponse = parent::$bdd -> prepare('INSERT INTO faq (question,reponse) VALUES (?,?)');
            $ajouterquestion_reponse->execute(array($_POST["question_faq"],$_POST["reponse_faq"]));
                    }}}
        }

        public function supprimer_question_reponse(){
            if(isset($_SESSION['token']) && isset($_SESSION['token_time']) && isset($_POST['token'])){
                if($_SESSION['token'] == htmlspecialchars($_POST['token'])){
                    $timestamp_ancien = time() - (15*60);
                    if($_SESSION['token_time'] >= $timestamp_ancien){
                $id = $_POST['id_faq'];
                $req1 = parent::$bdd -> prepare ('DELETE from faq where id_faq= ? ');
                $req1->execute(array($id));
                    }
                }
            }

        }
        



    
    }

?>