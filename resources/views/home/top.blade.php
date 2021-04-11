<header>
<h1>タスク管理</h1>

</header>

<main>

<div class="task-items">
@foreach ($itineraries as $itinerary)

<div class="task">
<div class="task-text">
    <a href="/hello/{{ $itinerary->id}}" class="btn-text">
  {{ $itinerary->title }}
    </a>
  </div>

  </div>

  <!-- <br> -->

@endforeach
</div>
</main>

<link href="https://fonts.googleapis.com/css?family=M+PLUS+Rounded+1c" rel="stylesheet">
<link rel="stylesheet" href="{{ asset('css/style.scss') }}">