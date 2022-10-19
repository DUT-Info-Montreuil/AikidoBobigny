<?php
class VueMenu{

    private $contenue;
    public function __construct(){
    }


    public function completecontenu(){
        if(isset($_SESSION['connexion'])){
            $this->contenue.="<a href='index.php?module=mod_connexion&action=Deconnexion'>Deconnexion</a><br>";
        }else{
             $this->contenue.="<a href='index.php?module=mod_connexion&action=Se-connecter'>Se connecter</a><br>";
              
        }
    }

    public function getContenue(){
        return $this->contenue;
    }
    

}
?>