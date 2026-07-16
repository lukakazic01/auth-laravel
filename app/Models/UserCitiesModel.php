<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Table;
use Illuminate\Database\Eloquent\Model;

#[Table('user_cities')]
#[Fillable(['user_id', 'city_id'])]
class UserCitiesModel extends Model
{
    //
}
