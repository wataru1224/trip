<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/home.css">
    <!--==============レイアウトを制御する独自のCSSを読み込み===============-->
    <link rel="stylesheet" type="text/css" href="https://coco-factory.jp/ugokuweb/wp-content/themes/ugokuweb/data/reset.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <title>Instavel</title>
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
                    <li><a href="/hello" class="log">ホーム</a></li>
                    <li><a href="/hello/new" class="log">プラン作成</a></li>
                    <li><a href="/hello/self" class="log">マイページ</a></li>                      
                    <li><a href="/hello/pass" class="log">ログイン</a></li>                 
                </ul>             
            </div>
        </nav>        
    </header>

    <main>
        <article>
            <header id="slider" class="header-title">
                <h2 class="header-letter">プランを作る プランを投稿する。</h2>
            </header>

            <section class="main-section">
                <div class="main-contents-wrapper">
                    <div class="main-content-wrapper">
                        <h2>プランを作る プランを投稿する</h2>
                        <p>旅行のプランを作って保存・投稿できるサービス<span>「Instavel」</span></p>
                        <br>
                        <p>旅行プランを保存しておくだけでなく、プラン作成後に投稿することで旅行内容をシェアすることができます。</p>
                        <p>投稿された旅行内容を見れば、他の人のプランを参考にすることができるので行きたい旅行プランが簡単にみつかります。</p>
                        <p></p>
                        <p></p>
                    </div>
                    <div class="sub-contents">
                        <img src="{{ asset('img/camera.jpg')}}" alt="">
                    </div>
                </div>
            </section>

           
            <section class="design-section">
                <h2>Instavelの3つの特徴</h2>
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

                <div class="design-contents">
                    <div class="design-text-box">
                        <div class="design-title">
                            <p>02</p>
                            <h3>
                                行先の混雑具合がわかる
                            </h3>
                        </div>   
                        <div class="design-text">
                            <p>こんな時期だけど旅行したい。</p>
                            <p>でも混雑している場所には行きたくない。</p>
                            <p>そんな考えの人も多いと思います。実際に旅行して混雑していたかを表示しているので安心してプランの参考にできます。</p>
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
                                旅行プランを簡単に作りたい
                            </h3>
                        </div>   
                        <div class="design-text">
                            <p>プラン作成・プラン投稿に関して難しい操作は必要ありません。</p>
                            <p>プランを参考にする ⇒ プランを作成する ⇒ プランを投稿する これだけの機能に絞っているので難しいことはありません。</p>
                        </div> 
                    </div>
                </div>
            </section>

            <section class="sub-section">
                <h2>投稿プラン一覧</h2>
                <div class="task-items ">
                    @foreach ($itineraries as $itinerary)
                    <div class="task">
                        <div class="task-text">
                            <a href="/hello/{{ $itinerary->id}}" class="btn-text">
                                {{ $itinerary->title }}
                                <!-- titleだけ表示する -->
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
        <div class="main-footer ">
            <a href="/hello">Instavel</a>
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
    
        //画像スライド

        // var windowwidth = window.innerWidth || document.documentElement.clientWidth || 0;
		//     if (windowwidth > 768){
        //         var responsiveImage = [//PC用の画像
        //             { src: 'https://coco-factory.jp/ugokuweb/wp-content/themes/ugokuweb/data/6-1-3/img/img_01.jpg'},
        //             { src: 'https://coco-factory.jp/ugokuweb/wp-content/themes/ugokuweb/data/6-1-3/img/img_02.jpg'},
        //             { src: 'https://coco-factory.jp/ugokuweb/wp-content/themes/ugokuweb/data/6-1-3/img/img_03.jpg'}
        //     ];
        //     } else {
        //         var responsiveImage = [//タブレットサイズ（768px）以下用の画像
        //             { src: './img/img_sp_01.jpg' },
        //             { src: './img/img_sp_02.jpg' },
        //             { src: './img/img_sp_03.jpg' }
        //         ];
		//     }

        // //Vegas全体の設定

        // $('#slider').vegas({
        //     overlay: true,//画像の上に網線やドットのオーバーレイパターン画像を指定。
        //     transition: 'blur',//切り替わりのアニメーション。http://vegas.jaysalvat.com/documentation/transitions/参照。fade、fade2、slideLeft、slideLeft2、slideRight、slideRight2、slideUp、slideUp2、slideDown、slideDown2、zoomIn、zoomIn2、zoomOut、zoomOut2、swirlLeft、swirlLeft2、swirlRight、swirlRight2、burnburn2、blurblur2、flash、flash2が設定可能。
        //     transitionDuration: 2000,//切り替わりのアニメーション時間をミリ秒単位で設定
        //     delay: 10000,//スライド間の遅延をミリ秒単位で。
        //     animationDuration: 20000,//スライドアニメーション時間をミリ秒単位で設定
        //     animation: 'kenburns',//スライドアニメーションの種類。http://vegas.jaysalvat.com/documentation/transitions/参照。kenburns、kenburnsUp、kenburnsDown、kenburnsRight、kenburnsLeft、kenburnsUpLeft、kenburnsUpRight、kenburnsDownLeft、kenburnsDownRight、randomが設定可能。
        //     slides: responsiveImage,//画像設定を読む
        //     //timer:false,// プログレスバーを非表示したい場合はこのコメントアウトを外してください
        // });

    </script>



<link href="https://fonts.googleapis.com/css?family=M+PLUS+Rounded+1c" rel="stylesheet">
<link rel="stylesheet" href="{{ asset('css/home.css') }}">
</body>
</html>