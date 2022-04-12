<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Historic extends Model
{
    use HasFactory;
    use SoftDeletes;

    public $timestamps = false;

    protected $fillable = [
        'historic_series_code',
        'historic_series_name',
        'historic_series_seasons',
        'historic_series_episodes',
        'historic_series_updated',
        'historic_series_updated_at'
    ];

    public function series()
    {
        return $this->hasMany(Series::class);
    }
}
