<?php

use App\Http\Controllers\PageController;
use App\Http\Controllers\PatientsController;
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

Route::get('/', [PageController::class, 'home']);

Route::get('/about',  [PageController::class, 'about']);


Route::get('/patients/index' ,  [PatientsController::class, 'patients']);

Route::get('/patients/create', [PatientsController::class, 'create']);

Route::get('/patients/index/{id}/edit', [PatientsController::class, 'edit']);
Route::patch('/patients/index/{id}', [PatientsController::class, 'update']);

Route::delete('/patients/index/{id}/delete', [PatientsController::class, 'destroy']);


Route::post('/patients', [PatientsController::class, 'store']);

Route::get('/patients/json', [PatientsController::class, 'patientsJson']);

Route::get('/patients/recipes/{id}', [PatientsController::class, 'showPatientRecipes']);
