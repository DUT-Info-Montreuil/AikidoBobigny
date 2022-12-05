<?php
class VueCalendar
{

	private $calendar;

	public function __construct()
	{
	}

	public function afficherCalendar(array $timeInfos, array $events)
	{
		$this->calendar = '
			<div class="calendar">
				<div class="header">
					<div class="month-year">
						' . $timeInfos['months'][$timeInfos['activeMonth']] . ' ' . $timeInfos['activeYear'] . '
					</div>
				</div>
				<div class="days">';


		foreach ($timeInfos['days'] as $day) {
			$this->calendar .= '<div class="day_name">'.$day.'</div>';
		}

		for ($i = $timeInfos['firstDayOfWeek']; $i > 0; $i--) {
			$this->calendar .= '<div class="day_num ignore">'.($timeInfos['numDaysLastMonth'] - $i + 1).'</div>';
		}

		for ($i = 1; $i <= $timeInfos['numDays']; $i++) {
			$selected = '';
			if ($i == $timeInfos['activeDay']) {
				$selected = ' selected';
			}
			$this->calendar .= '<div class="day_num'.$selected.'"><span>'.$i.'</span>';
			foreach ($events as $event) {
				$debut = new DateTime($event['start']);
				$fin = new DateTime($event['end']);
				$duree = $debut->diff($fin)->format('%a');
				for ($d = 0; $d < $duree; $d++) {
					if (date('y-m-d', strtotime($timeInfos['activeYear'] . '-' . $timeInfos['activeMonth'] . '-' . $i . ' -' . $d . ' day')) == date('y-m-d', strtotime($event['start']))) {
						$this->calendar .= '<div class="event green">'.$event['description'].'</div>';
					}
				}
			}
			$this->calendar .= '</div>';
		}
		for ($i = 1; $i <= (42 - $timeInfos['numDays'] - max($timeInfos['firstDayOfWeek'], 0)); $i++) {
			$this->calendar .= '<div class="day_num ignore">'.$i.'</div>';
		}
		
		$this->calendar .= '</div></div>';
	}

	public function getContenu() {
		return $this->calendar;
	}

	
}
?>