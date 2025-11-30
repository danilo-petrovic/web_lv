<x-app-layout>
<x-slot name="header">Novi projekt</x-slot>

<form method="POST" action="{{ route('projects.store') }}">
@csrf

<input name="name" placeholder="Naziv">
<textarea name="description" placeholder="Opis"></textarea>
<input name="price" placeholder="Cijena">
<input type="date" name="start_date">
<input type="date" name="end_date">

<select multiple name="members[]">
@foreach($users as $u)
<option value="{{ $u->id }}">{{ $u->name }}</option>
@endforeach
</select>

<button>Spremi</button>
</form>

</x-app-layout>
