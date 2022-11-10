<?php

class VueCalendrier{

    public function __construct(){

    }


    public function menu($title){
        echo '<a href="index.php?module=calendrier&action=formEvenement">Ajout evenement</a>', '<br/>';
        echo '<a href="index.php?module=calendrier&action=affichageCalendrier">Voir le calendrier</a>', '<br/>';
    }


    public function formEvenement(){
        echo'';
        echo'<form action="index.php?module=calendrier&action=insertEvenement" method="POST">
            <label for="evenement">Evenement </label>
            <input type="text" name = "titreEvenement" maxlength = "100">
            <label for="date_debut">Date debut : </label>
            <input type="date" name = "date_debut_evenement">
            <label for="date_fin">Date fin : </label>
            <input type="date" name = "date_fin_evenement">
            <label for="gymnase">ID du gymnase : </label>
            <input type="number" name = "id_gymnase">
            <input type="submit" name = "Send">
            </form>
        ';
        echo'<br/>';
    }

    public function affichageCalendrier(){
        $calendar = fopen("mod_calendrier/calendrier.html","r");
        /* echo $calendar; */
    }

}



?>