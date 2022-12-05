<?php
require_once("vue_loginForm.php");
class ContLoginForm{

    private $vue;

    public function __construct(){
        $this->vue=new VueLoginForm();
    }

    public function exec(){
        return $this->vue->getContenu();
    }
}

?>