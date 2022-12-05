<!DOCTYPE html>
<html lang="fr-FR">

	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" href="style/slider.css">
		<link rel="stylesheet" href="style/menu.css">
		<link rel="stylesheet" href="style/style.css">
		<link rel="stylesheet" href="style/calendar.css">
		<link rel="stylesheet" href="style/footer.css">
		<link rel="stylesheet" href="style/login.css">
		<link rel="stylesheet" href="style/inscription.css">
		<link rel="stylesheet" href="style/table.css">
		<link rel="stylesheet" href="style/faq.css">
		<script src="https://kit.fontawesome.com/49a257572d.js" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.6.14/dist/sweetalert2.all.min.js"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    	<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
    	<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>
		<script src="js/alerts.js"></script>
		<title>AIKIDO BOBIGNY</title>
	</head>

	<body>
		<?php
			if (isset($module) && $module != "inscription") {
				$menu->affiche();
				echo '<div class="content">';
			}
			if (isset($contenu)) {
				if (isset($module) && ($module == "accueil" || $module == "connexion")) {
					$slider->affiche();
					echo $contenu;
					$calendar->affiche();
				} else {
					echo $contenu;
				}
			}
			if (isset($module) && $module != "inscription") {
				echo '</div>';
				$login->affiche();
			}
			
			$footer->affiche();
		?>
		<script src="js/slider.js"></script>
		<script src="js/loginForm.js"></script>
		<script src="js/signInForm.js"></script>
		<script src="js/faq.js"></script>
	</body>

</html>