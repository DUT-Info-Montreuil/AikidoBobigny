<?php

include_once('mod_calendrier/cont_calendrier.php');

Connexion::initConnexion();

echo '<ul><li><a href="index.php?module=calendrier">Calendrier</a></li>';

$module = isset($_GET['module'])?$_GET['module'] : "calendrier";

switch($module){
    case "calendrier":
        require_once('mod_calendrier/mod_calendrier.php');
        $m = new ModCalendrier();  
        break;
}