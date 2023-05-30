<?php

use App\Http\Controllers\Admin\TechnologyController;
use App\Http\Controllers\Admin\TypeController;
use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Models\Project;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application.
| These routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    $projects = Project::all();
    return view('welcome', compact('projects'));
});

Route::middleware(['auth', 'verified'])->name('admin.')->prefix('admin')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

    Route::resource('projects', ProjectController::class)->parameters(['projects' => 'project:slug']);

    Route::resource('types', TypeController::class)->parameters(['types' => 'type:slug']);

    Route::resource('technologies', TechnologyController::class)->parameters(['technologies' => 'technology:slug']);
});

Route::middleware('auth')
    ->name('profile.')
    ->prefix('profile')
    ->group(function () {
        Route::get('/', [ProfileController::class, 'edit'])->name('edit');
        Route::patch('/', [ProfileController::class, 'update'])->name('update');
        Route::delete('/', [ProfileController::class, 'destroy'])->name('destroy');
    });

require __DIR__.'/auth.php';


