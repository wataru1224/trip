@include('home.header')
<main>
  <article>
    <form action="{{ url('/travel/create')}}" method="POST" enctype="multipart/form-data">
      {{ csrf_field() }} 
      <h2>旅行タイトル</h2> 
      <div class="alert">
        @if($errors->has('title'))
          @foreach($errors->get('title') as $message)
            {{ $message }}<br>
          @endforeach
        @endif 
      </div>
      <div class="title-form">
        <div class="title-item">
          <label for="">タイトル:</label>           
          <input type="text" name="title" value=""  placeholder="例：京都旅行"  class="edit-new">
        </div>
        <div class="image-item">
          <label for="">メイン画像:</label> 
          <input type="file" name="image" accept="image/png, image/jpeg" size="30">
        </div>
      </div>
      
      <input type="hidden" name="trip-id" value=""> 
      <h2>プラン内容</h2>
      <div class="alert">
        @if($errors->has('itinerary.*'))
          <!-- ・日程と行先は必ず入力してください。 -->
          @foreach($errors->get('itinerary.*') as $message)
            {{ $message[0] }}<br>
          @endforeach
        @endif 
      </div>
      <div id="item-list">
        <div class="item">
          <div class="main-item">
            <div class="main-items">
              <label for="">日程：</label>     
              <input type="date" name="itinerary[0][date]">
              <input type="time" name="itinerary[0][time]">
            </div>
            <div class="main-items">
              <label for="">行先：</label>
              <input type="text" name="itinerary[0][destination]" value="" placeholder="例：金閣寺" >
            </div>
          </div>
          <div class="sub-item">
            <label for="">メモ：</label>
            <textarea name="itinerary[0][contents]" id="" cols="20" rows="3" placeholder="例：料金、○○ツーリスト"></textarea>
          </div>   
          <div class="image">
            <label for="">サブ画像:</label> 
            <input type="file" name="itinerary[0][image]" size="30">
          </div>    
        </div>
      </div>
      <div class="form-btn">
        <button type="button" name="to" class="btn to-btn" id="to">プランを追加</button>
        <button type="submit" name="add" class="btn add-btn">プランを投稿</button>
      </div>
    </form>
  </article>
</main>

<script>
  let item_count = 0;
  const parent = document.getElementById("item-list");
  const button = document.getElementById("to");
  button.addEventListener("click", function(){
    item_count++;

    let item_template = `
        <div class="item">
          <div class="add-item">
            <div class="main-item">
              <div class="main-items">
                <label for="">日程：</label>     
                <input type="date" name="itinerary[${item_count}][date]">
                <input type="time" name="itinerary[${item_count}][time]">
              </div>
              <div class="main-items">
                <label for="">行先：</label>
                <input type="text" name="itinerary[${item_count}][destination]" value="" placeholder="例：金閣寺">
              </div>
            </div>
            <div class="sub-item">
              <label for="">メモ：</label>
              <textarea name="itinerary[${item_count}][contents]" id="" cols="20" rows="3" placeholder="例：料金、○○ツーリスト"></textarea>
            </div>   
            <div class="image">
              <label for="">サブ画像:</label> 
              <input type="file" name="itinerary[${item_count}][image]" size="30">
            </div>        
          </div>
        </div>     
    `
    parent.insertAdjacentHTML("beforeend",item_template);
  });
</script>

@include('home.footer')



