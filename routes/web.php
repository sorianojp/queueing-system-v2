<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\QueueController;
use App\Http\Controllers\RealtimeController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\DepartmentController;
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

Route::resource('departments', DepartmentController::class);
Route::delete('/deactivate/{department}',  [DepartmentController::class, 'deactivate'])->name('deactivate');
Route::get('/activate/{department}',  [DepartmentController::class, 'activate'])->name('activate');
Route::get('/', [QueueController::class, 'queueForm'])->name('queueForm');
Route::post('getQueue', [QueueController::class, 'getQueue'])->name('getQueue');
Route::get('/live', [QueueController::class, 'live'])->name('live');

Route::get('/reset', [QueueController::class, 'reset'])->name('reset');
Route::delete('/destroyunserve/{queue}', [QueueController::class, 'destroyunserve'])->name('destroyunserve');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::post('/callQueue', [QueueController::class, 'callQueue'])->name('callQueue');
    Route::post('/notify', [QueueController::class, 'notify'])->name('notify');
    Route::post('/served/{queue}', [QueueController::class, 'served'])->name('served');
    Route::get('/queues', [QueueController::class, 'queues'])->name('queues');

    Route::get('/reports', [ReportController::class, 'reports'])->name('reports');
});

Route::get('/deptqueues', [RealtimeController::class, 'deptqueues'])->name('deptqueues');
Route::get('/livequeues', [RealtimeController::class, 'livequeues'])->name('livequeues');
Route::get('/liveservings', [RealtimeController::class, 'liveservings'])->name('liveservings');

require __DIR__.'/auth.php';
