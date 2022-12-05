
<?php

include_once('./modules/mod_commentaire/vue_commentaire.php');
require_once "./vue_generique.php";
class VueArticle extends VueGenerique
{
    
    public function __construct(){
    }

    public function menu(){
       echo '<a href = "index.php?module=article&action=formArticle">Ajouter un article</a>', '<br/>';
       echo '<a href = "index.php?module=article&action=formDelete">Supprimer un article</a>', '<br/>';
       echo '<a href = "index.php?module=article&action=gererCommentaire">Liste des artciles pour gérer les commentaires </a>', '<br/>'; 
        
    }

    public function formArticle(){
        echo'</br>';
        echo'<form action="http://sae/src/index.php?module=article&action=insertArticle" method="POST" enctype="multipart/form-data">
            <label for="date">Date Article</label>
            <input type = "date" name ="dateArticle">
            <label for = "titre">Titre article</label>
            <input type = "text" name = "titreArticle" maxlength = 100>
            <label for ="texte">Texte article</label>
            <input type = "text" name = "texteArticle">
            <label for = "img">Charger une image : </label>
            <input type = "file" name = "image">
            <input type = "submit" value ="Créer">
            </form>
        ';
        echo'<br/>';
    }

    public function formDelete($rechercheArticle){
        if($rechercheArticle){
            echo '</br>';
            echo "Pour supprimer des articles : ";
            echo '<form action ="http://sae/src/index.php?module=article&action=deleteArticle" method ="POST">';
            echo '<table>';
            echo '  <tr>
                        <th>Titre</th>
                        <th>Date</th>
                    </tr>';
            foreach($rechercheArticle as $row){
                $id = $row['ID_article'];
                $titre = $row['titre'];
                $date = $row['date'];
                echo '</br>';
                echo "<tr>
                            <td><input type= 'checkbox' name ='articleSup[]' value ='$id'></td>
                            <td>$titre</td>
                            <td>$date</td>
                        </tr>";
            }
            echo '</table>';
            echo '<input type = "submit" value = "Supprimer">'; 
            echo '</form>';
            
        }

    }

    public function rechercherArticle($recherche){
        echo'</br>';
        echo'<form action="http://sae/src/index.php?module=article&action=articleRecherche" method="POST">
            <label for="date"> Sélectionner une date :</label>
            <input type="date" name="datevoulu">
            <input type="submit" value="Rechercher">
            </form>
            ';
        echo'</br>';
        echo 'Articles les plus récents : ';
        echo '</br>';
        if($recherche){
            foreach($recherche as $row){ 
                $id = $row['ID_article'];
                $titre = $row['titre'];
                echo '</br>';
                echo "<a href=http://sae/src/index.php?module=article&action=articleDetails&id=$id>$titre</a>";
                echo '</br>';
            }
        }
        else{
            echo 'Aucun article publié récemment';
        }

    }

    public function afficherRecherche($recherche){
        if($recherche){
            foreach($recherche as $row){
                $titre = $row['titre'];
                $id = $row['ID_article'];
                echo '</br>';
                echo "<a href=http://sae/src/index.php?module=article&action=articleDetails&id=$id>$titre</a>";
                echo '</br>';
            }
        }   
        else{
            echo'</br>';
            echo'Aucun article est disponible sur cette date';
        }
    }

    

    public function articleDetails($rechercheDetails,$rechercheCom){
        if($rechercheDetails){
            foreach(array($rechercheDetails) as $row){
                echo '<img src = "data:image/jpg;base64,'. base64_encode($row['img_bin']) .'" width = "400px" height = "400px"/>'

                .'</br>';
                echo '</br>';
                echo $row['titre'];
                echo '</br>';
                echo '</br>';
                echo $row['texte'];
                echo '</br>';
            }     
        }
        $vueCommentaire = new VueCommentaire;
        $vueCommentaire->form_commentaire($rechercheDetails['ID_article']);
        foreach($rechercheCom as $rowCom){
            echo '</br>';
            echo $rowCom['login'];
            echo '</br>';
            echo $rowCom['texte'];
            echo '</br>';
            echo '<p>écrit le '.$rowCom['date_com'] .'</p>';


        } 
    }

    public function listeArticleCommentaire($gestionCommentaire){
        if($gestionCommentaire){
            echo '</br>';
            echo 'Sélectionner un article dont vous voulez gerer les commentaires :';
            echo '</br>';
            foreach($gestionCommentaire as $row){
                $titre = $row['titre'];
                $id = $row['ID_article'];
                echo '</br>';
                echo "<a href=http://sae/src/index.php?module=article&action=listeCommentaire&id=$id>$titre</a>";
                echo '</br>';
            }
        }
    }


    public function listeCommentaireSup($rechercheCom){
        if($rechercheCom){
            echo '</br>';
            echo "Pour supprimer des commentaires : ";
            echo '</br>';
            echo '<form action ="http://sae/src/index.php?module=article&action=deleteCommentaire" method ="POST">';
            echo '<table>';
            echo '  <tr>
                        <th>Adhérent</th>
                        <th>Commentaire</th>
                        <th>Date</th>

                        <th>Statut_commentaire</th>
                    </tr>';
            foreach($rechercheCom as $row){
                $id = $row['ID_commentaires'];
                $auteur = $row['login'];
                $texte = $row['texte'];
                $date = $row['date_com'];
                $statut = $row['com_validation'];
                echo '</br>';
                echo "<tr>
                            <td><input type= 'checkbox' name ='supprimer_valider[]' value ='$id'></td>
                            <td>$auteur</td>
                            <td>$texte</td>
                            <td>$date</td>
                            <td>$statut</td>
                        </tr>";
            }
            echo '</table>';
            echo '<input type = "submit" value = "Supprimer">'; 
            echo '</form>';
            
        }
        else{
            echo '</br>';
            echo 'Aucun commentaire a été posté sur cet article';
        }
    }

        public function listeCommentaireValid($rechercheCom){
            if($rechercheCom){
                echo '</br>';
                echo "Pour valider des commentaires : ";
                echo '</br>';
                echo '<form action ="http://sae/src/index.php?module=article&action=validationCommentaire" method ="POST">';
                echo '<table>';
                echo '  <tr>
                            <th>Adhérent</th>
                            <th>Commentaire</th>
                            <th>Date</th>
                            <th>Statut_commentaire</th>
                        </tr>';
                foreach($rechercheCom as $row){
                    $id = $row['ID_commentaires'];
                    $auteur = $row['login'];
                    $texte = $row['texte'];
                    $date = $row['date_com'];
                    $statut = $row['com_validation'];
                    echo '</br>';
                    echo "<tr>
                                <td><input type= 'checkbox' name ='supprimer_valider[]' value ='$id'></td>
                                <td>$auteur</td>
                                <td>$texte</td>
                                <td>$date</td>
                                <td>$statut</td>
                            </tr>";
                }
                echo '</table>';
                echo '<input type = "submit" value = "Valider">'; 
                echo '</form>';
                
            }
        }




    }






?>