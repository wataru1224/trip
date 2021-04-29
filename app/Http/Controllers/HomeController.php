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
        //itineraryのtitle,dateなどのカラムをitinerariesに代入
        return view('home.home', compact("itineraries"));
        //viewのhomeでitinerariesを使えるようにcompactでviewに渡す
    }
    
    public function create(Request $request)
    {
        // Itineraryは配列で受け取られる
        $itineraries = $request->input("itinerary");
        $images = $request->file("itinerary");
        var_dump($itineraries);
        var_dump($images);

        foreach ($itineraries as $itinerary) {
            var_dump($itinerary);
            \App\Models\Itinerary::create([
            "date" => $itinerary["date"],     // 受け取った情報を保存する
            "destination" => $itinerary["destination"],
            "contents" => $itinerary["contents"],
            "image" => $itinerary["image"],
        ]);
        }
        // trip内容
        // formのnameで指定した情報を受け取る
        $title = $request->input("title");
        $image = $request->file("image");
        var_dump($image);

        \App\Models\Trip::create([// 受け取った情報を保存する
        "title" => $title,//titleカラムに$titleを入れる
        "image" => "https://tabisio.com/assets/img/bg/Mockup6.jpg",
        "user_id" => 1,
        "is_public" => false,
         ]);
        return redirect("/hello");//  /helloにデータを移動させる
    }

    public function trip()
    {
        $trips = \App\Models\Trip::all();
        return view('home.home', compact("trips"));
    }


    // show メソッドで変数\$id を引数で受け取る
    public function show($id)
    {
        $itinerary = \App\Models\Itinerary::find($id);
        return view('home.show', compact("itinerary"));
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

    // マイページ
    public function self()
    {
        return view('home.self');
    }
}
