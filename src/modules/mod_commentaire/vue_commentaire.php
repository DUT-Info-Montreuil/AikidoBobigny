<?php

require_once "./vue_generique.php";

class VueCommentaire extends VueGenerique
{

  public function __construct(){
  }

  public function form_commentaire($id){
      echo'<form action="index.php?module=mod_commentaire&action=ajout" method="POST">
        <p class="pCommentaire">Poster un Commentaire :</p> <textarea <input type="textarea" name="commentaire" placeholder="Votre commentaire..."/></textarea></br>
      
      <input type="submit" value="Poster mon commentaire" name="submit_commentaire"/>
      <input type="hidden" value="'.$id.'" name="id_article"/>
      </form>';
    }
} 


?>