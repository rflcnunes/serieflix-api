<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSeriesRequest;
use App\Http\Requests\UpdateSeriesRequest;
use App\Http\Resources\SeriesResource;
use App\Services\SeriesService;
use Illuminate\Support\Facades\Log;

class SeriesController extends Controller
{
    private $service;

    public function __construct(SeriesService $service)
    {
        $this->service = $service;
    }

    public function index()
    {
        try {
            Log::info('[SUCCESS] Listagem exibida através do método index na SeriesController.');

            $series = $this->service->all();
            return SeriesResource::collection($series);
        } catch (\Exception $e) {
            Log::error('[INDEX] Erro ao exibir a série.');
            return response()->json([
                '[INDEX] Não foi possivel exibir a lista de séries.'
            ]);
        }
    }

    public function store(StoreSeriesRequest $request)
    {
        try {
            Log::info('[SUCCESS] Item criado através do método store na SeriesController.');

            return $this->service->store([
                'series_code' => $request->series_code,
                'series_name' => $request->series_name,
                'series_seasons' => $request->series_seasons,
                'series_episodes' => $request->series_episodes
            ]);
        } catch (\Exception $e) {
            Log::error('[STORE] Erro ao criar uma série.');

            return response()->json([
                '[STORE] Não foi possivel criar a série: ' . $request->series_name
            ], 404);
        }
    }

    public function show($id)
    {
        try {
            Log::info('[SUCCESS] Item exibido com filtro por ID através do método show na SeriesController.');

            return $this->service->show($id);
        } catch (\Exception $e) {
            Log::error('[SHOW] Erro ao procurar a série solicitada.');

            return response()->json([
                '[SHOW] Não foi possivel encontrar a série solicitada.'
            ]);
        }
    }

    public function update(UpdateSeriesRequest $request, $id)
    {
        try {
            Log::info('[SUCCESS] Listagem atualizada através do método update na SeriesController.');

            return $this->service->update([
                'series_seasons' => $request->series_seasons,
                'series_episodes' => $request->series_episodes
            ], $id);
        } catch (\Exception $e) {
            Log::error('[UPDATE] Erro ao alterar uma série.');

            return response()->json([
                '[UPDATE] Não foi possivel alterar esta série.'
            ]);
        }
    }

    public function destroy($id)
    {
        try {
            Log::info('[SUCCESS] Item deletado através do método destroy na SeriesController.');

            return $this->service->destroy($id);
        } catch (\Exception $e) {
            Log::error('[DELETE] Erro ao deletar a série.');

            return response()->json([
                '[DELETE] Não foi possivel deletar esta série.'
            ]);
        }
    }
}
