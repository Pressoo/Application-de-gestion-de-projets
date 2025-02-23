<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory; // Ajout de l'import

class TaskAttachment extends Model
{
    use HasFactory; // Ajout de HasFactory
    protected $fillable = [
        'task_id',
        'file_name',
        'file_path',
        'file_size',
        'mime_type'
    ];

    public function task()
    {
        return $this->belongsTo(Task::class);
    }
}
