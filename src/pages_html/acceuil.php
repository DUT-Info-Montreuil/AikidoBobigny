<!DOCTYPE html>
<html lang="fr-FR">
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" href="slider.css">
		<link rel="stylesheet" href="menu.css">
		<link rel="stylesheet" href="style.css">
		<script src="https://kit.fontawesome.com/49a257572d.js" crossorigin="anonymous"></script>
		<title>Document</title>
	</head>
	<body>
		<div id='menu'>
			<ul>
				<li><a href='index.php'>Acceuil</a></li>
				<li><a href='index.php?module=presentation&action=affiche'>L'Aïkido</a></li>
				<li><a href='index.php?module=enseignant&action=affiche'>Les Senseis</a></li>
				<li><a href='index.php?module=tarif&action=affiche'>Tarifs</a></li>
				<li><a href='index.php?module=blog&action=affiche'>Blog</a></li>
				<li><a href='index.php?module=contact&action=affiche'>Contact</a></li>
				<li><a href='index.php?module=mod_commentaire&action=Commentaire'>Commentaire</a></li>
			</ul>
		</div>
		<div id="slider">
			<div id="slider-wrapper">
				<div id="slider-inner">
					<div id="slider-content">
						<div class="slide">
							<div class="slide1"></div>
						</div>
						<div class="slide">
							<div class="slide2"></div>
						</div>
						<div class="slide">
							<div class="slide3"></div>
						</div>
						<div class="slide">
							<div class="slide4"></div>
						</div>
						<div class="slide">
							<div class="slide5"></div>
						</div>
					</div>
					<div id="slider-controls">
						<a href="#" id="slider-prev"><i class="fa-solid fa-arrow-left"></i></a>
						<a href="#" id="slider-next"><i class="fa-solid fa-arrow-right"></i></a>
					</div>
				</div>
			</div>
		</div>
		<p><q>La sagesse ne peut venir que de l'expérience.</q> Morihei Ueshiba, fondateur de l'Aïkido.</p>
		<h1>Acceuil</h1>
		<p>paragraphe de présentation rapide</p>
		<h1>Qu'est ce que l'Aïkido ?</h1>
		<p>L’Aïkido est une discipline universelle qui peut être pratiquée à tout âge. Sur les tatamis, tous/toutes les pratiquant-e-s sont égaux/égales et portent la même tenue. Seule l’expérience accumulée au fil des années les distingue. Cette discipline repose sur le placement, le déplacement, l’engagement des hanches tout en souplesse et en disponibilité. L’Aïkido est une discipline martiale adaptée à tous les publics...</p>
		<a href="">Plus d'infos</a>
		<script src="slider.js"></script>
	</body>
</html>