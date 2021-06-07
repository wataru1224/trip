<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Instavel</title>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/vegas/2.4.4/vegas.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('/css/home.css')}}">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>

<body>
    <header class="nav-header">
        <nav> 
            <div class="drawer">
                <h1>Instavel</h1>
                <div class="Toggle">
                    <span></span>
                    <span></span>
                    <span></span>
                </div> 
            </div>
            <div class="menu">
                <ul>
                    <li><a href="/" class="log">ホーム</a></li>
                    <li><a href="/travel/new" class="log">プラン作成</a></li>
                    <li><a href="/travel/self" class="log">マイページ</a></li>                      
                    @guest
                    <li><a href="/travel/pass" class="log">ログイン</a></li>
                    @endguest
                    <li>
                         @auth
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <x-jet-dropdown-link class="log" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                    this.closest('form').submit();">                               
                                {{ __('ログアウト') }}
                            </x-jet-dropdown-link>
                        </form>     
                        @endauth     
                    </li>           
                </ul>             
            </div>
        </nav>        
    </header>

    <main>
        <article>
            <header id="slider" class="header-title">
                <h2>プランを作る <br>
                    プランを投稿する。</h2>
            </header>

            <section class="main-section">
                <div class="main-contents-wrapper">
                    <div class="main-content-wrapper">
                        <h2>旅行プランを作成して<br>
                        プランを投稿してみませんか？</h2>
                        <p class="space">旅行プランを作って保存・投稿できるサービス<span>「Instavel」</span></p>
                        <p>旅行プランを保存しておくだけでなく、プラン作成後に投稿することで旅行内容をシェアすることができます。</p>
                        <p>投稿された旅行内容を見れば、他の人のプランを参考にすることができるので、行きたい旅行プランが簡単にみつかります。</p>
                        <p></p>
                        <p></p>
                    </div>
                    <div class="sub-contents">
                        <img src="{{ asset('img/camera.jpg')}}" alt="">
                    </div>
                </div>
            </section>

            <section class="design-section">
                <h2><span>Instavel</span>の3つの特徴</h2>
                <div class="design-contents">
                    <div class="design-img">
                        <img src="{{ asset('img/future.jpg')}}" alt="">             
                    </div>
                    <div class="design-text-box">
                        <div class="design-title">
                            <p>01</p>
                            <h3>
                                行きたい旅行が見つかる
                            </h3>
                        </div>   
                        <div class="design-text">
                            <p>自分でプランを考えるのは手間だけど旅行するなら楽しみたい。</p>
                            <p>そんな人は投稿されているプランを参考にしてみてください。実際に旅行した感想が書いてあるから思ったのと違うなどの問題がありません。</p>
                        </div> 
                    </div>
                </div>

                <div class="design-contents reverse">
                    <div class="design-text-box ">
                        <div class="design-title">
                            <p>02</p>
                            <h3>
                                新しい発見がある
                            </h3>
                        </div>   
                        <div class="design-text">
                            <p>「こんな場所があるんだ。」</p>
                            <p>「このお店行ってみたい。」</p>
                            <p>実際に観光した人が写真を載せているので、調べても出てこない情報があるかも！</p>
                        </div> 
                    </div>
                    <div class="design-img">
                        <img src="{{ asset('img/goto.jpg')}}" alt="">             
                    </div>
                </div>

                <div class="design-contents">
                    <div class="design-img">
                        <img src="{{ asset('img/planner.jpg')}}" alt="">             
                    </div>
                    <div class="design-text-box">
                        <div class="design-title">
                            <p>03</p>
                            <h3>
                                簡単にプランが作れる
                            </h3>
                        </div>   
                        <div class="design-text">
                            <p>プラン作成・プラン投稿に関して難しい操作は必要ありません。</p>
                            <p>プラン参考 ⇒ プラン作成 ⇒ プラン投稿 これだけの機能に絞っているので難しいことはありません。</p>
                        </div> 
                    </div>
                </div>
            </section>

            <section class="sub-section">
                <h2>投稿プラン一覧</h2>
                <div class="task">                            
                    @foreach ($trips as $trip)
                    <div class="task-items">
                        <a href="/travel/{{ $trip->id}}" class="task-btn">
                            <img src="{{$trip->image}}" alt="旅行画像" />
                            <p> {{ $trip->title }}</p>
                        </a>
                    </div>                            
                    @endforeach
                </div>
                <br>
            </section>
        </article>
    </main>

    <footer>
        <div class="main-footer ">
            <a href="/travel">Instavel</a>
            <p>© 2021 wataru takao</p>
        </div>
    </footer>

    <script>
        //ハンバーガ
        $(function() {
            $('.Toggle').click(function() {
                $(this).toggleClass('active');
                $('.menu').toggleClass('open');
            });
        });

        //スクロール
        window.addEventListener("scroll", function () {
            // スクロールしたら
            var header = document.querySelector("header");
            //headerを取得する
            header.classList.toggle("scroll-nav", window.scrollY > 100);
        });
    </script>


<script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/vegas/2.4.4/vegas.min.js"></script>
</body>
</html>