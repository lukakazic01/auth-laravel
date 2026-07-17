<?php

namespace App\Models;

use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Hidden;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Collection;

#[Fillable(['name', 'email', 'password', 'role'])]
#[Hidden(['password', 'remember_token'])]
/**
 * @property string $name
 * @property string $email
 * @property string $role
 */
class User extends Authenticatable
{
    /** @use HasFactory<UserFactory> */
    use HasFactory, Notifiable;

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function cityFavorites(): BelongsToMany {
        return $this->belongsToMany(CityModel::class, 'user_cities', 'user_id', 'city_id');
    }

    /**
     * @param  Collection<int, CityModel>|null  $cities
     * @return Collection<int, CityModel>
     */
    public function withCityFavorites(?Collection $cities = null): Collection
    {
        $cities ??= $this->cityFavorites;
        $favoriteIds = $this->cityFavorites->pluck('id');

        return $cities->map(function ($city) use ($favoriteIds) {
            $city->is_favorite = $favoriteIds->contains($city->id);
            return $city;
        });
    }
}
