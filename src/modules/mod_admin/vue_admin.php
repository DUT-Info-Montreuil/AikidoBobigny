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
        $token = uniqid(rand(), true);       
        $_SESSION['token'] = $token;
        $_SESSION['token_time'] = time();
            echo"
            
            <script src = 'https://code.jquery.com/jquery-3.6.1.min.js'
                 integrity='sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ='
                crossorigin = 'anonymous'></script>
                <script src='modules/mod_admin/script.js'>
            </script>
                ";
            foreach($tableau as $cle => $valeur){
                echo "
                Nom : ".htmlspecialchars($valeur['nom'])."<br>
                Prenom : ".htmlspecialchars($valeur['prenom'])."<br>
                mail : ".htmlspecialchars($valeur['adresse_mail'])."<br>
                <input type ='submit' class='button' value='supprimeradherent' name = 'supprimeradherent'/>
                <input type ='submit' class='button' value='verifinfo' name = 'verifinfo'/>
                <input type ='submit' class='button' value='verifinscrip' name = 'verifinscrip'/>
                <input type ='submit' class='button' value='validermail' name = 'validermail'/>
                <input type ='submit' class='button' value='passeradmin' name = 'passeradmin'/><br>
                <input type ='hidden' class='ID_adherent' value='".$valeur['ID_adherent']."' name = 'ID_adherent'/>
                <input type='hidden' name='token' id='token' value='".$token."'/>
                "
                     ; 
            }
        }

        public function gerer_faq(array $tableau){
            $token = uniqid(rand(), true);       
        $_SESSION['token'] = $token;
        $_SESSION['token_time'] = time();
            echo"<input type ='submit' class='button' value='ajouter_question/reponse' name ='ajouter_question/reponse'/><br>";
            foreach($tableau as $cle => $valeur){
                echo "
                <a href='index.php?module=admin&action=faq&id=".$valeur['id_faq']."'></a>
                Question : ".htmlspecialchars($valeur['question'])."<br>
                Reponse : ".htmlspecialchars($valeur['reponse'])."<br>
                <input type ='submit' class='button' value='repondrequestion' name ='repondrequestion'/>
                <input type ='submit' class='button' value='corrigerquestion' name = 'corrigerquestion'/>
                <input type ='submit' class='button' value='suprimerquestion_reponse' name = 'suprimerquestion'/>
                <input type='hidden' name='token' id='token' value='".$token."'/>"
                     ; 
            }
        }

        public function ajoutquestion_reponse(){
            $token = uniqid(rand(), true);       
        $_SESSION['token'] = $token;
        $_SESSION['token_time'] = time();
            echo'<form action="index.php?module=mod_admin&action=" method="POST">
            <p>Quelle est votre question :</p> <textarea <input type="text" name="question_faq" placeholder="Votre question..."/></textarea></br>
            <p>Quelle est votre reponse:</p> <textarea <input type="textarea" name="reponse_faq" placeholder="Mettez votre reponse "/></textarea></br>
            <input type="submit" value="Poster la question/reponse" name="submit_question_reponse"/>
            <input type="hidden" name="token" id="token" value="'.$token.'"/>

            </form>';
    
        }
    
      
}


?>