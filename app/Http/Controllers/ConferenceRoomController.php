<?php

namespace App\Http\Controllers;

use App\Models\ConferenceRoom;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ConferenceRoomController extends Controller
{
    public function index(): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        $conferenceRooms = ConferenceRoom::with('participations')->get();

        return view('conferenceroom')->with('conferenceRooms',$conferenceRooms);
    }

    public function store(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'room_name' => 'required|string|max:255',
            'capacity' => 'required|min:1',
        ]);

        ConferenceRoom::create($data);

        return redirect()->route('conference.room.index');

    }

    public function show($id): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        $conferenceRoom = ConferenceRoom::with('participations.person')->findOrFail($id);
        $participants = $conferenceRoom->participations
        ->groupBy('stage')->sortBy('stage');

        return view('conferenceroomparticipants')->with([
            'conferenceRoom' => $conferenceRoom,
            'participants' => $participants
        ]);
    }
}
