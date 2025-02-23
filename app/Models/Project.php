<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory; // Ajout de l'import

class Project extends Model
{
    use HasFactory; // Ajout de HasFactory

    protected $fillable = [
        'title',
        'description',
        'start_date',
        'end_date',
        'status'
    ];
    // AJOUTER CE CODE
    protected $casts = [
        'start_date' => 'date:Y-m-d',
        'end_date' => 'date:Y-m-d',
    ];

    public function users()
    {
        return $this->belongsToMany(User::class, 'project_users')
                    ->withPivot('role')
                    ->withTimestamps();
    }

    public function tasks()
    {
        return $this->hasMany(Task::class);
    }
    // Ajouter dans app/Models/Project.php
protected $dates = ['start_date', 'end_date']; // Conversion automatique en Carbon

public function getStatusLabelAttribute()
{
    return [
        'en_cours' => 'En Cours',
        'termine' => 'Terminé',
        'en_attente' => 'En Attente'
    ][$this->status];
}

public function getStatusColorAttribute()
{
    return [
        'en_cours' => 'warning',
        'termine' => 'success',
        'en_attente' => 'secondary'
    ][$this->status];
}
}
