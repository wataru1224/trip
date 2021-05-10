<?php

namespace App\Http\Controllers;

use App\Models\Itinerary;
use Illuminate\Http\Request;
use App\Models\Trip;
use Symfony\Component\VarDumper\VarDumper;

class HomeController extends Controller
{
    public function home()
    {
        $itineraries = \App\Models\Itinerary::all();
        $trips = \App\Models\Trip::all();
        //itineraryのtitle,dateなどのカラムをitinerariesに代入
        return view('home.home', compact("itineraries", "trips"));
        //viewのhomeでitinerariesを使えるようにcompactでviewに渡す
    }
    
    public function create(Request $request)
    {
        // formのnameで指定した情報を受け取る
        $title = $request->input("title");
        $image = $request->file("image")->store('public/image');
        $temp_path = str_replace('public/', 'storage/', $image);
        $trip = \App\Models\Trip::create([// 受け取った情報を保存する
        "title" => $title,//titleカラムに$titleを入れる
        "image" => $temp_path,
        "user_id" => 1,
        "is_public" => false,
         ]);

        // Itineraryは配列で受け取られる
        $itineraries = $request->input("itinerary");
        $images = $request->file("itinerary");

        foreach ($itineraries as $index => $itinerary) {
            $image = $request->file("itinerary[" . $index . "][image]")->store("public/image");
            $image_path = str_replace('public/', 'storage/', $image);
            \App\Models\Itinerary::create([
            "date" => $itinerary["date"],     // 受け取った情報を保存する
            "destination" => $itinerary["destination"],
            "contents" => $itinerary["contents"],
            "image" => $image_path,
            "trip_id" => $trip->id,
        ]);
        }
        return redirect("/hello");
    }

    public function trip()
    {
        $trips = \App\Models\Trip::all();
        return view('home.home', compact("trips"));
    }

    // show メソッドで変数\$id を引数で受け取る
    public function show($id)
    {
        $trip = \App\Models\Trip::find($id);
        $itineraries = \App\Models\Itinerary::where('trip_id', $trip->id)->get();
        return view('home.show', compact("itineraries", "trip"));
    }

    public function new()
    {
        return view('home.new');
    }

    public function edit($id)
    {
        $itinerary = \App\Models\Itinerary::find($id);
        return view('home.edit', compact("itinerary"));
    }

    // ログイン
    public function pass()
    {
        return view('home.pass');
    }

    //簡単ログイン


    // マイページ
    public function self()
    {
        return view('home.self');
    }
}
