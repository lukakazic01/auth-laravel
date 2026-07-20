<?php

namespace App\Models;

use Carbon\Carbon;
use Database\Factories\CityFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Table;
use Illuminate\Database\Eloquent\Attributes\UseFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

#[UseFactory(CityFactory::class)]
#[Table('cities')]
#[Fillable(['name'])]
/**
 * @property integer $id
 * @property string $name
 * @property Carbon $created_at
 * @property WeatherModel $weather
 * @property ForecastModel[] $forecasts
 * @property ForecastModel $todaysForecast
 */
class CityModel extends Model
{
    use HasFactory;

    public function weather(): HasOne
    {
        return $this->hasOne(WeatherModel::class, 'city_id', 'id');
    }

    public function forecasts(): HasMany
    {
        return $this->hasMany(ForecastModel::class, 'city_id', 'id')->orderBy('date');
    }

    public function userFavorites(): BelongsToMany {
        return $this->belongsToMany(User::class, 'user_cities', 'city_id', 'user_id');
    }

    public function todaysForecast(): HasOne {
        return $this
            ->hasOne(ForecastModel::class, "city_id", "id")
            ->whereDate('date', now('Europe/Belgrade'));
    }
}
