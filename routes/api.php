<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CitizenController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::post('/citizen/add', [CitizenController::class, 'addCitizen']);
Route::delete('/citizen/delete/{id}', [CitizenController::class, 'deleteCitizen']);
Route::put('/citizen/update/{id}', [CitizenController::class, 'updateCitizen']);
Route::get('/citizen/all', [CitizenController::class, 'getAllCitizens']);

