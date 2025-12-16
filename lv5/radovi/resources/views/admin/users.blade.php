<h1>Korisnici</h1>

@foreach($users as $u)
    <form method="POST" action="/admin/users/{{ $u->id }}">
        @csrf

        {{ $u->name }} ({{ $u->email }}) — {{ $u->role }}

        <select name="role">
            <option value="student" {{ $u->role === 'student' ? 'selected' : '' }}>student</option>
            <option value="nastavnik" {{ $u->role === 'nastavnik' ? 'selected' : '' }}>nastavnik</option>
        </select>

        <button>Spremi</button>
    </form>
    <hr>
@endforeach
<a href="/dashboard">Povratak na dashboard</a>

