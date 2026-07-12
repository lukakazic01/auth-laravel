<?php

namespace App\Models;

use Database\Factories\ForecastFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Table;
use Illuminate\Database\Eloquent\Attributes\UseFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

#[UseFactory(ForecastFactory::class)]
#[Table('forecasts')]
#[Fillable(['temperature', 'date'])]
class ForecastModel extends Model
{
    /** @use HasFactory<ForecastFactory> */
    use HasFactory;

    public function casts(): array
    {
        return [
            'date' => 'date'
        ];
    }

    public function city (): BelongsTo {
        return $this->belongsTo(CityModel::class);
    }
}
