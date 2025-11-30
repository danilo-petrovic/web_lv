<x-app-layout>
<x-slot name="header">Uredi projekt</x-slot>

<form method="POST" action="{{ route('projects.update', $project) }}">
@csrf
@method('PUT')

@if($project->isOwner(auth()->user()))
<input name="name" value="{{ $project->name }}">
<textarea name="description">{{ $project->description }}</textarea>
<input name="price" value="{{ $project->price }}">
<input type="date" name="start_date" value="{{ $project->start_date }}">
<input type="date" name="end_date" value="{{ $project->end_date }}">
<textarea name="obavljeni_poslovi">{{ $project->obavljeni_poslovi }}</textarea>

<select multiple name="members[]">
@foreach($users as $u)
<option value="{{ $u->id }}" @if($project->users->contains($u)) selected @endif>{{ $u->name }}</option>
@endforeach
</select>
@else
<textarea name="obavljeni_poslovi">{{ $project->obavljeni_poslovi }}</textarea>
@endif

<button>Spremi</button>
</form>

</x-app-layout>
