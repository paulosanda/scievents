<?php

namespace App\Actions;

use App\Models\Participation;
use Illuminate\Support\Collection;

class AvaliableBase
{
    public function calculateAvailableSeats(Collection $models): array
    {
        $availableSeats = [];

        foreach ($models as $model) {
            $totalCapacity = $model->capacity;

            $occupiedSeats = Participation::where($model->getForeignKey(), $model->id)
                ->select('stage')
                ->selectRaw('COUNT(*) as total')
                ->groupBy('stage')
                ->get();

            $occupiedSeatsByStage = $occupiedSeats->pluck('total', 'stage')->toArray();

            // Preencher com 0 as etapas que não possuem participações
            for ($i = 1; $i <= 2; $i++) {
                if (!isset($occupiedSeatsByStage[$i])) {
                    $occupiedSeatsByStage[$i] = 0;
                }
            }

            $availableSeats[$model->id] = $this->calculateAvailableSeatsByStage($totalCapacity, $occupiedSeatsByStage);
        }

        return $availableSeats;
    }

    private function calculateAvailableSeatsByStage($totalCapacity, $occupiedSeatsByStage): array
    {
            $availableSeats = [];

            for ($i = 1; $i <= 2; $i++) {
                $occupiedSeats = $occupiedSeatsByStage[$i] ?? 0;
                $availableSeats[$i] = $totalCapacity - $occupiedSeats;
            }

            return $availableSeats;
        }


}

