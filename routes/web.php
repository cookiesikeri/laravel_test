<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

route::get('404', ['as'=> '404', 'uses' =>
'ErrorController@notfound']);
route::get('500', ['as'=> '505', 'uses' =>
'ErrorController@fatal']);
Route::get('/logout', [HomeController::class, 'logout'])->name('logout');

Auth::routes();

Route::get('/', [HomeController::class, 'Index']);

Route::get('/dashboard', [HomeController::class, 'Index']);

Route::post('/add/task', [HomeController::class, 'addTask'])->name('add.task');
Route::get('/pending/tasks', [HomeController::class, 'PendingTask'])->name('pending.tasks');
Route::get('/all/tasks', [HomeController::class, 'AllTasks'])->name('all.tasks');
Route::get('/complete/tasks', [HomeController::class, 'Completetask'])->name('complete.tasks');
Route::get('/edit/task/{id}', [HomeController::class, 'Edittask'])->name('edit.tasks');
Route::put('tasks/{id}', [HomeController::class, 'Updatetask'])->name('update.tasks');
Route::get('tasks/{id}', [HomeController::class, 'TaskShow']);
Route::get('delete/task/{id}', [HomeController::class, 'deleteTask']);
Route::get('deletetask/{id}', [HomeController::class, 'deleteTask'])->name('deletetask');
Route::get('edittask/{id}', [HomeController::class, 'editTasks'])->name('task.edit');
