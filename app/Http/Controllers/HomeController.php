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

    public function new($id)
    {
        return view('home.new', compact("id"));
    }

    public function create(Request $request)
    {
        $title = $request->input("title");
        $date = $request->input("date");
        $destination = $request->input("destination");
        $contents = $request->input("contents");
        $tripId = $request->input("trip-id");
        \App\Models\Itinerary::create([
            "title" => $title,
            "date" => $date,
            "destination" => $destination,
            "contents" => $contents,
            "trip-id" => $tripId
            ]);
        return redirect("/hello");
    }
}
