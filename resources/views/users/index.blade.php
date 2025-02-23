@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="my-4">Liste des utilisateurs</h1>

    <div class="table-responsive shadow-lg rounded-3">
        <table class="table table-hover table-striped">
            <thead class="table-dark">
                <tr>
                    <th>Nom</th>
                    <th>Email</th>
                    <th>Rôle</th>
                    <th class="text-end">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        <span class="badge bg-primary">
                            {{ $user->role->name ?? 'Aucun rôle' }}
                        </span>
                    </td>
                    <td class="text-end">
                        <div class="d-flex gap-2 justify-content-end">
                            <a href="{{ route('users.show', $user) }}" 
                               class="btn btn-sm btn-info text-white">
                               <i class="fas fa-eye"></i>
                            </a>
                            
                            <a href="{{ route('users.edit', $user) }}" 
                               class="btn btn-sm btn-warning">
                               <i class="fas fa-edit"></i>
                            </a>
                            
                            <form action="{{ route('users.destroy', $user) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" 
                                        class="btn btn-sm btn-danger"
                                        onclick="return confirm('Confirmer la suppression ?')">
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
</div>
@endsection