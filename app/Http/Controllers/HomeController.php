<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home()
    {
        $itineraries = \App\Models\Itinerary::all();
        return view('home.home', compact("itineraries"));
    }

    public function show($id)
    {
        $itinerary = \App\Models\Itinerary::find($id);
        return view('home.show', compact("itinerary"));
    }

    public function new()
    {
        return view('home.new');
    }

    public function create(Request $request)
    {
        $title = $request->input("title");
        \App\Models\Itinerary::create(["title" => $title]);
        return redirect("/hello");
    }
}
