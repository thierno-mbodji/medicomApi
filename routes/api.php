<?php

use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\CategoryController;
use App\Http\Controllers\API\MedicamentController;
use App\Http\Controllers\API\PharmacieController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);
Route::get('view-pharmacie', [PharmacieController::class, 'index']);
Route::get('edit-medicament/{id}', [MedicamentController::class, 'edit']);

Route::middleware('auth:sanctum')->group(function () {

    Route::get('/checkingAuthenticated', function () {
        return response()->json(['message' => 'Vous etes connecte', 'status' => 200], 200);
    });

    Route::post('store-pharmacie', [PharmacieController::class, 'store']);

    Route::get('edit-pharmacie/{id}', [PharmacieController::class, 'edit']);
    Route::put('update-pharmacie/{id}', [PharmacieController::class, 'update']);
    Route::delete('delete-pharmacie/{id}', [PharmacieController::class, 'delete']);

    Route::post('store-medicament', [MedicamentController::class, 'store']);
    Route::get('view-medicament', [MedicamentController::class, 'index']);

    Route::put('update-medicament/{id}', [MedicamentController::class, 'update']);
    Route::delete('delete-medicament/{id}', [MedicamentController::class, 'delete']);


    Route::post('logout', [AuthController::class, 'logout']);
});

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
