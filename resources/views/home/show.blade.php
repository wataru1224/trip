<header><h1>詳細ページ</h1></header>
<main>

<table>
<tr>
    <th>ID</th>
    <td>{{ $itinerary['id'] }}</td>
</tr>

<tr>
<th>タイトル</th>
    <td>{{ $itinerary['title'] }}</td>
</tr>

<th>日程</th>
    <td>{{ $itinerary['date'] }}</td>
</tr>

<th>行先</th>
    <td>{{ $itinerary['destination'] }}</td>
</tr>

<th>メモ</th>
    <td>{{ $itinerary['contents'] }}</td>
</tr>

<tr>
<th>作成日時</th>
    <td>{{ $itinerary['created_at'] }}</td>
</tr>

<tr>
<th>更新日時</th>
    <td>{{ $itinerary['updated_at'] }}</td>
</tr>
</table>
<br>
<br>
<a href="/hello" class="btn">ホームへ</a>
</main>
<link href="https://fonts.googleapis.com/css?family=M+PLUS+Rounded+1c" rel="stylesheet">
<link rel="stylesheet" href="{{ asset('css/style.scss') }}">