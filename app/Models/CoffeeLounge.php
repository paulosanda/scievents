<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CoffeeLounge extends Model
{
    use HasFactory;

    protected $fillable = [
        'coffee_lounge_name',
        'capacity'
    ];

    public function participations()
    {
        return $this->hasMany(Participation::class);
    }
}
