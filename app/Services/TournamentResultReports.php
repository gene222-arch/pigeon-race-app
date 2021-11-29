<?php

namespace App\Services;

use App\Models\User;
use App\Models\TournamentDetail;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Collection;

class TournamentResultReports 
{
    public function playerTournamentReports(): array
    {
        $result = DB::select(
            "SELECT	
                    users.id,
                    users.name as player,
                    clubs.name as club,
                    SUM(tournament_details.points) as players_total_points,
                    (
                        SELECT 
                            COUNT(*)
                        FROM 
                            tournament_details
                        WHERE 
                            tournament_details.user_id = users.id
                        GROUP BY 
                            tournament_details.user_id
                    ) as tournaments_joined_count
                FROM 
                    users 
                INNER JOIN 
                    club_users
                ON 
                    club_users.user_id = users.id 
                INNER JOIN 
                    clubs 
                ON 
                    clubs.id = club_users.club_id
                INNER JOIN 
                    tournament_details
                ON 	
                    tournament_details.user_id = users.id 
                GROUP BY 
                    users.id
                "
        );

        return $result;
    }
}