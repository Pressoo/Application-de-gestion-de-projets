@extends('layouts.app')

@section('content')
    <h1>Modifier le projet</h1>

    <form action="{{ route('projects.update', $project->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div>
            <label for="title">Titre :</label>
            <input type="text" name="title" id="title" value="{{ $project->title }}" required>
        </div>
        <div>
            <label for="description">Description :</label>
            <textarea name="description" id="description" required>{{ $project->description }}</textarea>
        </div>
        <div>
            <label for="start_date">Date de début :</label>
            <input type="date" name="start_date" id="start_date" value="{{ $project->start_date }}" required>
        </div>
        <div>
            <label for="end_date">Date de fin :</label>
            <input type="date" name="end_date" id="end_date" value="{{ $project->end_date }}" required>
        </div>
        <div>
            <label for="status">Statut :</label>
            <select name="status" id="status" required>
                <option value="en_cours" {{ $project->status == 'en_cours' ? 'selected' : '' }}>En cours</option>
                <option value="termine" {{ $project->status == 'termine' ? 'selected' : '' }}>Terminé</option>
                <option value="en_attente" {{ $project->status == 'en_attente' ? 'selected' : '' }}>En attente</option>
            </select>
        </div>
        <button type="submit">Mettre à jour</button>
    </form>
@endsection
