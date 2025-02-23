<?php
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\TaskAttachmentController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;

// Authentification (garder tel quel)
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

// Zone authentifiée
Route::middleware(['auth'])->group(function () {
    // Dashboard (existant)
    Route::get('/', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');

    // Resources (modification uniquement pour users)
    Route::resource('projects', ProjectController::class);
    Route::resource('tasks', TaskController::class);
    Route::resource('task_attachments', TaskAttachmentController::class);
    
    // Nouvelle configuration users (remplace les routes manuelles)
    Route::resource('users', UserController::class)->only([
        'index', 'show', 'edit', 'update', 'destroy'
    ]);
});

// Admin (optionnel - à garder si utile)
Route::group(['middleware' => ['auth', 'checkrole:admin']], function () {
    Route::get('/admin', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');
});

// Home (existant)
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');