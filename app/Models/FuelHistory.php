<?php

namespace App\Models;

use App\Enums\FuelHistoryType;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FuelHistory extends Model
{
    use HasFactory, HasUuids;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'generator_id',
        'amount',
        'type',
        'history_at',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'amount' => 'decimal:2',
        'type' => FuelHistoryType::class,
        'history_at' => 'datetime',
    ];

    /**
     * Get the generator that owns the fuel history.
     */
    public function generator()
    {
        return $this->belongsTo(Generator::class);
    }
}
