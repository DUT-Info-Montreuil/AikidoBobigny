<html lang="fr-FR">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Document</title>
	</head>
	<body>
		formulaire de depot de 5 fichiers avec gestion des erreurs
		<form action="depot_fichiers.php" method="post" enctype="multipart/form-data">
			<input type="file" name="fichier1" id="fichier1">
			<input type="file" name="fichier2" id="fichier2">
			<input type="file" name="fichier3" id="fichier3">
			<input type="file" name="fichier4" id="fichier4">
			<input type="file" name="fichier5" id="fichier5">
			<input type="submit" value="Envoyer">
		</form>
		<?php
			// si le formulaire a été envoyé
			if (isset($_POST['fichier1'])) {
				$fichier1 = $_FILES['fichier1'];
				$fichier2 = $_FILES['fichier2'];
				$fichier3 = $_FILES['fichier3'];
				$fichier4 = $_FILES['fichier4'];
				$fichier5 = $_FILES['fichier5'];
				$fichiers = array($fichier1, $fichier2, $fichier3, $fichier4, $fichier5);// on crée un tableau avec les fichiers
				// on parcourt le tableau
				foreach ($fichiers as $fichier) {
					// si le fichier a bien été envoyé
					if ($fichier['error'] == 0) {
						$extension = pathinfo($fichier['name'], PATHINFO_EXTENSION);// on récupère son extension
						$extensions_autorisees = array('jpg', 'jpeg', 'gif', 'png');// on crée un tableau avec les extensions autorisées
						// si l'extension du fichier est autorisée
						if (in_array($extension, $extensions_autorisees)) {
							$nom_unique = md5(uniqid(rand(), true));// on crée un nom unique pour le fichier
							$nom_fichier = $nom_unique . '.' . $extension;// on crée le nom du fichier
							$chemin_fichier = 'fichiers/' . $nom_fichier;// on crée le chemin du fichier
							move_uploaded_file($fichier['tmp_name'], $chemin_fichier);// on déplace le fichier temporaire vers le chemin de destination
							echo 'Le fichier ' . $fichier['name'] . ' a bien été envoyé.<br>';// on affiche un message de succès
						} else {
							echo 'Le fichier ' . $fichier['name'] . ' n\'a pas été envoyé car son extension n\'est pas autorisée.<br>';// on affiche un message d'erreur
						}
					} else {
						echo 'Le fichier ' . $fichier['name'] . ' n\'a pas été envoyé.<br>';// on affiche un message d'erreur
					}
				}
			}
		?>
	</body>
</html>