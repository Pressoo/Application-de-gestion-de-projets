<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Task;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard', [
            'projects_count' => Project::count(),
            'active_projects' => Project::where('status', 'en_cours')->count(),
            'completed_tasks' => Task::where('status', 'terminee')->count(),
            'users_count' => User::count(),
        ]);
    }
}
