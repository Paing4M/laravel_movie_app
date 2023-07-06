<?php

use App\Http\Controllers\ActorsController;
use App\Http\Controllers\AddToListController;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TvShowController;
use App\Http\Controllers\YourListController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [MovieController::class, 'index'])->name('movies');
Route::get('/addList/{id}', [AddToListController::class, 'index'])->name('addList');

Route::get('/movies/{id}', [MovieController::class, 'show'])->name('show_movie');

Route::get('/tv', [TvShowController::class, 'index'])->name('tv');
Route::get('/tv/{id}', [TvShowController::class, 'show'])->name('show_tv');

Route::get('/your-list', [YourListController::class, 'index'])->name('your_list');

Route::get('/actors', [ActorsController::class, 'index'])->name('actors');
Route::get('/actors/page/{page?}', [ActorsController::class, 'index']);

Route::get('/actors/{id}', [ActorsController::class, 'show'])->name('show_actor');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
