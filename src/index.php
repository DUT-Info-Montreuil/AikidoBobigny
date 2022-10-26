<?php
    
    session_start();
    include_once './composants/compmenu/comp_menu.php';

    ob_end_clean();
    Connexion::initConnexion();

    $menu = new CompMenu();
    include_once './template.php';

    
?>