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

    public function reponse_faq($id){
        $token = uniqid(rand(), true);       
        $_SESSION['token'] = $token;
        $_SESSION['token_time'] = time();
        echo'<form action="http://sae/src/index.php?module=admin&action=faq" method="POST" style ="display:none" class="reponsefaq" id="reponse'.$id.'">
        <p>Reponse:</p> <textarea <input type="textarea" id ="reponsefaq" "name="reponsefaq" placeholder="Mettez votre reponse "/></textarea></br>
        <input type="submit" value="Poster la réponse" name="submit_reponse_faq" class="submit_reponse_faq"/>
        <input type="hidden" name="token" id="token" value="'.$token.'"/>
        </form>';
    }

    public function modifier_question($id){
        $token = uniqid(rand(), true);       
        $_SESSION['token'] = $token;
        $_SESSION['token_time'] = time();
        echo'<form action="http://sae/src/index.php?module=admin&action=faq" method="POST" style ="display:none" class="corrigerquestion" id="corriger'.$id.'">
        <p>Modifier question:</p> <textarea <input type="textarea" id ="modifier_question" name="modifier_question" placeholder="Modifier la question "/></textarea></br>
        <input type="submit" value="Poster la question" name="submit_modifier_question" class="submit_modifier_question"/>
        <input type="hidden" name="token" id="token" value="'.$token.'"/>
        </form>';
    }
    
}


?>