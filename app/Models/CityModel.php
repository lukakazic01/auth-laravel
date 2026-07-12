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
use Illuminate\Database\Eloquent\Relations\HasOne;

#[UseFactory(CityFactory::class)]
#[Table('cities')]
#[Fillable(['name'])]
/**
 * @property string $id
 * @property string $name
 * @property Carbon $created_at
 * @property WeatherModel $weather
 * @property ForecastModel $forecasts
 */
class CityModel extends Model
{
    use HasFactory;

    public function weather(): HasOne {
        return $this->hasOne(WeatherModel::class, 'city_id');
    }

    public function forecasts(): HasMany {
        return $this->hasMany(ForecastModel::class, 'city_id');
    }
}
