<?php

include_once 'connexion.php';

class ModeleArticle extends Connexion{

    public function __construct(){
    }

    public function insertArticle(){
       
        $sql = ('INSERT INTO article (date,titre,texte,img_bin) VALUES (?,?,?,?)');
        $sth = parent::$bdd->prepare($sql);
        $sth->execute(array($_POST['dateArticle'],$_POST['titreArticle'],$_POST['texteArticle'],file_get_contents($_FILES['image']['tmp_name'])));
            
    }

    public function articleRecherche(){
       
        $dateVoulu = $_POST['datevoulu'] ;
        $sql =("SELECT titre,ID_article FROM article WHERE date = '$dateVoulu' ");
        $sth = parent::$bdd->prepare($sql);
        $sth->execute();
        return $sth->fetchAll();
                
    }


    public function articleRechercheDetails($id){ 
        $sql =("SELECT * FROM article WHERE ID_article = ? ");
        $sth = parent::$bdd->prepare($sql);
        $sth->execute(array($id));
        return $sth->fetch();
    }

    public function deleteArticle(){
        
                    if(isset($_POST['articleSup'])){
                        foreach($_POST['articleSup'] as $articleVerif){
                            $sql =("DELETE FROM article WHERE ID_article = $articleVerif");
                            $sth = parent::$bdd->prepare($sql);
                            $sth->execute();        
                        }
                    echo'</br>';
                    echo 'Article(s) effacés avec succès !';
                    }
                
            
    }

    public function articleRechercheCommentaire(){
        $sql =("SELECT titre,ID_article FROM article");
        $sth = parent::$bdd->prepare($sql);
        $sth->execute();
        return $sth->fetchAll();
    }

    public function articleGestionRecherche(){
        $sql =("SELECT titre,ID_article,date FROM article");
        $sth = parent::$bdd->prepare($sql);
        $sth->execute();
        return $sth->fetchAll();
    }

    public function getArticles(){
        $sql = ("SELECT * FROM article");
        $sth = parent::$bdd->prepare($sql);
        $sth->execute();
        return $sth->fetchAll();
    }
    
    public function dernierArticle(){
        $sql = ("SELECT * FROM article ORDER BY ID_article DESC LIMIT 0,1");
        $sth = parent::$bdd->prepare($sql);
        $sth->execute();
        while($row = $sth->fetch()){
            echo"Voici le dernier artcile publié le : ".$row['date']."</br>";
            echo htmlspecialchars($row['titre']);
            echo"<br>";
            echo htmlspecialchars($row ['texte']);
            echo"<br>";
            echo '<img src = "data:image/jpg;base64,'. base64_encode($row['img_bin']) .'" width = "400px" height = "400px"/>';
        }
    }
    

}



?>