@include('home.header')

<main> 
  <article>
    <form class="main-form" action="{{ url('/travel/create')}}" method="POST" enctype="multipart/form-data">
      {{ csrf_field() }} 
      <h2>旅行タイトル</h2> 
      <div class="title-form">
        <div class="title-item">
          <label for="">タイトル:</label>           
          <input type="text" name="title" value="{{ $trip['title'] }}"  placeholder="例：京都旅行"  class="edit-new">
        </div>
        <div class="image-item">
          <label for="">メイン画像:</label> 
          <input type="file" name="image" accept="image/png, image/jpeg" value="{{ $trip['image'] }}" size="30">
        </div>
      </div>
      
      <input type="hidden" name="trip-id" value=""> 
      <h2>旅行内容</h2>
      @foreach ($itineraries as $itinerary)
      <div id="item-list">
        <div class="item">
          <div class="main-item">
            <div class="main-items">
              <label for="">日程：</label>     
              <input type="date" name="itinerary[0][date]" value="{{ $itinerary['date'] }}">
              <input type="time" name="itinerary[0][time]" value="{{ $itinerary['time'] }}">
            </div>
            <div class="main-items">
              <label for="">行先：</label>
              <input type="text" name="itinerary[0][destination]" value="{{ $itinerary['destination'] }}" placeholder="例：金閣寺" >
            </div>
          </div>
          <div class="sub-item">
            <label for="">メモ：</label>
            <textarea name="itinerary[0][contents]" id="" cols="20" rows="3" placeholder="例：料金、○○ツーリスト">{{ $itinerary['contents'] }}</textarea>
          </div>

          <div class="image">
            <label for="">サブ画像:</label> 
            <input type="file" name="itinerary[0][image]" value="{{ $itinerary['image'] }}" size="30">
          </div>  
          <button type="reset" class="btn">内容を削除する</button>  
        </div>
      </div>
      @endforeach
      <div class="form-btn">
        <button type="button" name="to" class="btn" id="to">旅行内容を追加</button>
        <button type="submit" name="add" class="btn add-btn">プランを投稿する</button>
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
            <button type="reset" class="btn">内容を削除する</button>       
          </div>
        </div>     
    `
    parent.insertAdjacentHTML("beforeend",item_template);
  });
</script>

@include('home.footer')