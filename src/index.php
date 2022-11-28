<?php
    session_start();

    include_once './modules/mod_upload/mod_upload.php';
    include_once './modules/mod_connexion/mod_connexion.php';
    include_once './modules/mod_inscription/mod_inscription.php';
    include_once './modules/mod_commentaire/mod_commentaire.php';
    include_once './modules/mod_mail/mod_mail.php';
    include_once './modules/mod_csv/mod_csv.php';
    include_once './modules/mod_faq/mod_faq.php';
    include_once './modules/mod_accueil/mod_accueil.php';

    include_once './composants/comp_menu/comp_menu.php';
    include_once './composants/comp_slider/comp_slider.php';
    include_once './composants/comp_calendar/comp_calendar.php';
    include_once './composants/comp_footer/comp_footer.php';
    include_once './composants/comp_loginForm/comp_loginForm.php';

    Connexion::initConnexion();

    $module = isset($_GET["module"]) ? $_GET["module"] : "accueil";
    switch ($module) {
        case 'accueil':
            $page = new ModAccueil();
            break;
        case 'upload':
            $page = new ModUpload();
            break;
        case "connexion": 
            $page = new ModAccueil();
            new ModConnexion();
            break;
        case "inscription": 
            $page = new ModInscription();
            break;
        case "commentaire": 
            $page = new ModCommentaire();
            break;
        case "faq": 
            $page = new ModFAQ();
            break; 
        case "mail": 
            $page = new ModMail();
            break; 
        case "csv":
            $page = new ModCSV();
            break;
        default:
            break;
    }
    $menu = new CompMenu();
    $slider = new CompSlider();
    $calendar = new CompCalendar();
    $footer = new CompFooter();
    $login = new CompLoginForm();
    
    $contenu = $page->getAffichage();
    include_once './template.php';
    
?>