<?php

namespace App\Models;

use Carbon\Carbon;
use Database\Factories\WeatherFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Table;
use Illuminate\Database\Eloquent\Attributes\UseFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

#[Fillable(['city_id', 'temperature', 'humidity', 'condition', 'chance_to_rain', 'wind_speed'])]
#[Table('weather')]
#[UseFactory(WeatherFactory::class)]
/**
 * @property CityModel $city
 * @property string $city_id
 * @property float $temperature
 * @property string $condition
 * @property integer $humidity
 * @property integer $chance_to_rain
 * @property integer $wind_speed
 * @property Carbon $created_at
 */
class WeatherModel extends Model
{
    use HasFactory;

    public function city(): BelongsTo
    {
        return $this->belongsTo(CityModel::class, "city_id", "id");
    }
}
