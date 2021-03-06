<?php

namespace App\Repositories\Contracts;

interface SeriesRepositoryInterface
{
    public function all();

    public function store(array $data);

    public function show($id);

    public function update(array $data, $id);

    public function destroy($id);
}
