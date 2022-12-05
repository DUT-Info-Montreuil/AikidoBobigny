<?php
session_start();
require_once("../../connexion.php");
Connexion::initConnexion();

    if($_POST["actionfaq"]==1){

        if (isset($_POST["targetID"])) {
            $req1 = Connexion::getConnexion()->prepare('DELETE from faq where id_faq= ? ');
            $req1->execute(array($_POST['targetID']));
        }
    };

    if($_POST["actionfaq"]==2){
        if($_POST)
				{
                $ajouterquestion_reponse = Connexion::getConnexion() -> prepare('INSERT INTO faq (question,reponse) VALUES (?,?)');
                $ajouterquestion_reponse->execute(array($_POST["question_faq"],$_POST["reponse_faq"]));				
            } else {
						header('HTTP/1.1 500 Looks like mysql error, could not insert record!');
						exit();
				}
            
    };

    if($_POST["actionfaq"]==3){ 
        if ($_POST) {
            $ajouter_reponse = Connexion::getConnexion() -> prepare('UPDATE faq SET reponse= ?  where id_faq= ? ');
            $ajouter_reponse->execute(array($_POST["reponsefaq"],$_POST["targetID"]));				
        } else {
            header('HTTP/1.1 500 Looks like mysql error, could not insert record!');
            exit();
        }
    };

    if($_POST["actionfaq"]==4){     
        if ($_POST) {
            $modifier_question = Connexion::getConnexion() -> prepare('UPDATE faq SET question= ?  where id_faq= ? ');
            $modifier_question->execute(array($_POST["modifier_question"],$_POST["targetID"]));				
        } else {
            header('HTTP/1.1 500 Looks like mysql error, could not insert record!');
            exit();
        }
    
    };
   
 
?>