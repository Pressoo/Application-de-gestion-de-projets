@extends('layouts.app')

@section('content')
    <h1>{{ $project->title }}</h1>
    <p>{{ $project->description }}</p>
    <p>Date de début : {{ $project->start_date }}</p>
    <p>Date de fin : {{ $project->end_date }}</p>
    <p>Statut : {{ $project->status }}</p>

    <a href="{{ route('projects.edit', $project->id) }}">Modifier</a>
    <form action="{{ route('projects.destroy', $project->id) }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit">Supprimer</button>
    </form>
@endsection
