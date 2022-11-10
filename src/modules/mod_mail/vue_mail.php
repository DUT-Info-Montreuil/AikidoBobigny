<?php
require_once "./vue_generique.php";
class VueMail extends VueGenerique{

	public function __construct(){
		parent::__construct();
	}   

	public function message_Verif_Mail(){
        $email = $_SESSION["mail"];
        $header="Content-Type: text/html; charset='uft-8\r\n";
		$header .="From: yanisdjahnit03@gmail.com\r\n";
        $sujet ="Validation de mail";
        $message =
        '
        <html>
            <body>
                <div align="center">
                    <a href ="http://sae/src/index.php?module=mod_mail&action=verifmail&id='.($_SESSION["idadh"]).'">Confirmation de votre mail </a>
                </div>
            </body>
        </html>
        ';	

        if (mail($email,$sujet, $message, $header)){
            echo 'Un mail viens de vous être envoyer. Il faut cliquer sur le lien que vous avez recu pour valider votre mail';
        }else {
            echo "Le mail de vérification n'a pas pu être envoyé ";
        }
	}    


    public function message_Valid_Commentaire(){
        $email = $_SESSION["mail"];
        $header="Content-Type: text/html; charset='uft-8\r\n";
		$header .="From: yanisdjahnit03@gmail.com\r\n";
        $sujet ="Réponse à votre commentaire";
        
        $message =
        '
        <html>
            <body>
                <div align="center">
                    <p> Votre commentaire a été validé vous pouvez allez voir la réponse sur le site</p>
                </div>
            </body>
        </html>
        ';
        if (mail($email,$sujet, $message, $header)){
            echo 'Le mail a bien été envoyé ';
        }else {
            echo "Le mail n'a pas pu être envoyer ";
        }
        

    }

    public function message_Verif_inscription(){
        $email = $_SESSION["mail"];
        $header="Content-Type: text/html; charset='uft-8\r\n";
		$header .="From: yanisdjahnit03@gmail.com\r\n";
        $sujet ="Validation de votre compte ";
        $message =
        '
        <html>
            <body>
                <div align="center">
                    <p> Votre compte a été validé vous pouvez maintenant vous connecter : </p><br>
                    <a href ="index.php?module=mod_connexion&action=connexion"> ICI </a>
                </div>
            </body>
        </html>
        ';
        if (mail($email,$sujet, $message, $header)){
            echo 'Le mail a bien été envoyé ';
        }else {
            echo "Le mail n'a pas pu être envoyer ";
        }
    }
}


?>