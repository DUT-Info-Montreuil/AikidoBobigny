<?php
    session_start();
    include_once("connexion.php");
    include_once("modules/mod_connexion/mod_connexion.php");
    include_once("composants/comp_menu/comp_menu.php");
    Connexion::initConnexion();

          
    $module = isset($_GET["module"]) ? $_GET["module"] : "mod_connexion";
    switch($module){
        case "mod_connexion": 
            $mod_connexion = new Modconnexion();
            $mod = $mod_connexion->afficheModule();
            break;
        default:
            die("Module inconnu");
                }
            
    $menu = New CompMenu();
    include_once("templates.php");
?>