@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card shadow-lg">
        <div class="card-header bg-primary text-white">
            <h4 class="mb-0">
                <i class="fas fa-user me-2"></i>{{ $user->name }}
            </h4>
        </div>
        
        <div class="card-body">
            <div class="row">
                <!-- Colonne Informations -->
                <div class="col-md-6 border-end">
                    <h5 class="text-primary mb-4">
                        <i class="fas fa-info-circle me-2"></i>Informations
                    </h5>
                    <p><strong>Email :</strong> {{ $user->email }}</p>
                    <p><strong>Rôle :</strong> 
                        <span class="badge bg-secondary">
                            {{ $user->role->name ?? 'Membre' }}
                        </span>
                    </p>
                </div>

                <!-- Colonne Activités -->
                <div class="col-md-6">
                    <h5 class="text-primary mb-4">
                        <i class="fas fa-tasks me-2"></i>Activités
                    </h5>
                    
                    <div class="mb-4">
                        <h6>Projets ({{ $user->projects->count() }})</h6>
                        <ul class="list-group">
                            @foreach($user->projects as $project)
                                <a href="{{ route('projects.show', $project) }}" 
                                   class="list-group-item list-group-item-action">
                                   {{ $project->title }}
                                   <span class="badge bg-primary float-end">
                                       {{ $project->pivot->role }}
                                   </span>
                                </a>
                            @endforeach
                        </ul>
                    </div>

                    <div>
                        <h6>Tâches assignées ({{ $user->tasks->count() }})</h6>
                        <ul class="list-group">
                            @foreach($user->tasks as $task)
                                <a href="{{ route('tasks.show', $task) }}" 
                                   class="list-group-item list-group-item-action">
                                   {{ $task->title }}
                                   <span class="badge bg-{{ $task->status_color }} float-end">
                                       {{ $task->status_label }}
                                   </span>
                                </a>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="card-footer bg-light">
            <a href="{{ route('users.index') }}" class="btn btn-outline-primary">
                <i class="fas fa-arrow-left me-2"></i>Retour
            </a>
        </div>
    </div>
</div>
@endsection