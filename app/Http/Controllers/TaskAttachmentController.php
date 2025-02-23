<?php

namespace App\Http\Controllers;

use App\Models\TaskAttachment;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TaskAttachmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $taskAttachments = TaskAttachment::all();
        return view('task_attachments.index', compact('taskAttachments'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $tasks = Task::all();
        return view('task_attachments.create', compact('tasks'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'task_id' => 'required|exists:tasks,id',
            'file' => 'required|file|max:2048', // Max 2MB
        ]);

        $file = $request->file('file');
        $fileName = $file->getClientOriginalName();
        $fileSize = $file->getSize();
        $mimeType = $file->getClientMimeType();
        $filePath = $file->store('public/task-attachments');

        TaskAttachment::create([
            'task_id' => $request->task_id,
            'file_name' => $fileName,
            'file_path' => Storage::url($filePath),
            'file_size' => $fileSize,
            'mime_type' => $mimeType,
        ]);

        return redirect()->route('task_attachments.index')
                         ->with('success', 'Fichier attaché avec succès.');
    }

    /**
     * Display the specified resource.
     */
    public function show(TaskAttachment $taskAttachment)
    {
        return view('task_attachments.show', compact('taskAttachment'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TaskAttachment $taskAttachment)
    {
        $tasks = Task::all();
        return view('task_attachments.edit', compact('taskAttachment', 'tasks'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, TaskAttachment $taskAttachment)
    {
        $request->validate([
            'task_id' => 'required|exists:tasks,id',
        ]);

        $taskAttachment->update([
            'task_id' => $request->task_id,
        ]);

        return redirect()->route('task_attachments.index')
                         ->with('success', 'Fichier attaché mis à jour avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TaskAttachment $taskAttachment)
    {
        Storage::delete(str_replace('/storage', 'public', $taskAttachment->file_path)); // Supprime le fichier du stockage
        $taskAttachment->delete();

        return redirect()->route('task_attachments.index')
                         ->with('success', 'Fichier attaché supprimé avec succès.');
    }
}
