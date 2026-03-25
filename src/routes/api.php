<?php

use App\Http\Controllers\TournamentController;
use Illuminate\Support\Facades\Route;

Route::apiResource('tournaments', TournamentController::class)
    ->only(['index', 'show']);
