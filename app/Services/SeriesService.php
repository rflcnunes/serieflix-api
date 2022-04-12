<?php

namespace App\Services;

use App\Traits\AddingSeriesIncrementsTrait;
use App\Repositories\Contracts\SeriesRepositoryInterface;

class SeriesService
{
    private $seriesRepository;
    use AddingSeriesIncrementsTrait;

    public function __construct(SeriesRepositoryInterface $seriesRepository)
    {
        $this->seriesRepository = $seriesRepository;
    }

    public function all()
    {
        return $this->seriesRepository->all();
    }

    public function store(array $data)
    {
        return $this->seriesRepository->store($data);
    }

    public function show($id)
    {
        return $this->seriesRepository->show($id);
    }

    public function update(array $data, $id)
    {
        return $this->seriesRepository->update($data, $id);
    }

    public function destroy($id)
    {
        return $this->seriesRepository->destroy($id);
    }
}
