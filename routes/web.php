<?php

use App\Http\Controllers\etudiants;
use App\Http\Controllers\cours;
use App\Http\Controllers\matieres;
use App\Http\Controllers\enseignants;
use App\Http\Controllers\notes;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthEtudController;
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

Route::controller(AuthEtudController::class)->group(function() 
{
    Route::get('register', 'register')->name('register');
    Route::post('register', 'registerSave')->name('register.save');

    Route::get('/', 'login')->name('login');
    Route::post('login', 'loginAction')->name('login.action');
    Route::post('logout', 'logout')->middleware('auth')->name('logout');
    Route::middleware('auth')->get('index', 'index')->name('index');
    Route::middleware('auth')->get('index1', 'index1')->name('index1');
});

Route::middleware('auth')->group(function () {

    Route::resource('etudiants', 'App\Http\Controllers\etudiants');
    Route::resource('enseignants', 'App\Http\Controllers\enseignants');
    Route::resource('cours', 'App\Http\Controllers\cours');
    Route::resource('matieres', 'App\Http\Controllers\matieres');
    Route::resource('notes', 'App\Http\Controllers\notes');
    Route::get('/bulletin', [etudiants::class, 'generateBulletin'])->name('bulletin.generate');



    Route::get('/profile', [App\Http\Controllers\AuthEtudController::class, 'profile'])->name('profile');

     // Profile Route - Show Profile Page
     Route::get('/profile', [AuthEtudController::class, 'profile'])->name('profile');

     // Update Profile Route
     Route::put('/profile/update', [AuthEtudController::class, 'updateProfile'])->name('profile.update');
 
     // Update Password Route
     Route::put('/profile/password', [AuthEtudController::class, 'updatePassword'])->name('profile.password.update');

});




