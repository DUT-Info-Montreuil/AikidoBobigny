<?php

class ModeleCalendar extends Connexion
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
			$e['id'] = htmlspecialchars($row['ID_evenement']);
			$e['title'] = htmlspecialchars($row['intitule']);
			$e['start'] = htmlspecialchars($row['debut_evenement']);
			$e['end'] = htmlspecialchars($row['fin_evenement']);
			$e['description'] = htmlspecialchars($row['evenement']);
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
		$activeMonth = (int)date('m');
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

}

?>