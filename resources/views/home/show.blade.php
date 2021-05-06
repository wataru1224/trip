@include('home.header')

<main>
    <article>
    <div class="plan">
        <div class="main-plan">
            <h2>{{ $trip['title'] }}</h2>
            <p>{{ $itinerary['date'] }}~</p>
            <img src="{{$trip->image}}" ale="画像" />
            <div class="plan-date">
                <p>作成日時:{{ $itinerary['created_at'] }}</p>
                <p>更新日時:{{ $itinerary['updated_at'] }}</p>
            </div>
        </div>

        <div class="sub-plan">
            <h2 class="plan-title">プラン</h2>
            <br>
            <p class="plan-date">{{ $itinerary['date'] }}</p>
            <div class="contents-wrapper">  
                <div class="plan-wrapper">
                    <p>＊時間のみ表示（8:00）</p>
                    <p>*日付を表示 （2021/4/28）</p>
                </div>
                <div class="content-wrapper">
                    <p class="wrapper-text">{{ $itinerary['destination'] }}</p>
                    <p>{{ $itinerary['contents'] }}</p>
                </div>
            </div>
        </div>
    </div>
    </article>
</main>
@include('home.footer')