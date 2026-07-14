<?php

namespace App\Models;

use Carbon\Carbon;
use Database\Factories\ForecastFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Table;
use Illuminate\Database\Eloquent\Attributes\UseFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

#[UseFactory(ForecastFactory::class)]
#[Table('forecasts')]
#[Fillable(['temperature', 'date', 'weather_type', 'probability', 'city_id'])]
/**
 * @property integer $id
 * @property float temperature
 * @property Carbon date
 * @property string weather_type
 * @property integer probability
 */
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

    /**
     * @return BelongsTo<CityModel, ForecastModel>
     */
    public function city(): BelongsTo
    {
        return $this->belongsTo(CityModel::class, "city_id", "id");
    }
}
