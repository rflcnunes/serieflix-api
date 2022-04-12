<?php

namespace App\Repositories\Eloquent;

use App\Models\Series;
use App\Repositories\Contracts\SeriesRepositoryInterface;

class SeriesRepository extends BaseRepository implements SeriesRepositoryInterface
{
    public function __construct()
    {
        $this->model = app(Series::class);
    }
}
