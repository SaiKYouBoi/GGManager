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
        $tournaments = Tournament::query()
            ->when(request('game'), fn($q, $game) => $q->where('game', $game))
            ->when(request('status'), fn($q, $status) => $q->where('status', $status))
            ->get();

        return response()->json($tournaments);
    }

    public function store(StoreTournamentRequest $request): JsonResponse
    {
        return response()->json([]);
    }

    public function show(Tournament $tournament): JsonResponse
    {
        return response()->json(
            $tournament->load('organizer', 'matches')
        );
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
