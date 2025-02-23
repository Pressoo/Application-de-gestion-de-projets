@extends('layouts.app')

@section('content')
    <h1>Créer une nouvelle tâche</h1>

    <form action="{{ route('tasks.store') }}" method="POST">
        @csrf
        <div>
            <label for="title">Titre :</label>
            <input type="text" name="title" id="title" required>
        </div>
        <div>
            <label for="description">Description :</label>
            <textarea name="description" id="description" required></textarea>
        </div>
        <div>
            <label for="due_date">Date d'échéance :</label>
            <input type="date" name="due_date" id="due_date" required>
        </div>
        <div>
            <label for="status">Statut :</label>
            <select name="status" id="status" required>
                <option value="en_cours">En cours</option>
                <option value="terminee">Terminée</option>
                <option value="suspendue">Suspendue</option>
            </select>
        </div>
        <div class="mb-3">
    <label for="project_id" class="form-label">Projet :</label>
    <select 
        name="project_id" 
        id="project_id" 
        class="form-select"
        required
    >
        @foreach ($projects as $project)
            <option value="{{ $project->id }}">{{ $project->title }}</option>
        @endforeach
    </select>
</div>
        <div>
            <label for="assignee_id">Assigner à :</label>
            <select name="assignee_id" id="assignee_id">
                <option value="">Non assigné</option>
                @foreach($users as $user)
                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                @endforeach
            </select>
        </div>


        
        

        <button type="submit">Créer</button>
    </form>

@endsection
