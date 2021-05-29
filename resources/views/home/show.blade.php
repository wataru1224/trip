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
                <h2>プラン</h2>
                <br>
                @foreach ($itineraries as $itinerary)
                <?php
                var_dump($itinerary);
                ?>
                <p class="border">{{ $itinerary['date'] }}</p>
                <div class="contents-wrapper">  
                    <div class="plan-wrapper">
                        <p>{{ $itinerary['time'] }}</p>
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
        @if(Auth::id() === $trip->user_id)
        <a href="/travel/edit/{{ $trip->id}}" class="btn">このプランを編集する</a>
        @endif
    </article>
</main>
@include('home.footer')