<?php
    session_start();

    include_once './modules/mod_upload/mod_upload.php';
    include_once './modules/mod_connexion/mod_connexion.php';
    include_once './modules/mod_inscription/mod_inscription.php';
    include_once './modules/mod_commentaire/mod_commentaire.php';
    include_once './modules/mod_csv/mod_csv.php';
    include_once './modules/mod_calendrier/mod_calendrier.php';
    include_once './modules/mod_faq/mod_faq.php';
    include_once './composants/comp_menu/comp_menu.php';

    Connexion::initConnexion();

    $module = isset($_GET["module"]) ? $_GET["module"] : "connexion";
    switch ($module) {
        case 'upload':
            $page = new ModUpload();
            $contenu = $page->getAffichage();
            break;
        case "mod_connexion": 
            $page = new Modconnexion();
            $contenu = $page->getAffichage();
            break;
        case "inscription": 
            $mod_inscription = new ModInscription();
            $contenu = VueInscription::getAffichage();
            break;
        case "commentaire": 
            $mod_commentaires = new ModCommentaire();
            $contenu = VueCommentaire::getAffichage();
            break;
        case "calendrier":
            $mod_calendrier = new ModCalendrier();
            $contenu = VueCalendrier::getAffichage();
            break;
        case "mod_faq": 
            $mod_faq = new ModFAQ();
            $contenu = VueFAQ::getAffichage();
            break; 
        case "csv":
            $mod_csv = new ModCSV();
            $contenu = VueCSV::getAffichage();
            break;
        default:
            break;
    }
    $menu = new CompMenu();
    include_once './template.php';
    
?>