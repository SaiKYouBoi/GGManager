<?php

namespace App\Http\Controllers;

use App\Models\Tournament;
use App\Http\Requests\StoreTournamentRequest;
use App\Http\Requests\UpdateTournamentRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;

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
        $this->authorize('create', Tournament::class);

        $tournament = Tournament::create(
            $request->validated() + ['organizer_id' => Auth::user()->id, 'status' => 'open']
        );


        return response()->json($tournament, 201);
    }

    public function show(Tournament $tournament): JsonResponse
    {
        return response()->json(
            $tournament->load('organizer', 'matches')
        );
    }

    public function update(UpdateTournamentRequest $request, Tournament $tournament): JsonResponse
    {
        $this->authorize('update', $tournament);

        $tournament->update($request->validated());

        return response()->json($tournament);
    }

    public function destroy(Tournament $tournament): JsonResponse
    {
        $this->authorize('delete', $tournament);

        $tournament->delete();

        return response()->json(null, 204);
    }
}
