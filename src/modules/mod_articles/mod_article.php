<?php
include_once ('cont_article.php');

class ModArticle{

    private $vue;
    public function __construct(){
        $this->vue= new VueArticle();
        $controleurArticle = new ContArticle();
        $controleurArticle->exec();
    }

    public function getAffichage() {
        return $this->vue->getAffichage();
    }
}


?>