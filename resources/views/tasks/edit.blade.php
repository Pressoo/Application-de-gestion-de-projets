@extends('layouts.app')

@section('content')
    <h1>Modifier la tâche</h1>

    <form action="{{ route('tasks.update', $task->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div>
            <label for="title">Titre :</label>
            <input type="text" name="title" id="title" value="{{ $task->title }}" required>
        </div>

        <div>
            <label for="description">Description :</label>
            <textarea name="description" id="description" required>{{ $task->description }}</textarea>
        </div>

        <div>
            <label for="due_date">Date d'échéance :</label>
            <input type="date" name="due_date" id="due_date" value="{{ $task->due_date }}" required>
        </div>

        <div>
            <label for="status">Statut :</label>
            <select name="status" id="status" required>
                <option value="en_cours" {{ $task->status == 'en_cours' ? 'selected' : '' }}>En cours</option>
                <option value="terminee" {{ $task->status == 'terminee' ? 'selected' : '' }}>Terminée</option>
                <option value="suspendue" {{ $task->status == 'suspendue' ? 'selected' : '' }}>Suspendue</option>
            </select>
        </div>

        <div>
            <label for="project_id">Projet :</label>
            <select name="project_id" id="project_id" required>
                @foreach($projects as $project)
                    <option value="{{ $project->id }}" {{ $task->project_id == $project->id ? 'selected' : '' }}>{{ $project->title }}</option>
                @endforeach
            </select>
        </div>

       <div>
       <label for="assignee_id">Assigner à :</label>
       <select name="assignee_id" id="assignee_id">
       <option value="">Non assigné</option>
       @foreach($users as $user)
       <option value="{{ $user->id }}" {{ $task->assignee_id == $user->id ? 'selected' : '' }}>{{ $user->name }}</option>
       @endforeach
       </select>
       </div>

        <button type="submit">Modifier</button>
    </form>
@endsection
