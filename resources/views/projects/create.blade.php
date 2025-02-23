@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="my-4">Nouveau projet</h1>

    <div class="card shadow">
        <div class="card-body">
            <form action="{{ route('projects.store') }}" method="POST">
                @csrf
                
                <div class="mb-3">
                    <label class="form-label">Titre</label>
                    <input type="text" name="title" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Description</label>
                    <textarea name="description" class="form-control" rows="3" required></textarea>
                </div>

                <div class="row g-3">
                    <div class="col-md-6">
                        <label class="form-label">Date de début</label>
                        <input type="date" name="start_date" class="form-control" required>
                    </div>
                    
                    <div class="col-md-6">
                        <label class="form-label">Date de fin</label>
                        <input type="date" name="end_date" class="form-control" required>
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label">Statut</label>
                    <select name="status" class="form-select" required>
                        <option value="en_cours">En cours</option>
                        <option value="termine">Terminé</option>
                        <option value="en_attente">En attente</option>
                    </select>
                </div>

                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save me-2"></i>Créer
                </button>
            </form>
        </div>
    </div>
</div>
@endsection