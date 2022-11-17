<?php
require_once "./vue_generique.php";
class VueAdmin extends VueGenerique{

    public function __construct(){
        parent::__construct();
    }   

        public function menu(){
            echo "<a href='index.php?module=admin&action=inscription'>Gerez vos inscription </a><br>";
            echo "<a href='index.php?module=admin&action=faq'>Gerez votre FAQ </a><br>";
            echo "<a href='index.php?module=admin&action=articles'>Gerez vos articles </a><br>";
            echo "<a href='index.php?module=admin&action=calendrier'>Gerez votre calendrier/evenements </a><br>";
        }
        public function gerer_inscrip(array $tableau){
            foreach($tableau as $cle => $valeur){
                echo "<form>
                <a href='index.php?module=admin&action=inscription&id=".$valeur['ID_adherent']."'></a>
                Nom : ".$valeur['nom']."<br>
                Prenom : ".$valeur['prenom']."<br>
                mail : ".$valeur['adresse_mail']."<br>
                <input type ='submit' class='button' value='supprimer' name = 'supprimeradherent'/>
                <input type ='submit' class='button' value='verifinfo' name = 'verifinfo'/>
                <input type ='submit' class='button' value='verifinscrip' name = 'verifinscrip'/>
                <input type ='submit' class='button' value='validermail' name = 'validermail'/>
                <input type ='submit' class='button' value='passeradmin' name = 'passeradmin'/>
                </form>"
                     ; 
            }
        }

        public function gerer_faq(array $tableau){
            echo"<input type ='submit' class='button' value='question/reponse' name ='question/reponse'/><br>";
            foreach($tableau as $cle => $valeur){
                echo "<form>
                <a href='index.php?module=admin&action=faq&id=".$valeur['id_faq']."'></a>
                Question : ".$valeur['question']."<br>
                Reponse : ".$valeur['reponse']."<br>
                <input type ='submit' class='button' value='repondre' name ='repondre'/>
                <input type ='submit' class='button' value='corriger' name = 'corriger'/>
                <input type ='submit' class='button' value='suprimer' name = 'suprimer'/>
                </form>"
                     ; 
            }
        }
    
      
}


?>