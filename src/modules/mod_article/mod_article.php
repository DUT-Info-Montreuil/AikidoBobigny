<?php
include_once ('cont_article.php');

class ModArticle{

    private $vue;
    private $controleurArtcile;
    public function __construct(){
        $this->vue= new VueArticle();
        $this->controleurArticle = new ContArticle();
        $this->controleurArticle->exec();
        if(isset($_SESSION['admin'])&& $_SESSION['admin']==1){
            $this->controleurArticle->execadmin();  
        }
    }

    public function getAffichage() {
        return $this->vue->getAffichage();
    }
}


?>