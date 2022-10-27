<?php
include_once ('cont_calendrier.php');

class ModCalendrier{

    public function __construct(){
        $controleurCalendrier = new ContCalendrier();
        $controleurCalendrier->exec();
    }

}


?>