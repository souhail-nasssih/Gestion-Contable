<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ContableController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TacheController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/dashboard', function () {
    if (auth()->user()->role == 'admin') {
        return view('admin.dashboard');
    } elseif (auth()->user()->role == 'contable') {
        return view('contable.dashboard');
    } else {

        return redirect()->route('home'); // Redirige vers la page d'accueil par défaut
    }
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/contable-create', [ContableController::class, 'create'])->name('contable.create');
    Route::post('/contable-create', [ContableController::class, 'store'])->name('contable.store'); 
});
Route::get('/contable-salaire/{id}', [ContableController::class, 'createContable'])->name('contable.salaire');
Route::get('/contable-liste', [ContableController::class, 'index'])->name('contable.index');


Route::get('/contable/{id}/edit', [ContableController::class, 'edit'])->name('contable.edit');
Route::put('/contable/{id}', [ContableController::class, 'update'])->name('contable.update');
Route::delete('/contable/{id}', [ContableController::class, 'destroy'])->name('contable.destroy');

// les route de clients index et create 
Route::get('/client', [ClientController::class, 'index'])->name('client.index');
Route::post('/clients', [ClientController::class, 'store'])->name('clients.store');
Route::get('/client-create', [ClientController::class, 'create'])->name('client.create');
Route::get('/client-edite/{id}', [ClientController::class, 'edit'])->name('clients.edit');
//route de destroy
Route::delete('/client/{id}', [ClientController::class, 'destroy'])->name('clients.destroy');
//route de show
Route::get('/clients/profile/{clientId}', [TacheController::class, 'showClientProfile'])->name('clients.profile');
Route::post('/clients/{clientId}/tasks', [TacheController::class, 'storeTask'])->name('tasks.store');
Route::delete('/tasks/{taskId}', [TacheController::class, 'deleteTask'])->name('tasks.delete');
Route::put('/tasks/{taskId}', [TacheController::class, 'updateTask'])->name('tasks.update');
Route::get('/tasks/{taskId}/edit', [TacheController::class, 'editTaskForm'])->name('tasks.edit');


// Exemple de route pour le calendrier global des tâches
Route::get('/calendar/global', [TacheController::class, 'showGlobalCalendar'])
    ->name('tasks.calendar.global');

    Route::get('/calendar', [TacheController::class, 'index'])->name('calendar.index');
    Route::get('calendar/tasks', [TacheController::class, 'getTasksForCalendar'])->name('calendar.tasks');




    Route::get('clients-admin', [AdminController::class, 'indexClient'])->name('indexClient');
    Route::get('clients/edit/{id}', [AdminController::class, 'editClient'])->name('client.edit');
    Route::delete('clients/destroy/{id}', [AdminController::class, 'destroyClient'])->name('client.destroy');
    



require __DIR__.'/auth.php';
