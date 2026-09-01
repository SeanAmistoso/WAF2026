<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Hike extends Model
{
    use HasFactory;

    protected $fillable = [
        'location_id',
        'name',
        'difficulty',
        'distance',
        'duration',
        'description',
    ];

    public function location(): BelongsTo
    {
        return $this->belongsTo(Location::class);
    }
}