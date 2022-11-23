<?php
require_once "./vue_generique.php";
class VueFAQ extends VueGenerique{

    public function __construct(){
        parent::__construct();
    }   
    

    public function form_faq(){
        $token = uniqid(rand(), true);       
        $_SESSION['token'] = $token;
        $_SESSION['token_time'] = time();
        echo'<form action="index.php?module=mod_faq&action=question_faq" method="POST">
	        <p>Quelle est votre question :</p> <textarea <input type="text" name="question" placeholder="Votre question..."/></textarea></br>
            <input type="submit"/>
            <input type="hidden" name="token" id="token" value="'.$token.'"/>
            </form>';
    }

    public function reponse_faq(){
        $token = uniqid(rand(), true);       
        $_SESSION['token'] = $token;
        $_SESSION['token_time'] = time();
        echo'<form action="index.php?module=mod_admin&action=faq" method="POST">
        <p>Reponse:</p> <textarea <input type="textarea" name="reponse" placeholder="Mettez votre reponse "/></textarea></br>
        <input type="submit" value="Poster la réponse" name="submit_reponse_faq"/>
        <input type="hidden" name="token" id="token" value="'.$token.'"/>
        </form>';
    }

    public function modifier_question(){
        $token = uniqid(rand(), true);       
        $_SESSION['token'] = $token;
        $_SESSION['token_time'] = time();
        echo'<form action="index.php?module=mod_admin&action=faq" method="POST">
        <p>Modifier question:</p> <textarea <input type="textarea" name="modifier_question" placeholder="Modifier la question "/></textarea></br>
        <input type="submit" value="Poster la question" name="submit_modifier_question"/>
        <input type="hidden" name="token" id="token" value="'.$token.'"/>
        </form>';
    }
    
}


?>