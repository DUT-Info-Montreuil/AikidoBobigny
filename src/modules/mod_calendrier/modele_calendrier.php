<?php

class ModeleCalendrier extends Connexion
{



	public function __construct()
	{
	}

	public function getEvents()
	{
		$events = array();
		$requete = self::$bdd->prepare("SELECT * FROM evenement");
		$requete->execute();
		while ($row = $requete->fetch(PDO::FETCH_ASSOC)) {
			$e = array();
			$e['id'] = $row['ID_evenement'];
			$e['title'] = $row['intitule'];
			$e['start'] = $row['debut_evenement'];
			$e['end'] = $row['fin_evenement'];
			$e['description'] = $row['evenement'];
			$e['url'] = null;
			$e['allDay'] = null;
			$e['className'] = null;
			array_push($events, $e);
		}
		return $events;
	}

	public function getTimeInfos()
	{
		$activeDay = date('d');
		$activeMonth = date('m');
		$activeYear = date('Y');
		$numDays = date('t', mktime(0, 0, 0, $activeMonth, $activeDay, $activeYear));
		$numDaysLastMonth = date('j', strtotime("last day of previous month", mktime(0, 0, 0, $activeMonth, $activeDay, $activeYear)));
		$days = [0 => 'Lun', 1 => 'Mar', 2 => 'Mer', 3 => 'Jeu', 4 => 'Ven', 5 => 'Sam', 6 => 'Dim'];
		$months = [1 => 'Janvier', 2 => 'Février', 3 => 'Mars', 4 => 'Avril', 5 => 'Mai', 6 => 'Juin', 7 => 'Juillet', 8 => 'Août', 9 => 'Septembre', 10 => 'Octobre', 11 => 'Novembre', 12 => 'Décembre'];
		$firstDayOfWeek = date('N', strtotime($activeYear . '-' . $activeMonth . '-1'))-1;

		$timeInfos = array();
		$timeInfos['activeDay'] = $activeDay;
		$timeInfos['activeMonth'] = $activeMonth;
		$timeInfos['activeYear'] = $activeYear;
		$timeInfos['numDays'] = $numDays;
		$timeInfos['numDaysLastMonth'] = $numDaysLastMonth;
		$timeInfos['firstDayOfWeek'] = $firstDayOfWeek;
		$timeInfos['days'] = $days;
		$timeInfos['months'] = $months;

		return $timeInfos;
	}

	public function addEvent($title, $start, $end, $description)
	{
		$requete = self::$bdd->prepare("INSERT INTO evenement (intitule, debut_evenement, fin_evenement, evenement) VALUES (:title, :start, :end, :description)");
		$requete->execute(array(
			'title' => $title,
			'start' => $start,
			'end' => $end,
			'description' => $description
		));
	}

	public function updateEvent($id, $title, $start, $end, $description)
	{
		$requete = self::$bdd->prepare("UPDATE evenement SET intitule = :title, debut_evenement = :start, fin_evenement = :end, evenement = :description WHERE ID_evenement = :id");
		$requete->execute(array(
			'title' => $title,
			'start' => $start,
			'end' => $end,
			'description' => $description,
			'id' => $id
		));
	}

	public function deleteEvent($id)
	{
		$requete = self::$bdd->prepare("DELETE FROM evenement WHERE ID_evenement = :id");
		$requete->execute(array(
			'id' => $id
		));
	}
}

?>