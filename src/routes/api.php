<?php
use App\Http\Controllers\TournamentController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

// Routes Publiques
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);


Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::post('/logout', [AuthController::class, 'logout']);
    
   
    Route::get('/user', function (Request $request) {
        return $request->user();
    });
});

Route::apiResource('tournaments', TournamentController::class)
    ->only(['index', 'show']);

Route::middleware('auth:sanctum')->group(function () {
    Route::apiResource('tournaments', TournamentController::class)
        ->only(['store', 'update', 'destroy']);
});
