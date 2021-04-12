<html>
<body>
<header><h1>プラン作成</h1></header>
<main>
  <form action="{{ url('/hello/create')}}" method="POST" >
  {{ csrf_field() }}  
  <h2>旅行タイトル</h2>
    <div class="item">
      <label for="">タイトル:</label>           
      <input type="text" name="title" value=""  placeholder="例：京都旅行"  class="edit-new">
    </div>
    
   <input type="hidden" name="trip-id" value="{{$id}}">
        
    <h2>旅行の内容</h2>
    <div class="item">
      <div class="main-item">
        <label for="">日程：</label>     
        <input type="datetime-local" name="date" value="" class="space">

        <label for="">行先：</label>
        <input type="text" name="destination" value="" placeholder="例：金閣寺" class="space">
      </div>

      <div class="sub-item">
        <label for="">メモ：</label>
        <textarea name="contents" id="" cols="50" rows="10" placeholder="例：料金、○○ツーリスト"></textarea>
      </div>
    </div>    
    <button type="submit" name="" class="btn">旅行内容を追加</button>
    <button type="submit" name="add" class="btn">プラン作成</button>
  </form>
</main>
<link href="https://fonts.googleapis.com/css?family=M+PLUS+Rounded+1c" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="{{ asset('css/new.css') }}">
</body>

</html>
