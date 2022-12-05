<?php

class VueAikido extends VueGenerique
{

	public function __construct()
	{
		parent::__construct();
	}

	function afficherAikido()
	{
		$contenu = "
		<h1>L'Aïkido</h1>
		<div class='aikidoPres'>
		<h2>PRESENTATION DE L'AIKIDO</h2>
		<p>L’Aïkido est une discipline universelle qui peut être pratiquée à tout âge. Sur les tatamis, tous/toutes les pratiquant-e-s sont égaux/égales et portent la même tenue. Seule l’expérience accumulée au fil des années les distingue. Cette discipline repose sur le placement, le déplacement, l’engagement des hanches tout en souplesse et en disponibilité. L’Aïkido est une discipline martiale adaptée à tous les publics.

		L’Aïkido repose sur trois grandes valeurs :
		<ul>
			<li><p>L’harmonie. L’Aïkido est un art martial sans compétition qui permet de se construire dans la pratique avec l’autre ;</p></li>
			<li><p>Le rapprochement des participant-e-s. Uni-e-s dans la pratique, les aïkidokas sont tous/toutes à la même école : celle de la tolérance et de la solidarité ;</p></li>
			<li><p>Le respect. Plus qu’un art martial, l’Aïkido est un art de vivre. Il invite au respect de soi et des autres.</p></li>
		</ul>
		</p>
		</div>
		<div class='aikidoPres'>
		<h2>ORIGINE DE L' AÏKIDO</h2>
		<p>L'Aïkido a été fondé par Morihei Ueshiba. Né le 14 décembre 1883, il était de faible constitution, souvent malade et très nerveux. Dès son plus jeune âge, il fut fortement attiré par la religion. Ses parents l'encouragèrent à poursuivre des activités physiques, tels que le Sumo et la natation afin d'équilibrer cette tendance. A vingt ans, il se rend à Tokyo et passe ses soirées à étudier les anciennes techniques de Ju-Jitsu, en particulier celle de l'École Kito, sous la direction du Maître Tozawa. Parallèlement, il pratique le Ken-Jutsu (sabre) dans un dojo de Shinkage Ryu (Ecole Shinkage).</p>
		<p>Après être tombé malade, il décide de se forger un corps neuf et solide. Il s'astreint à un entraînement dur et progressif basé sur la condition physique et la force pure. Bien que de petite taille (1,54 m), il était beaucoup plus fort que la moyenne. Mais, la seule force physique ne le satisfaisant pas, il se rendit à Sakai, afin d'y étudier le sabre de l'Ecole Yagyu sous la conduite de Maître Nakaï.</p>
		<p>En 1903, Maître Ueshiba s'engage dans l'armée. Très vite, il devint le premier en tous genres d'exercices et plus particulièrement en Juken-Jutsu (combat à la baïonnette)</p>
		<p>En février 1915, au cours d'un voyage il rencontre le grand Maître de l'Ecole Daïto : Sokaku Takeda. Ce dernier décida de lui enseigner les techniques secrètes de Daitoryu. Dès son retour, il ouvre un dojo et invite le Maître Takeda. Il lui construit une maison et s'occupe totalement de lui.</p>
		<p>En novembre 1919, il rencontre un grand Maître mystique doué de rares pouvoirs spirituels : Wanisaburo Deguchi. Pour lui, cette rencontre fut capitale car il avait conscience que s'il maîtrisait la force et la technique, son énergie spirituelle restait fragile et chancelante à la moindre épreuve psychologique.</p>
		<p>Très peiné par la disparition de son père, survenue le 2 janvier 1920, Maître Ueshiba passa quelques mois à méditer puis il décida de s'installer à Ayabe, dans le temple de l'Omoto-Kyo, afin d'étudier sous la direction de Wanisaburo Deguchi. Ce dernier, pacifiste convaincu, quitte le Japon le 13 février 1924, avec quelques disciples dont Maître Morihei Ueshiba, avec l'intention de bâtir en Mongolie, où s'affrontaient les armées chinoises et japonaises, un Royaume de la Paix. Ils échouèrent dans leur tentative et furent prisonniers des armées chinoises pendant plusieurs mois.</p>
		<p>De retour au Japon, Maître Ueshiba reprit avec encore plus d'intensité qu'auparavant ses recherches sur le Budo et sa vie d'ascétisme.</p>
		<p>C'est à cette époque qu'il comprit que le vrai Budo n'est pas de vaincre un adversaire par la force mais de garder la paix en ce monde, d'accepter et de favoriser l'épanouissement de tous les êtres. Si la recherche spirituelle est présente dans tous les arts martiaux japonais, jamais personne ne l'avait approfondie jusqu'à englober en son sein l'amour de l'humanité.</p>
		<p>C'est de toutes ces rencontres et expériences techniques ou philosophiques que naîtra l'Aïkido en 1925.</p>
		<p>Dès 1926, le nom de Ueshiba commençait à être connu et d'éminents Budokas ainsi que d'importantes personnalités du monde politique ou militaire lui rendirent visite.</p>
		<p>Il s'installa en avril 1931 à Wakamatsu-cho, un quartier de Tokyo, dans un dojo nouvellement construit qui prit le nom de Kobukan.</p>
		<p>Pendant les années de guerre, Maître Ueshiba se retira à Iwama, à 120 kilomètres de Tokyo, où se trouve actuellement le sanctuaire de l'Aïkido (Aïki Jinja).</p>
		<p>En 1946, les Américains ayant interdit la pratique de tous les arts martiaux au Japon, le dojo de Tokyo fut fermé jusqu'en 1948, date à laquelle il prit le nom d'Aïkikaï.</p>
		<p>L'Aïkido fut le premier art martial qui reçut l'autorisation de reprendre la pratique en raison de sa tendance pacifiste.</p>
		<p>Dès lors, le nombre des élèves ne fit qu'augmenter, et c'est à cette époque que naquit vraiment la forme moderne de l'Aïkido.</p>
		<p>Dans les années 50 et 60, Maître Ueshiba laissera de plus en plus le soin de l'enseignement à ses meilleurs disciples qui créérent de nombreux dojos de par le Japon ou émigrèrent à l'étranger, ainsi qu'à son fils, Kisshomaru Ueshiba qui, en 1967, devient Directeur Général de la Fondation Aïkikaï.</p>
		<p>Lorsque le vénérable Maître s'éteignit le 26 avril 1969, l'Aïkido s'était répandu à travers le monde et était pratiqué par des centaines de milliers de personnes sur les cinq continents.</p>
		</p></div>
		<div class='aikidoPres'>
		<p>Source : <a href='http://www.aikido.fr/histoire.htm' target='_blank'>site de la FFAAA</a></p>
		</div>
		";
		echo $contenu;
	}
}
