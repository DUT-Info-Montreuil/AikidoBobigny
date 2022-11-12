<?php
include_once ('controller.article.php');

class ModArticle{

    public function __construct(){
        $controllerArticle = new ControllerArticle();
        $controllerArticle->exec();
    }

}


?>