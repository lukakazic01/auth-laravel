<?php

namespace App\Models;

use Carbon\Carbon;
use Database\Factories\WeatherModelFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Table;
use Illuminate\Database\Eloquent\Attributes\UseFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

#[Fillable(['city', 'temperature', 'humidity', 'condition', 'chance_to_rain', 'wind_speed'])]
#[Table('weather')]
#[UseFactory(WeatherModelFactory::class)]
/**
 * @property string $city
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
}
