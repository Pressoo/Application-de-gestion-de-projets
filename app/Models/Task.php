<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Notifications\TaskAssigned;
use App\Notifications\TaskDue;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Notifications\Notifiable;

class Task extends Model
{
    use HasFactory;
    use Notifiable;

    protected $fillable = [
        'project_id',
        'title',
        'description',
        'due_date',
        'status',
        'assignee_id', // Ajout de assignee_id
    ];

    public function project()
    {
        return $this->belongsTo(Project::class);
    }

     public function assignee()
     {
     return $this->belongsTo(User::class, 'assignee_id');
     }

    public function sendAssignedNotification(User $user)
    {
    $this->notify(new TaskAssigned($this, $user));
    }

    public function attachments()
    {
        return $this->hasMany(TaskAttachment::class);
    }

   Public function sendDueNotification(User $user)
    {
        $this -> Notify (new TaskDue ( $this,$user));
    }

    // Pour le statut
public function getStatusLabelAttribute()
{
    return [
        'en_cours' => 'En cours',
        'terminee' => 'Terminée',
        'suspendue' => 'Suspendue'
    ][$this->status];
}

// Pour la couleur du badge
public function getStatusColorAttribute()
{
    return [
        'en_cours' => 'warning',
        'terminee' => 'success',
        'suspendue' => 'danger'
    ][$this->status];
}

}







