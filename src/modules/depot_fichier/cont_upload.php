<?php

    include_once 'vue_upload.php';
    include_once 'modele_upload.php';

	class ContUpload {

        private $modele, $vue;

		public function __construct(ModeleUpload $modele, VueUpload $vue) {
            $this->modele = $modele;
            $this->vue = $vue;
            $this->action = isset($_GET['action'])?$_GET['action']:'form_upload';
		}

        function form_upload() {
            $this->vue->form_upload();
        }

        function upload() {
            $this->modele->upload();
        }

        function exec() {
            switch ($this->action) {
                case 'form_upload':
                    $this->form_upload();
                    break;
                case 'upload':
                    $this->upload();
                    break;
                default:
                    $this->form_upload();
                    break;
            }
        }
        
    }

?>