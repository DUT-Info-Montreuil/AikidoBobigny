<?php
    session_start();
    
    include_once("connexion.php");
    include_once("composants/comp_menu/comp_menu.php");
    Connexion::initConnexion();
    $module = isset($_GET["module"]) ? $_GET["module"] : "mod_commentaire";
    switch($module){
        case "mod_commentaire": 
            include_once("modules/$module/$module.php");
            $mod_commentaires = new ModCommentaire();
            $mod = $mod_commentaires->afficheModule();
            break; 
            die("Module inconnu");
                }
            
    $menu = New CompMenu();
    include_once("templates.php");
?>