<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

use App\Http\Controllers\GitRepoController;

Route::middleware('auth')->group(function () {
    // Repository management routes
    Route::get('/dashboard', [GitRepoController::class, 'index'])->name('dashboard');
    Route::post('/submit-repo', [GitRepoController::class, 'submitRepo'])->name('submit-repo');
    Route::delete('/delete-repo/{id}', [GitRepoController::class, 'deleteRepo'])->name('delete-repo');
});

// Public repository serving route
Route::get('/repo/{uniqueId}/{repoName}', [GitRepoController::class, 'serveRepo'])
    ->where('uniqueId', '[a-f0-9]{13}')
    ->where('repoName', '[a-zA-Z0-9-_]+')
    ->name('serve-repo');
