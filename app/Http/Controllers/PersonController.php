<?php

namespace App\Http\Controllers;

use App\Models\Participation;
use App\Models\Person;
use Illuminate\Http\Request;

class PersonController extends Controller
{

    public function index(): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
         $persons = Person::with(['participation.conferenceRoom', 'participation.coffeeLounge'])
            ->orderBy('first_name')
            ->get();
        // dd($persons[0]);
         return view('participations')->with('persons', $persons);
    }
}
