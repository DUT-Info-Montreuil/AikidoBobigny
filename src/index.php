<?php
    
    session_start();
    include_once './modules/depot_fichier/mod_upload.php';
    include_once './composants/compmenu/comp_menu.php';

    Connexion::initConnexion();

    $module = isset($_GET['module'])?$_GET['module']:'connexion';
    switch ($module) {
        case 'upload':
            $page = new ModUpload();
            $contenu = VueUpload::getAffichage();
            break;
        default:
            break;
    }
    $menu = new CompMenu();
    include_once './template.php';
    
?>