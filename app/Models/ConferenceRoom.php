<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ConferenceRoom extends Model
{
    use HasFactory;

    protected $fillable = [
        'room_name',
        'capacity',
    ];

    public function participations(): HasMany
    {
        return $this->hasMany(Participation::class);
    }

}
