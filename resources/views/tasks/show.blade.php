@extends('layouts.app')

@section('content')
    <h1>{{ $task->title }}</h1>

    <p>Description : {{ $task->description }}</p>
    <p>Date d'échéance : {{ $task->due_date }}</p>
    <p>Statut : {{ $task->status }}</p>

    @if($task->project)
        <p>Projet : {{ $task->project->title }}</p> 
    @else
        <p>Aucun projet associé.</p> 
    @endif

    <!-- Optionnel : Afficher l'utilisateur assigné -->
    <!-- 
    @if($task->assignee)
        <p>Assigné à : {{ $task->assignee->name }}</p> 
    @else
         <p>Aucun utilisateur assigné.</p> 
    @endif 
    -->

    <a href="{{ route('tasks.edit', $task->id) }}">Modifier</a>

    <!-- Formulaire de suppression -->
    <form action="{{ route('tasks.destroy', $task->id) }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit">Supprimer</button>
    </form>

@endsection
