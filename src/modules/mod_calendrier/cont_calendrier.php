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
			echo $this->modele->__toString();
		}

		function fetchEvents() {
			
		}

		function eventHandler() {
			
		}

		function exec() {
			switch ($this->action) {
				case 'calendar':
					$this->calendar();
					break;
				case 'fetchEvents':
					$this->fetchEvents();
					break;
				case 'eventHandler':
					$this->eventHandler();
					break;
				default:
					$this->calendar();
					break;
			}
		}
		
	}

?>