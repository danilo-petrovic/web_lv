<h1>Moji radovi</h1>

<a href="/nastavnik/radovi/create">Dodaj novi rad</a>
<hr>

@foreach($tasks as $task)
    <div>
        <b>{{ $task->title_hr }}</b><br>
        {{ $task->title_en }}<br>
        {{ $task->study_type }}
    </div>
    <hr>
@endforeach
