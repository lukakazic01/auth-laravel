<?php

namespace App\Models;

use Database\Factories\ForecastFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Table;
use Illuminate\Database\Eloquent\Attributes\UseFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

#[UseFactory(ForecastFactory::class)]
#[Table('forecasts')]
#[Fillable(['temperature', 'date'])]
class ForecastModel extends Model
{
    /** @use HasFactory<ForecastFactory> */
    use HasFactory;
}
