@include('home.header')
<main>
    <article>
        <h2>保存中の旅行プラン</h2>
        <div class="task-items ">
            @foreach ($trips as $trip)
            <div class="task">
                <div class="task-text">
                    <a href="/travel/{{$trip->id}}" class="btn-text">
                        <img src="{{asset('/')}}{{$trip->image}}" ale="画像" />
                        <p>プラン名: {{ $trip->title }}</p>
                        <a href="/travel/{{$trip->id}}" class="btn">プラン詳細</a>
                        <a href="/travel/delete/{{$trip->id}}" class="btn">プラン削除</a>
                    </a>
                </div>
            </div>
            <br>
            @endforeach
        </div>
    </article>
</main>
@include('home.footer')