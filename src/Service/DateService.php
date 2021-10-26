<?php

namespace App\Service;

class DateService
{
    private $date;

    public function __construct()
    {
        $this->date = new \DateTime();
    }

    public function getCurrentDay(): string
    {
        return $this->date->format('D-d-F-Y');
    }

    public function daySinceNewYearDay(): string
    {
        $origin = new \DateTime('first day of january');
        $target = $this->date;
        $interval = $origin->diff($target);

        return $interval->format('%R%a days');
    }
}
