<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class Person extends Model
{
    use HasFactory;

    protected $table = 'people';
    protected $fillable = [
        'first_name',
        'last_name'
    ];

    public function conferenceRooms(): HasMany
    {
        return $this->hasMany(Participation::class, 'people_id')->with('conferenceRoom');
    }

    public function coffeeLounges(): HasMany
    {
        return $this->hasMany(Participation::class, 'people_id')->with('coffeeLounge');
    }

    public function participation(): HasMany
    {
        return $this->hasMany(Participation::class, 'people_id', 'id');

    }

}
