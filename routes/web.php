<?php

use App\Http\Controllers\Auth\LoginRegisterController;
use App\Http\Controllers\AuthentificationController;
use App\Http\Controllers\ForgetpasswordController;
use App\Http\Controllers\GroupeController;
use App\Http\Controllers\PermissionController;
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

//assignPerToGroup
Route::get('/home', function () {
    return view('test');
});

Route::get('/', function () {
    return view('login');
});
Route::get('/sinup', function () {
    return view('sinup');
});


Route::get('/dashbord', function () {
    return view('dashbord');
});

Route::get('/Ajouter/group', function () {
    return view('ajouterRoles');
});

Route::get('/Ajouter/Per', function () {
    return view('ajoutePer');
});
Route::get('/Assign/User', [GroupeController::class, 'indexAssignUserToGroup'])->name('Assign.User');

Route::get('/Assign/Per', [PermissionController::class, 'indexassignPerToGroup'])->name('assignPerToGroup');
