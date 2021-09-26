<?php

use App\Http\Controllers\PagesController;
use App\Http\Controllers\PostsController;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::get('/',[PagesController::class,'index']);
Route::get('/recipes/my_recipe/{id}',[PagesController::class,'show_my_recipes']);
Auth::routes();


Route::resource('/recipes',PostsController::class);
//Route::get('/recipe',[PagesController::class,'recipes']);
Route::get('/profile',[PagesController::class,'display_profile']);

//Route::get('/home', [\App\Http\Controllers\HomeController::class, 'index'])->name('home');

