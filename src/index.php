<?php
    session_start();

    include_once './modules/depot_fichier/mod_upload.php';
    include_once './modules/mod_connexion/mod_connexion.php';
    include_once './modules/mod_inscription/mod_inscription.php';
    include_once './modules/mod_commentaire/mod_commentaire.php';
    include_once './modules/mod_faq/mod_faq.php';
    include_once './composants/comp_menu/comp_menu.php';

    Connexion::initConnexion();

    $module = isset($_GET["module"]) ? $_GET["module"] : "mod_connexion";
    switch ($module) {
        case 'upload':
            $page = new ModUpload();
            $contenu = VueUpload::getAffichage();
            break;
        case "mod_connexion": 
            $mod_connexion = new Modconnexion();
            $contenu = VueConnexion::getAffichage();
            break;
        case "mod_inscription": 
            $mod_inscription = new ModInscription();
            $contenu = VueInscription::getAffichage();
            break;
        case "mod_commentaire": 
            $mod_commentaires = new ModCommentaire();
            $contenu = VueCommentaire::getAffichage();
            break;
        case "mod_faq": 
            $mod_faq = new ModFAQ();
            $contenu = VueFAQ::getAffichage();
            break; 
        default:
            break;
    }
    $menu = new CompMenu();
    include_once './template.php';
    
?>