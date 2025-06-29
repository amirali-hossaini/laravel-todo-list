<?php

use App\Http\Controllers\{HomeController, ProjectController, TaskController, UserController};
use Illuminate\Support\Facades\{Auth, Route};

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

Auth::routes([
    'reset' => false,
    'register' => false,
    'confirm' => false,
]);

Route::group(['middleware' => 'auth:web'], function () {

    Route::get('/', [HomeController::class, 'index'])->name('index');

    Route::resource('projects', ProjectController::class)->except('show');
    Route::get('/projects/{project:id}/tasks', [ProjectController::class, 'tasks'])->name('projects.tasks');

    Route::resource('tasks', TaskController::class)->except('create', 'index', 'show');

    Route::group(['middleware' => 'isAdmin'], function () {

        Route::resource('users', UserController::class)->except('show');
    });
});
