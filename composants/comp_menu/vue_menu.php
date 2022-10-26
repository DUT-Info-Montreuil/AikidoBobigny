<?php
class VueMenu{

    private $contenue;
    public function __construct(){
    }
    
    public function completecontenu(){
             $this->contenue.="<a href='index.php?module=mod_commentaire&action=Commentaire'>Commentaire</a><br>";
    }

    public function getContenue(){
        return $this->contenue;
    }
    

}
?>