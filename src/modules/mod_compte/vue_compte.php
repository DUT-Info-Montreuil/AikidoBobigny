
<?php

require_once "./vue_generique.php";
class VueCompte extends VueGenerique
{
     
    public function __construct(){
        parent::__construct();
        
    }

    public function affichageprincipal($tableau){
        /* Code postal : ".htmlspecialchars($tableau['code_postal'])."<br>
            Ville : ".htmlspecialchars($tableau['ville'])."<br>*/
            echo "
            <div >
            Nom : ".htmlspecialchars($tableau['nom'])."<br>
            Prenom : ".htmlspecialchars($tableau['prenom'])."<br>
            mail : ".htmlspecialchars($tableau['adresse_mail'])."<br>
            Date de naissance : ".htmlspecialchars($tableau['date_de_naissance'])."<br>
            Adresse : ".htmlspecialchars($tableau['adresse'])."<br>
           
            <button onClick='alertDeconnexion()'>Deconnexion</button>
  
            </div>
            "; 
        
    }
    public function afficheadmin(){
        echo "<li><a href='index.php?module=admin&action=admin'>Admin</a><li>";
        
    }



    }






?>