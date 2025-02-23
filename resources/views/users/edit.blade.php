@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card shadow-lg">
        <div class="card-header bg-primary text-white">
            <h4 class="mb-0">
                <i class="fas fa-user-edit me-2"></i>Modifier l'utilisateur : {{ $user->name }}
            </h4>
        </div>

        <div class="card-body">
            <form action="{{ route('users.update', $user) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="row g-3">
                    <!-- Colonne de gauche -->
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label">Nom complet</label>
                            <input type="text" 
                                   name="name" 
                                   class="form-control" 
                                   value="{{ old('name', $user->name) }}" 
                                   required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Adresse email</label>
                            <input type="email" 
                                   name="email" 
                                   class="form-control" 
                                   value="{{ old('email', $user->email) }}" 
                                   required>
                        </div>
                    </div>

                    <!-- Colonne de droite -->
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label">Rôle utilisateur</label>
                            <select name="role_id" class="form-select" required>
                                @foreach(\App\Models\Role::all() as $role)
                                    <option value="{{ $role->id }}" 
                                        {{ $user->role_id == $role->id ? 'selected' : '' }}>
                                        {{ $role->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>

                <div class="d-grid gap-2 d-md-flex justify-content-md-end mt-4">
                    <a href="{{ route('users.index') }}" class="btn btn-secondary">
                        <i class="fas fa-times-circle me-2"></i>Annuler
                    </a>
                    <button type="submit" class="btn btn-warning">
                        <i class="fas fa-save me-2"></i>Enregistrer
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection