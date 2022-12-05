<?php
require_once("cont_admin.php");
class ModAdmin{

    private $controleur;
    public function __construct(){
        ///if(isset($_SESSION['admin'])&& $_SESSION['admin']==1){
            $vue=new VueAdmin();
            $modele=new ModeleAdmin();
            $this->controleur = new ContAdmin($modele,$vue);
            echo($this->controleur->exec());
        //}else{}
      
    }

    public function afficheModule(){
        return $this->controleur->afficheMod();
    }
}
?>