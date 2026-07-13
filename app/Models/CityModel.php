<?php

namespace App\Models;

use Carbon\Carbon;
use Database\Factories\CityFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Table;
use Illuminate\Database\Eloquent\Attributes\UseFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

#[UseFactory(CityFactory::class)]
#[Table('cities')]
#[Fillable(['name'])]
/**
 * @property integer $id
 * @property string $name
 * @property Carbon $created_at
 * @property WeatherModel $weather
 * @property ForecastModel $forecasts
 */
class CityModel extends Model
{
    use HasFactory;

    public function weather(): HasMany
    {
        return $this->hasMany(WeatherModel::class, 'city_id', 'id');
    }

    public function forecasts(): HasMany
    {
        return $this->hasMany(ForecastModel::class, 'city_id', 'id');
    }
}
