<?php

header('Content-Type:application/json;charset=utf8');
session_start();
require_once("/home/etudiants/info/ydjahnit/local_html/SAE/AikidoBobigny/src/connexion.php");
Connexion::initConnexion();

if (isset($_POST['function'])) {
    switch ($_POST['function']) {
        case 'supprimeradherent':
            if(isset($_SESSION['token']) && isset($_SESSION['token_time']) && isset($_POST['token'])){
                if($_SESSION['token'] ==($_POST['token'])){
                    $timestamp_ancien = time() - (15*60);
                    if($_SESSION['token_time'] >= $timestamp_ancien){
                $id = $_POST['ID_adherent'];
                echo "$id";
                $req1 = Connexion::getConnexion()->prepare('DELETE from info_inscription where ID_adherent= ? ');
                $req1->execute(array($id));
                $req = Connexion::getConnexion()->prepare('DELETE from adherent where ID_adherent= ? ');
                $req->execute(array($id));
                
                var_dump($id);
                echo "Suppresion effectué";  
                    }}}  
            break;
    }
}
?>