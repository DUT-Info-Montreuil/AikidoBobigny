<?php

include_once 'vue_calendar.php';
include_once 'modele_calendar.php';

class ContCalendar
{

	private $modele, $vue;

	public function __construct()
	{
		$this->modele = new ModeleCalendar();
		$this->vue = new VueCalendar();
	}

	function exec()
	{
		$events = $this->modele->getEvents();
		$timeInfos = $this->modele->getTimeInfos();
		$this->vue->afficherCalendar($timeInfos, $events);
		return $this->vue->getContenu();
	}
}

?>