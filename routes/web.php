<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\AppController;
use App\Http\Controllers\Admin\UserController as AdminUserController;
use Illuminate\Http\Request;


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

Route::middleware(['auth'])->group(function () {
    Route::get('/', [AppController::class, 'index']);

    Route::name('admin.')->prefix('admin')->group(function () {
        Route::middleware(['can:Usuarios'])->resource('usuarios', AdminUserController::class)->missing(function (Request $request) {
            return redirect(route('admin.usuarios.index'))->with('status', 'El usuario no existe!');
        });
    });
});


Route::post('/login', [LoginController::class, 'store'])
    ->middleware(array_filter([
        'guest',
        'throttle:30,1'
    ]));
