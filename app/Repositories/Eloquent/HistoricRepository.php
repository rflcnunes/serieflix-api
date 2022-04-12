<?php

namespace App\Repositories\Eloquent;

use App\Models\Historic;
use App\Repositories\Contracts\HistoricRepositoryInterface;

class HistoricRepository extends BaseRepository implements HistoricRepositoryInterface
{
    public function __construct()
    {
        $this->model = app(Historic::class);
    }
}
