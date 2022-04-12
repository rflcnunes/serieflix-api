<?php

namespace App\Traits;

trait SeriesMailTrait
{
    public $series_code;
    public $series_name;
    public $series_seasons;
    public $series_episodes;

    public function getMailData($series_code, $series_name, $series_seasons, $series_episodes)
    {
        $this->series_code = $series_code;
        $this->series_name = $series_name;
        $this->series_seasons = $series_seasons;
        $this->series_episodes = $series_episodes;
    }
}
