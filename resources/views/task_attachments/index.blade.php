
@extends('layouts.app')

@section('content')
    <h1>Liste des fichiers attachés</h1>

    <a href="{{ route('task_attachments.create') }}">Ajouter un nouveau fichier</a>

    <table>
        <thead>
            <tr>
                <th>Tâche</th>
                <th>Nom du fichier</th>
                <th>Taille</th>
                <th>Type MIME</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($taskAttachments as $attachment)
                <tr>
                    <td>{{ $attachment->task->title }}</td>
                    <td>{{ $attachment->file_name }}</td>
                    <td>{{ number_format($attachment->file_size / 1024, 2) }} KB</td>
                    <td>{{ $attachment->mime_type }}</td>
                    <td>
                        <a href="{{ $attachment->file_path }}" target="_blank">Télécharger</a>
                        <form action="{{ route('task_attachments.destroy', $attachment->id) }}" method="POST">
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
