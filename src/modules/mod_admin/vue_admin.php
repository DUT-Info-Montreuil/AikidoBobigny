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
            echo"
            
            <script src = 'https://code.jquery.com/jquery-3.6.1.min.js'
                 integrity='sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ='
                crossorigin = 'anonymous'></script>
                <script src='modules/mod_admin/script.js'>
            </script>
                ";
            foreach($tableau as $cle => $valeur){
                echo "
                Nom : ".$valeur['nom']."<br>
                Prenom : ".$valeur['prenom']."<br>
                mail : ".$valeur['adresse_mail']."<br>
                <input type ='submit' class='button' value='supprimeradherent' name = 'supprimeradherent'/>
                <input type ='submit' class='button' value='verifinfo' name = 'verifinfo'/>
                <input type ='submit' class='button' value='verifinscrip' name = 'verifinscrip'/>
                <input type ='submit' class='button' value='validermail' name = 'validermail'/>
                <input type ='submit' class='button' value='passeradmin' name = 'passeradmin'/><br>
                "
                     ; 
            }
        }

        public function gerer_faq(array $tableau){
            echo"<input type ='submit' class='button' value='ajouter_question/reponse' name ='ajouter_question/reponse'/><br>";
            foreach($tableau as $cle => $valeur){
                echo "<form>
                <a href='index.php?module=admin&action=faq&id=".$valeur['id_faq']."'></a>
                Question : ".$valeur['question']."<br>
                Reponse : ".$valeur['reponse']."<br>
                <input type ='submit' class='button' value='repondrequestion' name ='repondrequestion'/>
                <input type ='submit' class='button' value='corrigerquestion' name = 'corrigerquestion'/>
                <input type ='submit' class='button' value='suprimerquestion' name = 'suprimerquestion'/>
                <input type ='submit' class='button' value='suprimerreponse' name = 'suprimerreponse'/>
                </form>"
                     ; 
            }
        }
    
      
}


?>