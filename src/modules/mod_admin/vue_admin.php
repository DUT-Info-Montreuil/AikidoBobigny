<?php
require_once "./vue_generique.php";
require_once "./modules/mod_faq/vue_faq.php";

class VueAdmin extends VueGenerique{

    private $vue_faq;
    public function __construct(){
        parent::__construct();
        
        $this->vue_faq = new VueFAQ();
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
           
            foreach($tableau as $cle => $valeur){
                echo "
                <div id=$valeur[ID_adherent]>
                Nom : ".htmlspecialchars($valeur['nom'])."<br>
                Prenom : ".htmlspecialchars($valeur['prenom'])."<br>
                mail : ".htmlspecialchars($valeur['adresse_mail'])."<br>
                <button  class='supprimeradherent' targetID=$valeur[ID_adherent] >Supprimer Adherent</button>
                <button  class='validerinscription' targetID=$valeur[ID_adherent] >Valider inscription</button>
                <button  class='validermail' targetID=$valeur[ID_adherent] >Valider mail</button>
                <button  class='passeradmin' targetID=$valeur[ID_adherent] >Passez le compte admin</button>
                <br>
                <input type ='text' class='ID_adherent' id='ID_adherent' value='".$valeur['ID_adherent']."' name = 'ID_adherent'/>
                <input type='hidden' name='token' id='token' value='".$token."'/>
                </div>
                "
                     ; 
                     
            }
            echo"
            
                     <script src = 'https://code.jquery.com/jquery-3.6.1.min.js'
                          integrity='sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ='
                         crossorigin = 'anonymous'></script>
                         <script src='modules/mod_admin/script.js'>
                     </script>";
        }

        public function gerer_faq(array $tableau){
            $token = uniqid(rand(), true);       
        $_SESSION['token'] = $token;
        $_SESSION['token_time'] = time();
            echo"<button class='ajouter_question_reponse' > Ajouter une question et une réponse </button></br>";
            $this->ajoutquestion_reponse();
            foreach($tableau as $cle => $valeur){
                echo "
                Question : ".htmlspecialchars($valeur['question'])."</br>
                Reponse : ".htmlspecialchars($valeur['reponse'])."</br>
                <button class='repondrequestion' targetID=$valeur[id_faq]> Répondre Question</button>
                ".$this->vue_faq->reponse_faq($valeur['id_faq'])."
                <button class='corrigerquestion' targetID=$valeur[id_faq]> Corriger Question</button>
                ".$this->vue_faq->modifier_question($valeur['id_faq'])."
                <button class='supprimerquestion_reponse' targetID=$valeur[id_faq]> Supprimer Question/Reponse </button></br>
                <input type='hidden' name='token' id='token' value='".$token."'/>"
                     ; 

                        }
            echo"
            
            <script src = 'https://code.jquery.com/jquery-3.6.1.min.js'
                 integrity='sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ='
                crossorigin = 'anonymous'></script>
                <script src='modules/mod_admin/scriptfaq.js'>
            </script>";
            
        }

        public function gerercalendrier($tableau){
            echo"<button class='ajouter_evenement' > Ajouter un événement au calendrier </button></br>";
            $this->ajoutevenement();
            foreach($tableau as $cle => $valeur){
                echo "
                Evenement : ".htmlspecialchars($valeur['evenement'])."<br>
                Description : ".htmlspecialchars($valeur['intitule'])."<br>
                Date de début : ".htmlspecialchars($valeur['debut_evenement'])."<br>
                Date de fin : ".htmlspecialchars($valeur['fin_evenement'])."<br>
                <button class='modifier_evenement' targetID=$valeur[ID_evenement]> Modifier evenement</button>
                <button class='modifier_intitule' targetID=$valeur[ID_evenement]> Modifier intule evenement</button>
                <button class='modifier_debut' targetID=$valeur[ID_evenement]> Modifier debut_evenement </button>
                <button class='modifier_fin' targetID=$valeur[ID_evenement]> Modifier fin_evenement </button>
                <button class='suppevenement' targetID=$valeur[ID_evenement]> Supprimer evenement </button></br>
                     "; 

                        }
            echo"
            
            <script src = 'https://code.jquery.com/jquery-3.6.1.min.js'
                 integrity='sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ='
                crossorigin = 'anonymous'></script>
                <script src='modules/mod_admin/scriptcalendrier.js'>
            </script>";
        }

        public function ajoutquestion_reponse(){
            $token = uniqid(rand(), true);       
        $_SESSION['token'] = $token;
        $_SESSION['token_time'] = time();
            echo'<form action="http://sae/src/index.php?module=admin&action=faq" method="POST" style ="display:none" class="ajoutquestion_reponse">
            <p>Quelle est votre question :</p> <textarea <input type="text" name="question_faq" id="question_faq"placeholder="Votre question..."/></textarea></br>
            <p>Quelle est votre reponse:</p> <textarea <input type="textarea" name="reponse_faq" id="reponse_faq" placeholder="Mettez votre reponse "/></textarea></br>
            <input type="submit" value="Poster la question/reponse" class="submit_question_reponse"/>
            <input type="hidden" name="token" id="token" value="'.$token.'"/>

            </form>';
        }

        public function ajoutevenement(){
            $token = uniqid(rand(), true);       
        $_SESSION['token'] = $token;
        $_SESSION['token_time'] = time();
            echo'<form action="http://sae/src/index.php?module=admin&action=calendrier" method="POST" style ="display:none" class="ajoutevenement">
            <p>Intitule:</p> <textarea <input type="text" name="intitule" id="intitule"placeholder="Votre evenement..."/></textarea></br>
            <p>Description:</p> <textarea <input type="textarea" name="description" id="description" placeholder="Description événement"/></textarea></br>
            <p> Date début événement:</p> <input type="date" name="datedebut" id="datedebut"/>
            <p> Date fin événement:</p> <input type="date" name="datefin" id="datefin"/>

            <input type="submit" value="Poster l\'evenement" class="submit_evenement"/>
            <input type="hidden" name="token" id="token" value="'.$token.'"/>

            </form>';
        }

        
    
    }

?>