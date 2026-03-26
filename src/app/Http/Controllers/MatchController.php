<?php

namespace App\Http\Controllers;

use App\Events\ScoreUpdated;
use App\Models\GameMatch;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class MatchController extends Controller
{
    public function updateScore(Request $request, GameMatch $match): JsonResponse
    {
        $data = $request->validate([
            'score_player1' => ['required', 'integer', 'min:0'],
            'score_player2' => ['required', 'integer', 'min:0'],
        ]);

        $data['winner_id'] = match(true) {
            $data['score_player1'] > $data['score_player2'] => $match->player1_id,
            $data['score_player2'] > $data['score_player1'] => $match->player2_id,
            default => null,
        };

        $data['status'] = 'finished';

        $match->update($data);

        broadcast(new ScoreUpdated($match))->toOthers();

        return response()->json($match);
    }
}
