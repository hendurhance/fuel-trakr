<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Generator extends Model
{
    use HasFactory, HasUuids;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'name',
        'capacity',
        'current_level',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'capacity' => 'decimal:2',
        'current_level' => 'decimal:2',
    ];

    /**
     * Get the user that owns the generator.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the fuel histories for the generator.
     */
    public function fuelHistories()
    {
        return $this->hasMany(FuelHistory::class);
    }
}
