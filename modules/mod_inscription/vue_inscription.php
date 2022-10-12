<?php
require_once "./vue_generique.php";
class VueInscription extends VueGenerique{

    public function __construct(){
        parent::__construct();
    }   

    public function form_inscription(){
        echo'<form action="index.php?module=mod_inscription&action=ajout" method="POST">
	        <p>Genre*:</p> <input type="text" name="Sexe" maxlength="50"/>
            <p>Nom* :</p> <input type="text" name="nom" maxlength="50"/>
            <p>Prénom* :</p> <input type="text" name="prenom" maxlength="50"/>
            <p>Date de naissance*:</p> <input type="date" name="date_de_naissance" maxlength="50"/>
            <p>Adresse mail*:</p> <input type="email" name="adresse_mail" maxlength="50"/>
            <p>Numéro de téléphone* :</p> <input type="tel" name="numéro_de_téléphone" maxlength="50"/>
            <p>Adresse* :</p> <input type="text" name="adresse" maxlength="50"/>
            <p>Code postal* :</p> <input type="text" name="Code_postal" maxlength="50"/>
            <p>Ville* :</p> <input type="text" name="ville" maxlength="50"/>
            <p>Login*:</p> <input type="text" name="login" maxlength="50"/>
            <p>Votre mot de passe* :</p> <input type="password" name="mot_de_passe" maxlength="50"/>
            <p>Numéro de licence (si ancien licencier) :</p> <input type="tel" name="numéro_de_téléphone" maxlength="50"/>
            <p>Profession* :</p> <input type="text" name="Profession" maxlength="50"/>
            <p>Nationalité* :</p> <input type="text" name="Nationalité" maxlength="50"/>
            <p>Saison*:</p> <input type="text" name="Saison" maxlength="50"/>
            <p>Club*:</p> <input type="text" name="Club" maxlength="50"/>
            <input type="submit"/>
            </form>';
    }    
}


?>