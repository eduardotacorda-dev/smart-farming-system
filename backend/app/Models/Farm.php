<?php

namespace App\Models;

use Database\Factories\FarmFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Farm extends Model
{
    /** @use HasFactory<FarmFactory> */
    use HasFactory;

    protected $fillable = ['owner_id', 'name', 'location', 'status'];

    protected function casts(): array
    {
        return ['owner_id' => 'integer'];
    }

    public function owner(): BelongsTo
    {
        return $this->belongsTo(User::class, 'owner_id');
    }

    public function fields(): HasMany
    {
        return $this->hasMany(Field::class);
    }
}
