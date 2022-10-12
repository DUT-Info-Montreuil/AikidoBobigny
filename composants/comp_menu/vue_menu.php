<?php
class VueMenu{

    private $contenue;
    public function __construct(){
    }
    
    public function completecontenu(){
             $this->contenue.="<a href='index.php?module=mod_connexion&action=Inscription'>Inscription</a><br>";
    }

    public function getContenue(){
        return $this->contenue;
    }
    

}
?>