<h1>Prijave studenata</h1>

@foreach($applications as $app)
    <div>
        Rad ID: {{ $app->task_id }}<br>
        Student ID: {{ $app->student_id }}<br>
        Status: {{ $app->status }}<br>

        @if($app->status === 'pending')
            <form method="POST" action="/nastavnik/prihvati/{{ $app->id }}">
                @csrf
                <button>Prihvati</button>
            </form>

            <form method="POST" action="/nastavnik/odbij/{{ $app->id }}">
                @csrf
                <button>Odbij</button>
            </form>
        @endif
    </div>
    <hr>
@endforeach
