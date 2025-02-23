@extends('layouts.app')

@section('content')
<div class="dashboard-container">
    <div class="welcome-section mb-5">
        <h1 class="display-4">Bienvenue, {{ Auth::user()->name }} !</h1>
        <p class="lead">Gérez vos projets et tâches en toute simplicité</p>
    </div>

    <div class="stats-grid row g-4 mb-5">
        <div class="col-md-3">
            <div class="stat-card bg-primary text-white">
                <h3><i class="fas fa-project-diagram me-2"></i>Projets</h3>
                <div class="stat-value">{{ $projects_count }}</div>
            </div>
        </div>
        
        <div class="col-md-3">
            <div class="stat-card bg-success text-white">
                <h3><i class="fas fa-tasks me-2"></i>Tâches terminées</h3>
                <div class="stat-value">{{ $completed_tasks }}</div>
            </div>
        </div>
        
        <div class="col-md-3">
            <div class="stat-card bg-warning text-dark">
                <h3><i class="fas fa-users me-2"></i>Membres</h3>
                <div class="stat-value">{{ $users_count }}</div>
            </div>
        </div>
        
        <div class="col-md-3">
            <div class="stat-card bg-info text-white">
                <h3><i class="fas fa-rocket me-2"></i>Actifs</h3>
                <div class="stat-value">{{ $active_projects }}</div>
            </div>
        </div>
    </div>

    <div class="quick-actions mb-5">
        <div class="row g-3">
            <div class="col-md-4">
                <a href="{{ route('projects.create') }}" class="action-card bg-white">
                    <i class="fas fa-plus-circle text-primary"></i>
                    <span>Nouveau projet</span>
                </a>
            </div>
            <div class="col-md-4">
                <a href="{{ route('tasks.index') }}" class="action-card bg-white">
                    <i class="fas fa-tasks text-success"></i>
                    <span>Voir les tâches</span>
                </a>
            </div>
            <div class="col-md-4">
                <a href="{{ route('users.index') }}" class="action-card bg-white">
                    <i class="fas fa-users-cog text-warning"></i>
                    <span>Gérer les utilisateurs</span>
                </a>
            </div>
        </div>
    </div>
</div>
@endsection