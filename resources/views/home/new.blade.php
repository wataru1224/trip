@include('home.header')
<main>
  <article>
    <form action="{{ url('/hello/create')}}" method="POST" enctype="multipart/form-data">
      {{ csrf_field() }} 
      <h2>旅行タイトル</h2> 
      <div class="item">       
        <label for="">タイトル:</label>           
        <input type="text" name="title" value=""  placeholder="例：京都旅行"  class="edit-new">
      </div>
      <input type="file" name="image" size="30">
      
      <input type="hidden" name="trip-id" value=""> 
      <h2>旅行内容</h2>
      <div id="item-list">
        <div class="item">
          <div class="add-item">
            <div class="main-item">
              <label for="">日程：</label>     
              <input type="datetime-local" name="itinerary[0][date]" value="" class="space">
              <label for="">行先：</label>
              <input type="text" name="itinerary[0][destination]" value="" placeholder="例：金閣寺" class="space">
              <input type="file" name="itinerary[0][image]" size="30">
            </div>
            <div class="sub-item">
              <label for="">メモ：</label>
              <textarea name="itinerary[0][contents]" id="" cols="20" rows="3" placeholder="例：料金、○○ツーリスト"></textarea>
            </div>       
          </div>
        </div>     
      </div>
      <div class="form-btn">
        <button type="button" name="to" class="btn " id="to">旅行内容を追加</button>
        <button type="submit" name="add" class="btn add-btn">プランを保存して投稿する（投稿もする場合）</button>
        <button type="submit" name="post" class="btn add-btn">プランを保存する（マイページへ保存する場合）</button>
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
              <label for="">日程：</label>     
              <input type="datetime-local" name="itinerary[${item_count}][date]" value="" class="space">
              <label for="">行先：</label>
              <input type="text" name="itinerary[${item_count}][destination]" value="" placeholder="例：金閣寺" class="space">
            </div>
            <div class="sub-item">
              <label for="">メモ：</label>
              <textarea name="itinerary[${item_count}][contents]" id="" cols="20" rows="3" placeholder="例：料金、○○ツーリスト"></textarea>
              <input type="file" name="itinerary[${item_count}][image]" size="30">
            </div>       
          </div>
        </div>     
    `
    parent.insertAdjacentHTML("beforeend",item_template);
  });
</script>

@include('home.footer')



