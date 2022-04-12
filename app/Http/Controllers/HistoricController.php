<?php

namespace App\Http\Controllers;

use App\Http\Resources\HistoricResource;
use App\Services\HistoricService;

class HistoricController extends Controller
{
    private $service;

    public function __construct(HistoricService $service)
    {
        $this->service = $service;
    }

    public function index()
    {
        try {
            $historics = $this->service->all();
            return HistoricResource::collection($historics);
        } catch (\Exception $e) {
            return response()->json([
                '(INDEX) Não foi possivel listar o histórico.'
            ]);
        }
    }
}
