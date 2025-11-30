<x-app-layout>
    <x-slot name="header">Projekti</x-slot>

    <a href="{{ route('projects.create') }}">Novi projekt</a>

    <h3>Vodim</h3>
    @foreach($led as $p)
        <div>
            <a href="{{ route('projects.show', $p) }}">{{ $p->name }}</a>
        </div>
    @endforeach

    <h3>Član sam</h3>
    @foreach($member as $p)
        <div>
            <a href="{{ route('projects.show', $p) }}">{{ $p->name }}</a>
        </div>
    @endforeach
</x-app-layout>
