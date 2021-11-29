<?php

use App\Models\TournamentDetail;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;

class TournamentResultReports 
{
    public function playerRankingByPoints(): Collection
    {
        $result = TournamentDetail::query()
            ->with('user')
            ->selectRaw("user_id, SUM(points) as total_points")
            ->groupBy('user_id')
            ->orderBy('total_points', 'DESC')
            ->get();

        return $result;
    }

    public function playerTournamentReports(): Collection
    {
        $result = User::query()
            ->role('User')
            ->withCount('tournaments')
            ->get();

        return $result;
    }
}