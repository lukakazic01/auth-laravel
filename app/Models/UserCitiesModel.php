<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Table;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

#[Table('user_cities')]
#[Fillable(['user_id', 'city_id'])]
class UserCitiesModel extends Model
{

    public function city(): BelongsTo {
        return $this->belongsTo(CityModel::class, 'city_id', 'id');
    }

    public function user(): BelongsTo {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
