@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="my-4">Liste des projets</h1>

    <a href="{{ route('projects.create') }}" class="btn btn-success mb-3">
        <i class="fas fa-plus-circle me-2"></i>Créer un projet
    </a>

    @if($projects->isEmpty())
        <div class="alert alert-info">
            Aucun projet trouvé. Commencez par en créer un !
        </div>
    @else
        <div class="table-responsive shadow rounded">
            <table class="table table-hover">
                <thead class="table-dark">
                    <tr>
                        <th>Titre</th>
                        <th>Description</th>
                        <th>Début</th>
                        <th>Fin</th>
                        <th>Statut</th>
                        <th class="text-end">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($projects as $project)
                    <tr>
                        <td>{{ $project->title }}</td>
                        <td>{{ Str::limit($project->description, 50) }}</td>
                        <td>{{ $project->start_date->format('d/m/Y') }}</td>
                        <td>{{ $project->end_date->format('d/m/Y') }}</td>
                        <td>
                            <span class="badge bg-{{ $project->status_color }}">
                                {{ $project->status_label }}
                            </span>
                        </td>
                        <td class="text-end">
                            <div class="d-flex gap-2 justify-content-end">
                                <a href="{{ route('projects.show', $project) }}" 
                                   class="btn btn-sm btn-info text-white">
                                   <i class="fas fa-eye"></i>
                                </a>
                                <a href="{{ route('projects.edit', $project) }}" 
                                   class="btn btn-sm btn-warning">
                                   <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('projects.destroy', $project) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" 
                                            class="btn btn-sm btn-danger"
                                            onclick="return confirm('Supprimer ce projet ?')">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
</div>
@endsection