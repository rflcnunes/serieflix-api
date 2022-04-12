<?php

namespace App\Services;

use App\Repositories\Contracts\HistoricRepositoryInterface;
use Illuminate\Support\Facades\Log;

class HistoricService
{
    private $historicRepository;

    public function __construct(HistoricRepositoryInterface $historicRepository)
    {
        $this->historicRepository = $historicRepository;
    }

    public function all()
    {
        return $this->historicRepository->all();
    }

    public function store(array $data)
    {
        return $this->historicRepository->store($data);
    }

    public function show($id)
    {
        return $this->historicRepository->show($id);
    }

    public function update(array $data, $id)
    {
        return $this->historicRepository->update($data, $id);
    }

    public function destroy($id)
    {
        return $this->historicRepository->destroy($id);
    }
}
