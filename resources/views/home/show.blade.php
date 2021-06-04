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
            <img src="{{$trip->image}}" ale="メイン画像" />

            <div class="sub-plan">
                <h2>プラン</h2>
                <br>
                @foreach ($itineraries as $itinerary)
                <p class="border">{{ $itinerary['date'] }}</p>
                <div class="contents-wrapper">  
                    <div class="plan-wrapper">
                        <?php
                        $time = new DateTime($itinerary['time']);
                        ?>
                        <p>{{$time->format('H:i')}}</p>
                    </div>
                    <div class="content-wrapper">
                        <p class="wrapper-text">{{ $itinerary['destination'] }}</p>   
                        <p>{{ $itinerary['contents'] }}</p>
                        <img src="{{$itinerary->image}}" onerror="this.onerror = null; this.src='';" />    
                    </div>
                </div>
                @endforeach                    
            </div>
        </div>
        @if(Auth::id() === $trip->user_id)
        <a href="/travel/edit/{{ $trip->id}}" class="btn">このプランを編集する</a>
        @endif
    </article>

</main>

@include('home.footer')