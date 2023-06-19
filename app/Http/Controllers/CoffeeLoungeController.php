<?php

namespace App\Http\Controllers;

use App\Models\CoffeeLounge;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class CoffeeLoungeController extends Controller
{
    public function index(): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        $coffeeLounges = CoffeeLounge::get();

        return view('coffeelounge')->with('coffeeLounges', $coffeeLounges);
    }

    public function store(Request $request) : RedirectResponse
    {
        $data = $request->validate([
            'coffee_lounge_name' => 'required|string|max:255',
            'capacity' => 'required|min:1'
        ]);

        CoffeeLounge::create($data);

        return redirect()->route('coffee.lounges.index');
    }

    public function show($id): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        $coffeeLounge = CoffeeLounge::with('participations.person')->findOrFail($id);
        $participants = $coffeeLounge->participations
        ->groupBy('stage')->sortBy('stage');

        return view('coffeeloungeparticipants')->with([
            'coffeeLounge' => $coffeeLounge,
            'participants' => $participants
        ]);
    }
}
