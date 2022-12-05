<?php
require_once "./vue_generique.php";
class VueFAQ extends VueGenerique{

    public function __construct(){
        parent::__construct();
    }   
    

    public function affichequestionreponse($tableau){
        foreach($tableau as $cle => $valeur){
            echo "
            Question : ".htmlspecialchars($valeur['question'])."</br>
            Reponse : ".htmlspecialchars($valeur['reponse'])."</br>";
        }
    }


    public function form_faq(){
        $token = uniqid(rand(), true);       
        $_SESSION['token'] = $token;
        $_SESSION['token_time'] = time();

        echo'<form action="http://sae/src/index.php?module=faq&action=question_faq" method="POST">
	        <p>Quelle est votre question :</p> <textarea <input type="text" name="question" placeholder="Votre question..."/></textarea></br>
            <input type="submit" value="Envoyer la question"/>
            <input type="hidden" name="token" id="token" value="'.$token.'"/>
            </form>';
    }

    public function reponse_faq($id){
        $token = uniqid(rand(), true);       
        $_SESSION['token'] = $token;
        $_SESSION['token_time'] = time();
        echo'<form action="http://sae/src/index.php?module=admin&action=faq" method="POST" style ="display:none" class="reponsefaq" id="reponse'.$id.'">
        <p>Reponse:</p> <textarea <input type="textarea" id ="reponsefaq'.$id.'" "name="reponsefaq" placeholder="Mettez votre reponse "/></textarea></br>
        <input type="submit" value="Poster la réponse" name="submit_reponse_faq" class="submit_reponse_faq" targetID="'.$id.'"/>
        <input type="hidden" name="token" id="token" value="'.$token.'"/>
        </form>';
    }

    public function modifier_question($id){
        $token = uniqid(rand(), true);       
        $_SESSION['token_modifier_question'] = $token;
        $_SESSION['token_time'] = time();
        echo'<form action="http://sae/src/index.php?module=admin&action=faq" method="POST" style ="display:none" class="corrigerquestion" id="corriger'.$id.'">
        <p>Modifier question:</p> <textarea <input type="textarea" id ="modifier_question'.$id.'" name="modifier_question" placeholder="Modifier la question "/></textarea></br>
        <input type="submit" value="Poster la question" name="submit_modifier_question" class="submit_modifier_question" targetID="'.$id.'"/>
        <input type="hidden" name="token_modifier_question" id="token" value="'.$token.'"/>
        </form>';
    }
    
}


?>