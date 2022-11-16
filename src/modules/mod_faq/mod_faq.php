<?php
require_once("cont_faq.php");
class ModFAQ{

    private $vue;

	public function __construct() {
        $this->vue = new VueFAQ();
        $controleur = new ContFAQ(new ModeleFAQ(), $this->vue);
        $controleur->exec();
    }

    public function getAffichage() {
        return $this->vue->getAffichage();
    }
}
