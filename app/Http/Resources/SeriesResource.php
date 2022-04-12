<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class SeriesResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'series_code' => $this->series_code,
            'series_name' => $this->series_name,
            'series_seasons' => $this->series_seasons,
            'series_episodes' => $this->series_episodes
        ];
    }
}
