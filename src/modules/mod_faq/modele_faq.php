<?php
require_once("cont_faq.php");
class ModeleFAQ extends Connexion
{

    public function __construct(){}

    public function getfaq()
    {
        $tab = parent::$bdd->prepare('select * from faq where reponse IS NOT NULL');
        $tab->execute();
        return $tab->fetchAll();
    }

    public function question_faq()
    {
       
                    $ajouterfaq = parent::$bdd->prepare('INSERT INTO faq (question) VALUES (?) ');
                    $ajouterfaq->execute(array($_POST['question']));
                    echo " Votre question a bien été envoyé";
                }
            
        
    
}

?>