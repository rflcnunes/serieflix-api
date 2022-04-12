<?php

namespace App\Traits;

trait AddingSeriesIncrementsTrait
{
    public $series_seasons;

    public function insertDatabaseMoreSeasons($series)
    {
//        DB::table('series')->increment('series_seasons', $serie_seasons);
        $this->series = new $series;
        $this->series_seasons = $series->sum($this->series_seasons);

    }
}
