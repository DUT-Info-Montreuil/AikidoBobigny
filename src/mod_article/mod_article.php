<?php
include_once ('cont_article.php');

class ModArticle{

    public function __construct(){
        $controleurArticle = new ContArticle();
        $controleurArticle->exec();
    }

}


?>