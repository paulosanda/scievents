<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Participation extends Model
{
    use HasFactory;

    protected $fillable = [
        'people_id',
        'conference_room_id',
        'coffee_lounge_id',
        'stage'
    ];

    public function person() : BelongsTo
    {
        return $this->belongsTo(Person::class, 'people_id','id');
    }

    public function conferenceRoom() : BelongsTo
    {
        return $this->belongsTo(ConferenceRoom::class, 'conference_room_id', 'id');
    }

    public function coffeeLounge() : BelongsTo
    {
        return $this->belongsTo(CoffeeLounge::class);
    }

}
