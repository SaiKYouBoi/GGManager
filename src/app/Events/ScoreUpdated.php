<?php

namespace App\Events;

use App\Models\GameMatch;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class ScoreUpdated implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public function __construct(public GameMatch $match) {}

    public function broadcastOn(): Channel
    {
        return new Channel('tournament.' . $this->match->tournament_id);
    }

    public function broadcastWith(): array
    {
        return [
            'match_id'      => $this->match->id,
            'score_player1' => $this->match->score_player1,
            'score_player2' => $this->match->score_player2,
            'winner_id'     => $this->match->winner_id,
        ];
    }
}
