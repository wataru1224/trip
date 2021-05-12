<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <title>Instavel</title>
</head>
<body>
    <header class="nav-header">
        <h1>Instavel</h1>
        <div id="nav-toggle">
            <div>
                <span></span>
                <span></span>
                <span></span>
            </div>  
        </div>
        <div id="global-nav">
            <nav>
                <ul class="nav-wrap">
                    <li><a href="/hello" class="log">ホーム</a></li>
                    <li><a href="/hello/new" class="log">プラン作成</a></li>
                    <li><a href="/hello/self" class="log">マイページ</a></li>
                    <li><a href="/hello/pass" class="log">ログイン</a></li>              
                </ul>                    
            </nav>
        </div>
    </header>  
</body>

<script>
    (function($) {
        $(function () {
            $('#nav-toggle').on('click', function() {
                $('body').toggleClass('open');
            });
        });
    })(jQuery);
</script>

<link href="https://fonts.googleapis.com/css?family=M+PLUS+Rounded+1c" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="{{ asset('css/new.css') }}">