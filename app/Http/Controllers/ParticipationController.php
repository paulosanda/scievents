<?php

namespace App\Http\Controllers;

use App\Actions\AvaliableLounges;
use App\Actions\AvaliableRooms;
use App\Actions\CreatePerson;
use App\Models\Participation;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Models\Person;

class ParticipationController extends Controller
{
    public function create(): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        $conferenceRooms = app(AvaliableRooms::class)->execute();
        $coffeeLounges = app(AvaliableLounges::class)->execute();

        return view('participations-create')->with([
            'conferenceRooms' => $conferenceRooms,
            'coffeeLounges' => $coffeeLounges
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'stage.*.conference_room_id' => 'required|numeric',
            'stage.*.coffee_lounge_id' => 'required|numeric',
            'stage.*.stage' => 'required|numeric',
        ]);

        $person = app(CreatePerson::class)->execute($data);

        $person->load('conferenceRooms', 'coffeeLounges');

        return redirect()->back()->with([
            'success_message' => 'Cadastro realizado com sucesso!',
            'person' => $person
        ]);
    }
}
