<?php

namespace App\Actions;

use App\Models\CoffeeLounge;
use Illuminate\Database\Eloquent\Collection;

class AvaliableLounges extends AvaliableBase
{
    public function execute(): Collection
    {
        $coffeelounges = CoffeeLounge::all();
        $availableSeats = $this->calculateAvailableSeats($coffeelounges);

        foreach ($coffeelounges as $coffeeLounge) {
            $coffeeLounge->availableSeats = $availableSeats[$coffeeLounge->id];
        }

        return $coffeelounges;
    }
}



