<?php

class Modele_calendrier {

    private $months = ['Janvier','Février','Mars','Avril','Mai','Juin','Juillet','Août','Septembre','Octobre','Novembre','Decembre'];
    private $month;
    private $year;

    public function __construct(int $month ,int $year){
        if($month < 1 || $month > 12){
            throw new \exception("le mois $month n'est pas valide");
        }
        if($year < 2022){
            throw new \exception("L'année est inférieur à 2022");
        }
        $this->month = $month;
        $this->year = $year;

    }

    public function getStartingDay(): DateTime {
        return new DateTime("{$this->year}-{$this->month}-01");
    }




    public function toString(): string{
         return $this->months[$this->month-1] . ' ' . $this->year;

    }

    public function getWeeks(): int{
        $start = $this->getStartingDay();
        $end = (clone $start) -> modify('+1 month -1 day');
        $weeks = intval($end->format('W')) - intval($start->format('W')) + 1;
        if($weeks < 0){
            $weeks = intval($end->format('W'));
        }
        
        return $weeks;

    }
    /*
    <h2><?= $month->toString();?></h2>
    <?php $month->getWeeks();
    ?>
    */
}