<?php
require_once("cont_faq.php");
class ModeleFAQ extends Connexion{
       
        public function __construct(){
        }

        public function question_faq(){
        if(isset($_SESSION['token']) && isset($_SESSION['token_time']) && isset($_POST['token'])){
	        if($_SESSION['token'] == htmlspecialchars($_POST['token'])){
		        $timestamp_ancien = time() - (15*60);
		        if($_SESSION['token_time'] >= $timestamp_ancien){
                    $ajouterfaq = parent::$bdd -> prepare('INSERT INTO faq (question) VALUES (?)');
                    $ajouterfaq->execute(array($_POST["question"]));
                }
            }
        }
        }
        
        

        
    
}
    


?>