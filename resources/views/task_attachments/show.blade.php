
@extends('layouts.app')

@section('content')
    <h1>Détails du fichier attaché</h1>

    <p>Tâche : {{ $taskAttachment->task->title }}</p>
    <p>Nom du fichier : {{ $taskAttachment->file_name }}</p>
    <p>Taille : {{ number_format($taskAttachment->file_size / 1024, 2) }} KB</p>
    <p>Type MIME : {{ $taskAttachment->mime_type }}</p>

    <a href="{{ $taskAttachment->file_path }}" target="_blank">Télécharger</a>
    <a href="{{ route (' task_attachments.index')}}">Retourner à la liste des fichiers attachés.</a>@endsection
@endsection

