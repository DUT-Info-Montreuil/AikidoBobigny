<?php

require_once("cont_csv.php");
class ModCSV{

    private $vue;

	public function __construct() {
        $this->vue = new VueCSV();
        $controleur = new ContCSV(new ModeleCSV(), $this->vue);
        $controleur->exec();
    }

    public function getAffichage() {
        return $this->vue->getAffichage();
    }
}

?>