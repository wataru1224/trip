<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/home.scss">
    <!-- <link rel="stylesheet" href="./css/sanitize.css"> -->
    <!-- <link rel="stylesheet" href="./css/responsibe.css"> -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <title>Instavel</title>
</head>
<body>
    <header class="nav-header">
        <nav class="globalnav-wrap"> 
            <h1>Instavel</h1>
            <div class="nav-button-wrap">
                <div class="nav-button">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
            </div>  
            <ul class="globalnav">
                <a href="#" class="log">ホーム</a>
                <li class="dropdown-btn log">
                    提案プラン
                    <ul class="dropdown">
                        <li><a href="./sub.html">銀閣寺・南禅寺プラン</a></li>
                        <li><a href="">嵐山プラン</a></li>
                        <li><a href="">京都駅周辺プラン</a></li>                       
                        <li><a href="">ゆっくり京都を満喫したい方向け・オススメプラン</a></li>
                    </ul>
                </li>
                <a href="#" class="log">プラン作成</a>            
                <a href="#" class="log">ログイン</a>                 
            </ul>             
        </nav>        
    </header>

    <main>
        <article>
            <header class="header-title flex">
                <h1>旅行プラン投稿・検索アプリ</h1>
                <h2>INSTAVEL</h2>
                <p>旅行プランの作成は誰でも簡単に作れます</p>
                <p>作ったプランを投稿したり、他の人のプランを見ることができます</p>
            </header>

            <!-- <section class="main-title">
                <h2>プラン一覧</h2>
                <div class="main-contents">             
                    <div class="main-content">
                        <img src="./img/蹴上インクライン.jpg" alt="蹴上" class="main-img">
                        <h3 class="main-text">銀閣寺・南禅寺プラン</h3>
                        <p>季節や旅の目的によって足を運ぶ場所を何通りも考えることができる。そんな魅力のある京都旅行は、
                        カスタマイズすれば様々な楽しみ方ができます。静かな佇まいに心が洗われるような「銀閣寺」から、
                        「南禅寺」まではゆっくりと歩いて回りたいおすすめコースです。小鳥も居眠りしてしまうほど静かな
                        哲学の道をのんびりと楽しみませんか？</p> 
                        <div class="content-btn">
                            <a href="./sub.html" class="contents-btn">コース詳細へ</a>                                   
                        </div>
                    </div> 
                        
                    <div class="main-content">
                        <img src="img/渡月橋.jpg" alt="渡月橋" class="main-img">
                        <h3 class="main-text">嵐山プラン</h3>
                        <p>季節や旅の目的によって足を運ぶ場所を何通りも考えることができる。そんな魅力のある京都旅行は、
                        カスタマイズすれば様々な楽しみ方ができます。静かな佇まいに心が洗われるような「銀閣寺」から、
                        「南禅寺」まではゆっくりと歩いて回りたいおすすめコースです。小鳥も居眠りしてしまうほど静かな
                        哲学の道をのんびりと楽しみませんか？</p>
                        <div class="content-btn">
                            <a href="#" class="contents-btn">コース詳細へ</a>                     
                        </div>
                    </div>
                </div>                 
            </section>        

            <section>
                <div class="main-contents">
                    <div class="main-content">
                        <img src="./img/大原.jpg" alt="大原" class="main-img">                       
                        <h3>ゆっくり京都を満喫したい方向け・オススメプラン</h3>
                        <p>季節や旅の目的によって足を運ぶ場所を何通りも考えることができる。そんな魅力のある京都旅行は、
                        カスタマイズすれば様々な楽しみ方ができます。静かな佇まいに心が洗われるような「銀閣寺」から、
                        「南禅寺」まではゆっくりと歩いて回りたいおすすめコースです。小鳥も居眠りしてしまうほど静かな
                        哲学の道をのんびりと楽しみませんか？</p>
                        <div class="content-btn">
                            <a href="#" class="contents-btn">コース詳細へ</a>                                             
                        </div>
                    </div>

                    <div class="main-content">
                        <img src="./img/大原.jpg" alt="大原" class="main-img">                       
                        <h3>ゆっくり京都を満喫したい方向け・オススメプラン</h3>
                        <p>季節や旅の目的によって足を運ぶ場所を何通りも考えることができる。そんな魅力のある京都旅行は、
                        カスタマイズすれば様々な楽しみ方ができます。静かな佇まいに心が洗われるような「銀閣寺」から、
                        「南禅寺」まではゆっくりと歩いて回りたいおすすめコースです。小鳥も居眠りしてしまうほど静かな
                        哲学の道をのんびりと楽しみませんか？</p>
                        <div class="content-btn">
                            <a href="#" class="contents-btn">コース詳細へ</a>                                    
                        </div>
                    </div>

                </div>
            </section> -->

            <section>
                <div class="task-items ">
                    @foreach ($itineraries as $itinerary)

                    <div class="task">
                        <div class="task-text">
                            <a href="/hello/{{ $itinerary->id}}" class="btn-text">
                                {{ $itinerary->title }}
                            </a>
                        </div>
                    </div>
                    <br>
                    @endforeach
                </div>
            </section>
        </article>
    </main>

    <footer>
        <div class="main-footer flex">
            <a href="#top" class="footer-btn">ページTOPへ</a>
        </div>
    </footer>

    <script>
        // ドロップダウン
        // カーソルが重なったとき
        $('.dropdown-btn').hover(
            function() {

                // this = .dropdown-btn
                // dropdownの子要素(li a)にopenクラスを追加

                $(this).children('.dropdown').addClass('open');
            }, function() {

                // カーソルが離れたとき

                $(this).children('.dropdown').removeClass('open');
            }
        );

        // グローバルナビの開閉
        $(function() {
            $('.nav-button-wrap').on('click', function() {
                // nav-button-wrapがクリックされた時
                if ($(this).hasClass('active')) {
                    // スマホ用メーニュー表示
                    $(this).removeClass('active');
                    $('.globalnav').addClass('close');
                    $('globalnav-wrap , body').removeClass('open');
                } else {
                    // スマホ用メニュー非表示
                    $(this).addClass('active');
                    $('.globalnav').removeClass('close');
                    $('.globalnav-wrap , body').addClass('open');
                }
            });
        });
    </script>

<link href="https://fonts.googleapis.com/css?family=M+PLUS+Rounded+1c" rel="stylesheet">
<link rel="stylesheet" href="{{ asset('css/home.scss') }}">
</body>
</html>