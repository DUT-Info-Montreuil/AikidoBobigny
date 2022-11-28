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
		<script src="https://kit.fontawesome.com/49a257572d.js" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.6.14/dist/sweetalert2.all.min.js"></script>
		<title>AIKIDO BOBIGNY</title>
	</head>
	<body>
		<div class="content">
			<?php
				$menu->affiche();
				if (isset($contenu)) {
					if (isset($module) && ($module == "accueil" || $module == "connexion")) {
						$slider->affiche();
						echo $contenu;
						$calendar->affiche();
					} else {
						echo $contenu;
					}
				}
				$login->affiche();
				$footer->affiche();
			?>
		</div>
		<script src="js/slider.js"></script>
		<script src="js/loginForm.js"></script>
	</body>
</html>