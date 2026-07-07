<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Table;
use Illuminate\Database\Eloquent\Model;

#[Fillable(['city', 'temperature', 'humidity', 'condition', 'chance_to_rain', 'wind_speed'])]
#[Table('weather')]
class WeatherModel extends Model
{

}
