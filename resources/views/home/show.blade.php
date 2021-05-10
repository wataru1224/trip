@include('home.header')

<main>
    <article>
    <div class="plan">
        <div class="main-plan">
            <h2>{{ $trip['title'] }}</h2>
            <p>{{ $itineraries[0]['date'] }}</p>
            <div class="plan-date">
                <p>作成日時:{{ $trip['created_at'] }}</p>
                <p>更新日時:{{ $trip['updated_at'] }}</p>
            </div>
        </div>
        <img src="{{asset('/')}}{{$trip->image}}" ale="画像" />

        <div class="sub-plan">
            <h2 class="plan-title">プラン</h2>
            <br>
            @foreach ($itineraries as $itinerary)
            <p class="plan-date">{{ $itinerary['date'] }}</p>
            <div class="contents-wrapper">  
                <div class="plan-wrapper">
                    <p>＊時間のみ表示（8:00）</p>
                    <p>*日付を表示 （2021/4/28）</p>
                </div>
                <div class="content-wrapper">
                    <p class="wrapper-text">{{ $itinerary['destination'] }}</p>
                    <p>{{ $itinerary['contents'] }}</p>
                    <img src="{{asset('/')}}{{$itinerary->image}}" ale="画像" />    
                </div>
            </div>
            @endforeach
        </div>
    </div>
    </article>
</main>
@include('home.footer')