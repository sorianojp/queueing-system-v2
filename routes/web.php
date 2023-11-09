<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\QueueController;
use App\Http\Controllers\RealtimeController;
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

Route::get('/', [QueueController::class, 'queueForm'])->name('queueForm');
Route::post('getQueue', [QueueController::class, 'getQueue'])->name('getQueue');
Route::get('/queues', [QueueController::class, 'queues'])->name('queues');
Route::post('/callQueue', [QueueController::class, 'callQueue'])->name('callQueue');
Route::post('/served/{queue}', [QueueController::class, 'served'])->name('served');
Route::get('/live', [QueueController::class, 'live'])->name('live');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::get('/livequeues', [RealtimeController::class, 'livequeues'])->name('livequeues');
Route::get('/liveservings', [RealtimeController::class, 'liveservings'])->name('liveservings');

require __DIR__.'/auth.php';
