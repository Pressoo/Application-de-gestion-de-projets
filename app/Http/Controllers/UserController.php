<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    // Affiche la liste des utilisateurs
    public function index()
    {
        $users = User::all();
        return view('users.index', compact('users'));
    }

    // (Optionnel) Affiche un seul utilisateur
    public function show(User $user)
{
    // Ajouter cette relation si elle n'existe pas dans le modèle User
    $user->load('projects', 'tasks'); 
    return view('users.show', compact('user'));
}

    // (Optionnel) Formulaire pour éditer un utilisateur
    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('users.edit', compact('user'));
    }

    // (Optionnel) Met à jour un utilisateur
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $user->update($request->all());
        return redirect()->route('users.index')->with('success', 'Utilisateur mis à jour.');
    }

    // (Optionnel) Supprime un utilisateur
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->route('users.index')->with('success', 'Utilisateur supprimé.');
    }
}
