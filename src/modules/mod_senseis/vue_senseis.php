<?php

class VueSenseis extends VueGenerique
{

	public function __construct()
	{
		parent::__construct();
	}

	function afficherSenseis()
	{
		$contenu = '
		<h1>Les Senseis</h1>
		<div class=\'senseisPres\'>
			<table class="rwd-table">
				<tbody>
					<tr>
						<th>Nom</strong></th>
						<th>Créneau</strong></th>
						<th>Dojo</strong></th>
					</tr>
					<tr>
						<td>Abdelwab AMROUCHE</td>
						<td>Vendredi</td>
						<td>J.P Thimbaud</td>
					</tr>
					<tr>
						<td>José LARONCELLE</td>
						<td>Lundi</td>
						<td>P. Eluard</td>
					</tr>
					<tr>
						<td>Nasser DJAHNIT</td>
						<td>Mercredi</td>
						<td>A.Delaune</td>
					</tr>
				</tbody>
			</table>
			<table>
				<tbody>
					<tr>
						<td><img src="http://aikido-bobigny.com/wp-content/uploads/2021/11/20210630_202223-1024x768.jpg" alt="" style="width: 199px;"></td>
						<td><img src="http://aikido-bobigny.com/wp-content/uploads/2021/11/20210623_201906-796x1024.jpg" alt="" style="width: 133px;"><br>Aï : Harmonie (union)<br>Ki : Énergie (vitale)<br>Do : Voie (perspectives)</td>
						<td><img src="http://aikido-bobigny.com/wp-content/uploads/2021/11/aikido1.png" alt="" style="width: 150px;"></td>
					</tr>
				</tbody>
			</table>
		</div>
		';
		echo $contenu;
	}
}
