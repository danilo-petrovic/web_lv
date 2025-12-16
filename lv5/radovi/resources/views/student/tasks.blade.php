<h1>Dostupni radovi</h1>

@foreach($tasks as $task)
    @php
        $applied = \App\Models\Application::where('task_id', $task->id)
            ->where('student_id', auth()->id())
            ->exists();
    @endphp

    <div>
        <b>{{ $task->title_hr }}</b><br>
        {{ $task->title_en }}<br>
        {{ $task->study_type }}<br>

        @if($applied)
            Već ste prijavljeni
        @else
            <form method="POST" action="/student/apply/{{ $task->id }}">
                @csrf
                <button>Prijavi se</button>
            </form>
        @endif
    </div>
    <hr>
@endforeach
