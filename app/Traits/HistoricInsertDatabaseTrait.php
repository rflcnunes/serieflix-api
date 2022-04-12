<?php

namespace App\Traits;

use App\Models\Historic;

trait HistoricInsertDatabaseTrait
{

    public function insertDatabaseNewObject($series)
    {
        $historic = new Historic();
        $historic->historic_series_code = $series->series_code;
        $historic->historic_series_name = $series->series_name;
        $historic->historic_series_seasons = $series->series_seasons;
        $historic->historic_series_episodes = $series->series_episodes;
        $historic->historic_series_updated = 'Create';
        $historic->historic_series_updated_at = $series->created_at;
        $historic->save();
    }

    public function insertDatabaseUpdatedObject($series)
    {
        $historic = new Historic();
        $historic->historic_series_code = $series->series_code;
        $historic->historic_series_name = $series->series_name;
        $historic->historic_series_seasons = $series->series_seasons;
        $historic->historic_series_episodes = $series->series_episodes;
        $historic->historic_series_updated = 'Updated';
        $historic->historic_series_updated_at = $series->updated_at;
        $historic->save();
    }

    public function insertDatabaseDeleteObject($series)
    {
        $historic = new Historic();
        $historic->historic_series_code = $series->series_code;
        $historic->historic_series_name = $series->series_name;
        $historic->historic_series_seasons = $series->series_seasons;
        $historic->historic_series_episodes = $series->series_episodes;
        $historic->historic_series_updated = 'Delete';
        $historic->historic_series_updated_at = $series->deleted_at;
        $historic->save();
    }
}
