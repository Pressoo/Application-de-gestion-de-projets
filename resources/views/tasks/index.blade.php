@extends('layouts.app')

@section('content')
    <h1>Liste des tâches</h1>

    <a href="{{ route('tasks.create') }}">Créer une nouvelle tâche</a>

    <table>
        <thead>
            <tr>
                <th>Titre</th>
                <th>Description</th>
                <th>Date d'échéance</th>
                <th>Statut</th>
                <th>Projet</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($tasks as $task)
                <tr>
                    <td>{{ $task->title }}</td>
                    <td>{{ $task->description }}</td>
                    <td>{{ $task->due_date }}</td>
                    <td>{{ $task->status }}</td>
                    <td>{{ $task->project->title ?? 'Aucun' }}</td>
                    <td>
                        <a href="{{ route('tasks.show', $task->id) }}">Voir</a>
                        <a href="{{ route('tasks.edit', $task->id) }}">Modifier</a>
                        <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Supprimer</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
