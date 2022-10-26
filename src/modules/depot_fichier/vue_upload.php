<?php

	include_once './vue_generique.php';

	class VueUpload extends VueGenerique {

		public function __construct() {
			parent::__construct();
		}

		function form_upload() {
			echo '<form action="index.php?module=upload&action=upload" method="post" enctype="multipart/form-data" id="form-upload">
						<input type="file" name="piece_identite" id="piece_identite">
						<input type="file" name="attestation_sante" id="attestation_sante">
						<input type="file" name="droit_image" id="droit_image">
						<input type="file" name="certificat_medical" id="certificat_medical">
						<input type="file" name="autorisation_parentale" id="autorisation_parentale">
						<input type="submit" value="Envoyer">
					</form>';
		}
        
    }

?>