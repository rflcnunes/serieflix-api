<?php

namespace App\Models;

use App\Observers\SeriesObserver;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Series extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'series_code',
        'series_name',
        'series_seasons',
        'series_episodes',
        'deleted_at'
    ];

    protected $dispatchesEvents = [
        'created' => SeriesObserver::class,
    ];

    public function historics()
    {
        return $this->hasMany(Historic::class);
    }
}
