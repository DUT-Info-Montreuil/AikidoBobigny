<?php
    session_start();

    include_once './modules/depot_fichier/mod_upload.php';
    include_once './modules/mod_connexion/mod_connexion.php';
    include_once './modules/mod_inscription/mod_inscription.php';
    include_once './modules/mod_commentaire/mod_commentaire.php';
    include_once './composants/comp_menu/comp_menu.php';

    Connexion::initConnexion();

    $module = isset($_GET["module"]) ? $_GET["module"] : "mod_connexion";
    switch ($module) {
        case 'upload':
            $page = new ModUpload();
            $contenu = $page->getAffichage();
            break;
        case "mod_connexion": 
            $page = new Modconnexion();
            $contenu = $page->getAffichage();
            break;
        case "mod_inscription": 
            $page = new ModInscription();
            $contenu = $page->getAffichage();
            break; 
        default:
            break;
    }
    $menu = new CompMenu();
    include_once './template.php';
    
?>