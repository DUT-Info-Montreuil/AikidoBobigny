<?php
require_once "./vue_generique.php";
class VueCommentaire extends VueGenerique{

    public function __construct(){
        parent::__construct();
    }   


    public function form_commentaire(){
        $token = uniqid(rand(), true);       
        $_SESSION['token'] = $token;
        $_SESSION['token_time'] = time();
        echo'<form action="index.php?module=mod_commentaire&action=ajout" method="POST">
	        <p>Commentaire:</p> <textarea <input type="textarea" name="commentaire" placeholder="Votre commentaire..."/></textarea></br>
            
            <input type="submit" value="Poster mon commentaire" name="submit_commentaire"/>
            <input type="hidden" name="token" id="token" value="'.$token.'"/>

            </form>';
    }    
}


?>