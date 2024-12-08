<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestController;
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

                    /*aller sur un site grace au controller*/
/*une possibiloté d'aller sur notre site test.blade 
Route::get('/', [TestController ::class , 'moi ']);
*/
/*une autre manière d'aller sur notre site test.blade*/
Route::get('/', 'App\Http\Controllers\postController@index')->name("bienvenu");
Route::get('/posts/{id}', 'App\Http\Controllers\postController@show');
Route::get('/contact', 'App\Http\Controllers\postController@contact')->name("contact");
