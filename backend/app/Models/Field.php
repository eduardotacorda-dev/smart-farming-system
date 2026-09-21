<?php

namespace App\Models;

use Database\Factories\FieldFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Field extends Model
{
    /** @use HasFactory<FieldFactory> */
    use HasFactory;

    protected $fillable = ['farm_id', 'name', 'area_hectares'];

    protected function casts(): array
    {
        return ['area_hectares' => 'decimal:2'];
    }

    public function farm(): BelongsTo
    {
        return $this->belongsTo(Farm::class);
    }

    public function zones(): HasMany
    {
        return $this->hasMany(Zone::class);
    }
}
