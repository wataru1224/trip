<?php

namespace App\Http\Controllers;

use App\Models\Itinerary;
use Illuminate\Http\Request;
use App\Models\Trip;
use Symfony\Component\VarDumper\VarDumper;
use JD\Cloudder\Facades\Cloudder;

class TravelController extends Controller
{
    public function home()
    {
        $itineraries = \App\Models\Itinerary::all();
        $trips = \App\Models\Trip::all();
        //itineraryのtitle,dateなどのカラムをitinerariesに代入
        return view('home.home', compact("itineraries", "trips"));
        //viewのhomeでitinerariesを使えるようにcompactでviewに渡す
    }

    public function upload($image)
    {
        $image_name = $image->getRealPath();
        // Cloudinaryへアップロード
        Cloudder::upload($image_name, null);
        list($width, $height) = getimagesize($image_name);
        // 直前にアップロードした画像のユニークIDを取得します。
        $publicId = Cloudder::getPublicId();
        // URLを生成します
        $image_url = Cloudder::show($publicId, [
            'width'     => $width,
            'height'    => $height
        ]);
        return $image_url;
    }

    // formのnameで指定した情報Requestで受け取る
    public function create(Request $request)
    {
        $request->validate(
            [
            'title' => 'required',
            'itinerary.*.date' => 'required',
            'itinerary.*.destination' => 'required',
        ],
            [
            'title.required' => '・タイトルは必須です。',
            'itinerary.*.date.required' => '・タイトルは必須です。',
            'itinerary.*.destination.required' => '・日程は必須です',
        ]
        );
        
        $title = $request->input("title");//formで指定したtitleの値を取り出す
        $temp_path = null;

        //クラウディナリーへ画像を保存する
        if (!is_null($request->file("image"))) {
            $temp_path = $this->upload($request->file("image"));
            // $image = $request->file("image")->store('public/image');
            // $temp_path = str_replace('public/', 'storage/', $image);
        }

        $user = auth()->user();

        // 受け取った情報をDBに保存する
        $trip = \App\Models\Trip::create([
        "title" => $title,//titleカラムに$titleを入れる
        "image" => $temp_path,
        "user_id" => $user->id,
        "is_public" => false,
         ]);

        $itineraries = $request->input("itinerary");
        foreach ($itineraries as $index => $itinerary) {
            $image_path = null;
            if (!is_null($request->file("itinerary." . $index . ".image"))) {
                // $image = $request->file("itinerary." . $index . ".image")->store("public/image");
                // $image_path = str_replace('public/', 'storage/', $image);
                $image_path = $this->upload($request->file("itinerary." . $index . ".image"));
            }
            var_dump($itinerary);
            \App\Models\Itinerary::create([
                "date" => $itinerary["date"],
                "time" => $itinerary["time"],
                "destination" => !empty($itinerary["destination"]) ? $itinerary["destination"] : "",
                "contents" => $itinerary["contents"] ?? "",
                "image" => $image_path,
                "trip_id" => $trip->id,
            ]);
        }
        return redirect("/"); // 一覧にリダイレクトさせる
    }

    public function trip()
    {
        $trips = \App\Models\Trip::all();
        return view('home.home', compact("trips"));
    }

    // マイページ
    public function self()
    {
        $user = auth()->user();
        $trips = \App\Models\Trip::where('user_id', $user->id)->get();
        return view('home.self', compact("trips"));
    }

    //プラン削除
    public function delete($id)
    {
        $trip = \App\Models\Trip::find($id);
        $trip->delete();
        return redirect("/travel/self");
    }

    // show メソッドで変数\$id を引数で受け取る
    public function show($id)
    {
        $trip = \App\Models\Trip::find($id);
        $itineraries = $trip->itineraries;
        return view('home.show', compact("itineraries", "trip"));
    }

    public function edit($id)
    {
        $trip = \App\Models\Trip::find($id);
        $itineraries = $trip->itineraries;
        return view('home.edit', compact("trip", "itineraries"));
    }

    public function new()
    {
        return view('home.new');
    }


    // ログイン
    public function pass()
    {
        return view('home.pass');
    }

    //新規ログイン
    public function register()
    {
        return view('home.register');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|unique:posts',
        ]);
    }
}
