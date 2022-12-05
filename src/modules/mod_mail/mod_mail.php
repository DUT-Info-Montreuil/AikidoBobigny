<?php
require_once("cont_mail.php");
class ModMail{

    private $vue;

	public function __construct() {
        $this->vue = new VueMail();
        $controleur = new ContMail(new ModeleMail(), $this->vue);
        $controleur->exec();
    }

    
}
