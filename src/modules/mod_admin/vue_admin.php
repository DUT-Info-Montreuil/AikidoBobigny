<?php
require_once "./vue_generique.php";
require_once "./modules/mod_faq/vue_faq.php";

include_once('./modules/mod_article/vue_article.php');
include_once('./modules/mod_csv/vue_csv.php');
class VueAdmin extends VueGenerique{

    private $vue_faq;
    private $vue_article;
    private $vue_csv;
    public function __construct(){
        parent::__construct();
        
        $this->vue_faq = new VueFAQ();
        $this->vue_csv = new VueCSV();
        $this->vue_article = new VueArticle();

    }   

        public function menu() {
            $vue = "<div class='menu_admin'>
                    <a href='index.php?module=admin&action=inscription' class='lienAdmin'>Gerez vos inscription </a><br><br>
                    <a href='index.php?module=admin&action=faq' class='lienAdmin'>Gerez votre FAQ </a><br><br>
                    <a href='index.php?module=admin&action=article' class='lienAdmin'>Gerez vos articles </a><br><br>
                    <a href='index.php?module=admin&action=calendrier' class='lienAdmin'>Gerez votre calendrier/evenements </a><br><br>
                    <a href='index.php?module=admin&action=menu' class='lienAdmin'>Générer fichier Csv</a><br><br>
                    </div>";
            echo $vue;
        }

        public function csv(){
                $this->vue_csv->afficherGenererCSV();
        }
        public function gerer_article($tableau){

                $this->vue_article->menu();
                foreach($tableau as $cle => $valeur){
                    echo "
                    Titre : ".htmlspecialchars($valeur['titre'])."<br>
                    Date : ".htmlspecialchars($valeur['date'])."<br>
                   
                    ";
                }
        }
        public function gerer_inscrip(array $tableau){ 
       
            foreach($tableau as $cle => $valeur){
                echo "
                <div id=$valeur[ID_adherent]>
                Nom : ".htmlspecialchars($valeur['nom'])."<br>
                Prenom : ".htmlspecialchars($valeur['prenom'])."<br>
                mail : ".htmlspecialchars($valeur['adresse_mail'])."<br>

                <button  class='supprimeradherent' targetID=$valeur[ID_adherent] nom='".htmlspecialchars($valeur['nom'])."' prenom='".htmlspecialchars($valeur['prenom'])."' >Supprimer Adherent</button>
                <button  class='validerinscription' targetID=$valeur[ID_adherent] nom='".htmlspecialchars($valeur['nom'])."' prenom='".htmlspecialchars($valeur['prenom'])."' validinscrip='".htmlspecialchars($valeur['inscripverif'])."'>Valider inscription</button>
                <button  class='enleverinscription' targetID=$valeur[ID_adherent] nom='".htmlspecialchars($valeur['nom'])."' prenom='".htmlspecialchars($valeur['prenom'])."' devalidinscrip='".htmlspecialchars($valeur['inscripverif'])."'>Enlever validation inscription</button>
                <button  class='validermail' targetID=$valeur[ID_adherent] nom='".htmlspecialchars($valeur['nom'])."' prenom='".htmlspecialchars($valeur['prenom'])."' validmail='".htmlspecialchars($valeur['mailverif'])."'>Valider mail</button>
                <button  class='enlevermail' targetID=$valeur[ID_adherent] nom='".htmlspecialchars($valeur['nom'])."' prenom='".htmlspecialchars($valeur['prenom'])."' devalidmail='".htmlspecialchars($valeur['mailverif'])."'>Enlever validation mail</button>
                <button  class='passeradmin' targetID=$valeur[ID_adherent] nom='".htmlspecialchars($valeur['nom'])."' prenom='".htmlspecialchars($valeur['prenom'])."' admin='".htmlspecialchars($valeur['admin'])."'>Passez le compte admin</button>
                <br>
                
                </div>
                "
                     ; 
                     
            }
            echo"
            
                     <script src = 'https://code.jquery.com/jquery-3.6.1.min.js'
                          integrity='sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ='
                         crossorigin = 'anonymous'></script>
                         <script src='modules/mod_admin/scriptinscription.js'>
                     </script>";
        }

        public function gerer_faq(array $tableau){
       
            echo"<button class='ajouter_question_reponse' > Ajouter une question et une réponse </button></br>";
            $this->ajoutquestion_reponse();
            foreach($tableau as $cle => $valeur){
                echo "
                Question : ".htmlspecialchars($valeur['question'])."</br>
                Reponse : ".htmlspecialchars($valeur['reponse'])."</br>
                <button class='repondrequestion' targetID=$valeur[id_faq] questionrep='".htmlspecialchars($valeur['question'])."'> Répondre Question</button>
                ".$this->vue_faq->reponse_faq($valeur['id_faq'])."
                <button class='corrigerquestion' targetID=$valeur[id_faq] corrigequestion='".htmlspecialchars($valeur['question'])."'> Corriger Question</button>
                ".$this->vue_faq->modifier_question($valeur['id_faq'])."
                <button class='supprimerquestion_reponse' targetID=$valeur[id_faq] reponsesupp='".htmlspecialchars($valeur['reponse'])."' questionsupp='".htmlspecialchars($valeur['question'])."'> Supprimer Question/Reponse </button></br>

                </>"

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

            echo'<form action="http://sae/src/index.php?module=admin&action=faq" method="POST" style ="display:none" class="ajoutquestion_reponse">
            <p>Quelle est votre question :</p> <textarea <input type="text" name="question_faq" id="question_faq"placeholder="Votre question..."/></textarea></br>
            <p>Quelle est votre reponse:</p> <textarea <input type="textarea" name="reponse_faq" id="reponse_faq" placeholder="Mettez votre reponse "/></textarea></br>
            <input type="submit" value="Poster la question/reponse" class="submit_question_reponse"/>
            

            </form>';
        }

        public function ajoutevenement(){
        
            echo'<form action="http://sae/src/index.php?module=admin&action=calendrier" method="POST" style ="display:none" class="ajoutevenement">
            <p>Intitule:</p> <textarea <input type="text" name="intitule" id="intitule"placeholder="Votre evenement..."/></textarea></br>
            <p>Description:</p> <textarea <input type="textarea" name="description" id="description" placeholder="Description événement"/></textarea></br>
            <p> Date début événement:</p> <input type="date" name="datedebut" id="datedebut"/>
            <p> Date fin événement:</p> <input type="date" name="datefin" id="datefin"/>

            <input type="submit" value="Poster l\'evenement" class="submit_evenement"/>
          

            </form>';
        }

        
    
    }


?>