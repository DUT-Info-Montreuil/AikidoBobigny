<?php
require_once "./vue_generique.php";
class VueCommentaire extends VueGenerique{

    public function __construct(){
        parent::__construct();
    }   

    public function form_Commentaire(){
        echo'<form action="index.php?module=commentaire&action=ajout" method="POST">
	        <p>Commentaire:</p> <textarea <input type="textarea" name="commentaire" placeholder="Votre commentaire..."/></textarea></br>
            
            <input type="submit" value="Poster mon commentaire" name="submit_commentaire"/>
            </form>';
    }    
}


?>