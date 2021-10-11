<?php

use App\Http\Controllers\PageController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PatientsController;
use App\Http\Controllers\RecipesController;
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

Route::get('/admin', [AdminController::class, 'admin']); 
Route::patch('/admin', [AdminController::class, 'rights'])->middleware('auth');

Route::get('/', [PageController::class, 'home']);

Route::get('/about',  [PageController::class, 'about']);

Route::get('/patients/index' ,  [PatientsController::class, 'patients']);

Route::get('/patients/create', [PatientsController::class, 'create']);

Route::get('/patients/index/{id}/edit', [PatientsController::class, 'edit']);
Route::patch('/patients/index/{id}', [PatientsController::class, 'update']);

Route::delete('/patients/index/{id}/delete', [PatientsController::class, 'destroy']);

Route::post('/patients', [PatientsController::class, 'store']);

Route::get('/patients/json', [PatientsController::class, 'patientsJson']);





Route::get('/recipes/{id}', [RecipesController::class, 'showPatientRecipes']);

Route::post('/recipes/{id}', [RecipesController::class, 'store']);
Route::get('/recipes/create/{id}', [RecipesController::class, 'create']);

Route::get('/recipes/index/{id}/edit', [RecipesController::class, 'edit']);
Route::patch('/recipes/index/{id}', [RecipesController::class, 'update']);

Route::delete('/recipes/index/{id}/delete', [RecipesController::class, 'destroy']);



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

