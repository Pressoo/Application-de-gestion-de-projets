<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\Project;
use Illuminate\Http\Request;
use App\Models\User;
use App\Notifications\TaskAssigned;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;


class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tasks = Task::all();
        return view('tasks.index', compact('tasks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $projects = Project::all();
        $users = User::all(); // Récupérer tous les utilisateurs
        return view('tasks.create',compact('projects','users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         $request->validate([
            'title' => 'required',
            'description' => 'required',
            'due_date' => 'required|date',
            'status' => 'required|in:en_cours,terminee,suspendue',
            'project_id' => 'required|exists:projects,id',
            'assignee_id' => 'nullable|exists:users,id',
        ]);

        $task = Task::create($request->all());
        If ($task->assignee_id) {
            $assignee = User::find($task->assignee_id);
         
            If ($assignee) {
            $task->sendAssignedNotification($assignee);
            }
            }
        return redirect()->route('tasks.index')
            ->with('success', 'Task created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Task $task)
    {
        return view('tasks.show', compact('task'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Task $task)
    {
        $projects = Project::all();
        $users = User::all(); // Récupérer tous les utilisateurs
        return view('tasks.edit', compact('task','projects','users'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Task $task)
    {
       $request->validate([
            'title' => 'required',
            'description' => 'required',
            'due_date' => 'required|date',
            'status' => 'required|in:en_cours,terminee,suspendue',
            'project_id' => 'required|exists:projects,id',
            'assignee_id' => 'nullable|exists:users,id',
        ]);

        $task->update($request->all());
        If ($task->assignee_id) {
            $assignee = User::find($task->assignee_id);
     
            If ($assignee) {
            $task->sendAssignedNotification($assignee);
            }
            }
     

        return redirect()->route('tasks.index')
            ->with('success', 'Task updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task)
    {
         $task->delete();

        return redirect()->route('tasks.index')
            ->with('success', 'Task deleted successfully.');
    }
}
