<x-app-layout>
<x-slot name="header">{{ $project->name }}</x-slot>

<div>{{ $project->description }}</div>
<div>{{ $project->price }}</div>
<div>{{ $project->start_date }}</div>
<div>{{ $project->end_date }}</div>
<div>{{ $project->obavljeni_poslovi }}</div>

<a href="{{ route('projects.edit', $project) }}">Uredi</a>

<form method="POST" action="{{ route('projects.destroy', $project) }}">
@csrf
@method('DELETE')
<button>Obriši</button>
</form>

</x-app-layout>
