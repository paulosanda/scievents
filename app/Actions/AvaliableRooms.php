<?php

namespace App\Actions;

use App\Models\ConferenceRoom;
use Illuminate\Database\Eloquent\Collection;

class AvaliableRooms extends AvaliableBase
{
    public function execute() : Collection
    {
        $conferenceRooms = ConferenceRoom::all();
        $availableSeats = $this->calculateAvailableSeats($conferenceRooms);

        foreach ($conferenceRooms as $conferenceRoom) {
            $conferenceRoom->availableSeats = $availableSeats[$conferenceRoom->id];
        }

        return $conferenceRooms;
    }
}
