<?php

namespace App\Http\Controllers;

use App\Models\Tournament;
use App\Http\Requests\StoreTournamentRequest;
use App\Http\Requests\UpdateTournamentRequest;
use Illuminate\Http\JsonResponse;

class TournamentController extends Controller
{
    public function index(): JsonResponse
    {
        return response()->json([]);
    }

    public function store(StoreTournamentRequest $request): JsonResponse
    {
        return response()->json([]);
    }

    public function show(Tournament $tournament): JsonResponse
    {
        return response()->json([]);
    }

    public function update(UpdateTournamentRequest $request, Tournament $tournament): JsonResponse
    {
        return response()->json([]);
    }

    public function destroy(Tournament $tournament): JsonResponse
    {
        return response()->json([]);
    }
}
