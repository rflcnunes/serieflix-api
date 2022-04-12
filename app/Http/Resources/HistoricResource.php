<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class HistoricResource extends JsonResource
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
            'historic_series_code' => $this->historic_series_code,
            'historic_series_name' => $this->historic_series_name,
            'historic_series_seasons' => $this->historic_series_seasons,
            'historic_series_episodes' => $this->historic_series_episodes,
            'historic_series_updated' => $this->historic_series_updated,
            'historic_series_updated_at' => $this->historic_series_updated_at
        ];
    }
}
