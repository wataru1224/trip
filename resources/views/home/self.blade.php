@include('home.header')
<main>
    <article>
        <h2>保存中の旅行プラン</h2>
        <div class="task-items ">
            @foreach ($trips as $trip)
            <div class="task">
                <div class="task-text">
                    <a href="/hello/{{ $trip->id}}" class="btn-text">
                        <img src="{{asset('/')}}{{$trip->image}}" ale="画像" />
                        <p>プラン名: {{ $trip->title }}</p>
                    </a>
                </div>
            </div>
            <br>
            @endforeach
        </div>
    </article>
</main>
@include('home.footer')