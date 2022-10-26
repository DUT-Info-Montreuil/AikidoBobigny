<?php
    session_start();
    
    include_once("connexion.php");
    include_once("composants/comp_menu/comp_menu.php");
    Connexion::initConnexion();
    /*
    if(isset($_POST["token"])){
        unset($_SESSION['token']);
        echo"token supp";
    }
*/
          
    $module = isset($_GET["module"]) ? $_GET["module"] : "mod_inscription";
    switch($module){
        case "mod_inscription": 
            include_once("modules/$module/$module.php");
            $mod_joueurs = new ModInscription();
            $mod = $mod_joueurs->afficheModule();
            break; 
            die("Module inconnu");
                }
            
    $menu = New CompMenu();
    include_once("templates.php");
?>


