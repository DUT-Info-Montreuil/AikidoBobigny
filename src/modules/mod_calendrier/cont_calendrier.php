<?php

	include_once 'vue_calendrier.php';
	include_once 'modele_calendrier.php';

	class ContCalendrier {

		private $modele, $vue;

		public function __construct(ModeleCalendrier $modele, VueCalendrier $vue) {
			$this->modele = $modele;
			$this->vue = $vue;
			$this->action = isset($_GET['action'])?$_GET['action']:'calendar';
		}

		function calendar() {
			$events = $this->modele->getEvents();
			$timeInfos = $this->modele->getTimeInfos();
			$this->vue->afficherCalendrier($timeInfos, $events);
		}

		function exec() {
			switch ($this->action) {
				case 'calendar':
					$this->calendar();
					break;
				default:
					$this->calendar();
					break;
			}
		}
		
	}

?>