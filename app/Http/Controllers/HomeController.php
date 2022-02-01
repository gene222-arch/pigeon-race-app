<?php

namespace App\Http\Controllers;

use App\Models\Tournament;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Services\TournamentResultReports;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(TournamentResultReports $reports)
    {
        $isAdmin = Auth::user()->hasRole('Admin');

        if ($isAdmin) 
        {
            DB::statement("SET sql_mode = '' ");

            $tournamentDetails = Tournament::with('details')
                ->withCount('details')
                ->groupBy('type')
                ->orderBy('type')
                ->get()
                ->mapToGroups(fn ($tournament, $key) => [$tournament['type'] => $tournament->details_count]);

            $data = collect([
                "North Race" => 0,
                "South Race" => 0,
                "Summer Race" => 0
            ]);

            foreach ($tournamentDetails as $key => $value) {
                $data[$key] = $value->sum();
            }

            return view('app.admin-dashboard', [
                'userTournamentReports' => $reports->playerTournamentReports(),
                'tournaments' => $data
            ]);
        }

        return view('app.dashboard');
    }
}
