<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AgentController;
use App\Http\Controllers\LeaderController;


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

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::get('/admin/regform', [AdminController::class, 'showRegForm'])->name('admin.regform');
    Route::post('/admin/regform', [AdminController::class, 'storeUser'])->name('admin.regform');
    Route::get('/admin/profile', [ProfileController::class, 'editAdmin'])->name('adminprofile.edit');
    Route::patch('/admin/profile', [ProfileController::class, 'updateAdmin'])->name('adminprofile.update');
    Route::get('/admin/userdata', [AdminController::class, 'showUsers'])->name('userdata.edit');
    Route::patch('/admin/userdata', [AdminController::class, 'updateUsers'])->name('userdata.update');
});

Route::middleware(['auth', 'role:leader'])->group(function () {
    Route::get('/leader/dashboard', [LeaderController::class, 'index'])->name('leader.dashboard');
    Route::get('/leader/profile', [ProfileController::class, 'editLeader'])->name('leaderprofile.edit');
    Route::patch('/leader/profile', [ProfileController::class, 'updateLeader'])->name('leaderprofile.update');
    Route::delete('/leader/profile', [ProfileController::class, 'destroyLeader'])->name('leaderprofile.destroy');
});

Route::middleware(['auth', 'role:agent'])->group(function () {
    Route::get('/agent/dashboard', [AgentController::class, 'index'])->name('agent.dashboard');
    Route::get('/agent/profile', [ProfileController::class, 'editAgent'])->name('agentprofile.edit');
    Route::patch('/agent/profile', [ProfileController::class, 'updateAgent'])->name('agentprofile.update');
    Route::delete('/agent/profile', [ProfileController::class, 'destroyAgent'])->name('agentprofile.destroy');
});
