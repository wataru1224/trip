<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link href="https://fonts.googleapis.com/css?family=M+PLUS+Rounded+1c" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ secure_asset('css/new.css') }}">   
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
</body>

<script>
    //ハンバーガ
    $(function() {
        $('.Toggle').click(function() {
            $(this).toggleClass('active');
            $('.menu').toggleClass('open');
        });
    });
</script>

