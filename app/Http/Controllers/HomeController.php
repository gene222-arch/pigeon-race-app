<?php

namespace App\Http\Controllers;

use App\Models\Tournament;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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
    public function index()
    {
        $isAdmin = Auth::user()->hasRole('Admin');

        $users = null;

        if ($isAdmin) 
        {
            $users = User::all()->filter(fn ($user) => !$user->hasRole('Admin'));

            DB::statement("SET sql_mode = '' ");

            $tournamentDetails = Tournament::with('details')
                ->withCount('details')
                ->groupBy('type')
                ->orderBy('type')
                ->get()
                ->map(fn ($tournament) => $tournament->details_count);

            return view('app.admin-dashboard', [
                'users' => $users,
                'tournaments' => $tournamentDetails
            ]);
        }

        return view('app.dashboard');
    }
}
