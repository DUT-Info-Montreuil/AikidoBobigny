<?php

class VueAccueil extends VueGenerique
{

	public function __construct(){
		parent::__construct();
	}

	function afficherAccueil()
	{
		$contenu = '
			<p id="quote"><q>La sagesse ne peut venir que de l\'expérience.</q> Morihei Ueshiba, fondateur de l\'Aïkido.</p>
			<div id="intro">
				<h1>Accueil</h1>
				<p>A Bobigny, on pratique à tous les âges à partir de 6 ans. Notre objectif est de vous fournir des cours réguliers, des cours techniques et surtout un cours personnalisé qui vous permet d\'apprendre et de grandir à votre niveau d\'aïkido. Rejoignez-nous de manière sportive et humaine dans une ambiance conviviale. Notre objectif est de vous fournir des cours réguliers, des cours techniques et surtout un cours personnalisé qui vous permet d\'apprendre et de grandir à votre niveau d\'aïkido. Rejoignez-nous de manière sportive et humaine dans une ambiance conviviale.Notre partie fait partie du club sportif de Bobigny</p>
			</div>
			<hr>
			<div id="intro-aikido">
				<div id="textAikidoPres">
					<h2>Qu\'est ce que l\'Aïkido ?</h1>
					<p>L’Aïkido est une discipline universelle qui peut être pratiquée à tout âge. Sur les tatamis, tous/toutes les pratiquant-e-s sont égaux/égales et portent la même tenue. Seule l’expérience accumulée au fil des années les distingue. Cette discipline repose sur le placement, le déplacement, l’engagement des hanches tout en souplesse et en disponibilité. L’Aïkido est une discipline martiale adaptée à tous les publics...</p>
					<a href="index.php?module=aikido">Plus d\'infos</a>
					<h2>Téléchargez le livret débutant fédéral la FFAAA <a href="http://www.aikido-idf-ffaaa.fr/media/2019/02/aikido-ffaaa-guide-debutant.pdf" target="_blank">ici !</a></h2>
				</div>
				<iframe src="https://www.youtube.com/embed/9zCCKM9nMos" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen id="videoAikidoPres"></iframe>
			</div>
		<hr>';
		echo $contenu;
	}
}