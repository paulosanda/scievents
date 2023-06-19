<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ConferenceRoom extends Model
{
    use HasFactory;

    protected $fillable = [
        'room_name',
        'capacity',
    ];

    public function participations()
    {
        return $this->hasMany(Participation::class);
    }

}
