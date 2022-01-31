<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Club;
use App\Models\User;
use App\Models\Tournament;
use App\Models\QrCodeGenerator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\Tournament\ClockInRequest;
use App\Http\Requests\Tournament\StoreUpdateRequest;
use Illuminate\Support\Facades\Auth;

class TournamentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $timeStartedAt = null;

        $hasActiveTournaments = Tournament::query()
            ->where('is_active', '=', true)
            ->exists();

        $activeStartedTournament = Tournament::query()
            ->firstWhere([
                [ 'is_active', '=', true ],
                [ 'time_started_at', '!=', null ]
            ]);

        if ($activeStartedTournament) {
            $timeStartedAt = $activeStartedTournament->time_started_at;
        }

        $tournaments = Tournament::query()
            ->orderBy('is_active', 'DESC')
            ->simplePaginate(10);

        return view('app.tournament.index', [
            'tournaments' => $tournaments,
            'hasActiveTournaments' => $hasActiveTournaments,
            'timeStartedAt' => $timeStartedAt
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('app.tournament.create', [
            'clubs' => Club::all(['id', 'name'])
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Tournament\StoreUpdateRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUpdateRequest $request)
    {
        $clubName = Club::find($request->club_id)->name;

        $data = [
            'is_public' => $request->is_public === 'on',
            'club_name' => $clubName,
            'legs' => 3
        ];

        $data = $data + $request->validated();

        $tournament = Tournament::query()->create($data);

        return Redirect::route('tournaments.index');
    }

    public function showPlayersViaClub(Club $club)
    {
        $players = User::query()
            ->whereHas('clubUsers', fn ($q) => $q->club_id = $club->id)
            ->with('detail')
            ->get(['id', 'name'])
            ->except(1);
            
        return view('app.tournament.create', [
            'players' => $players
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tournament  $tournament
     * @return \Illuminate\Http\Response
     */
    public function show(Tournament $tournament)
    {
        if (! Auth::user()->hasRole('Admin')) {
            $userCanViewTournament = $tournament->club_name === Auth::user()->club()?->name;
            if (! $userCanViewTournament) abort(403);
        }

        $tournament = Tournament::with([
            'details' => fn ($q) => $q->orderBy('points', 'DESC')->orderBy('speed_per_minute', 'DESC')
        ])
            ->find($tournament->id);

        return view('app.tournament.show', [
            'tournament' => $tournament
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tournament  $tournament
     * @return \Illuminate\Http\Response
     */
    public function edit(Tournament $tournament)
    {
        return view('app.tournament.edit', [
            'tournament' => Tournament::with('details')->find($tournament->id),
            'clubs' => Club::all(['id', 'name']),
            'players' => Club::firstWhere('name', $tournament->club_name)->players
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Tournament\StoreUpdateRequest  $request
     * @param  \App\Models\Tournament  $tournament
     * @return \Illuminate\Http\Response
     */
    public function update(StoreUpdateRequest $request, Tournament $tournament)
    {
        $playerIds = collect($request->player_ids)->map(fn ($id) => [ 'user_id' => $id ])->toArray();
        $clubName = Club::find($request->club_id)->name;

        $data = [
            'is_public' => $request->is_public === 'on',
            'club_name' => $clubName
        ] + $request->validated();

        $tournament->update($data);

        if (! $tournament->details->count()) {
            $tournament->details()->createMany($playerIds);
        } else {
            $tournament->details()->delete();
            $tournament->details()->createMany($playerIds);
        }

        return Redirect::route('tournaments.index');
    }

    public function clockIn(ClockInRequest $request)
    {
        $user = $request->user();

        $clubNames = Tournament::query()
            ->where('is_active', '=', 1)
            ->get()
            ->map 
            ->club_name;


        $clubIsInAnActiveTournament = $clubNames->filter(fn ($club) => $club === $user->club()->name)->count();

        if (! $clubIsInAnActiveTournament) {
            return redirect()->back()->with([
                'messageOnFailed' => 'Your club had not joined any tournament.'
            ]);
        }

        $activeTournament = $user->activeTournamentDetails();

        if (! $activeTournament) {
            return redirect()->back()->with([
                'messageOnFailed' => 'Sorry your`re not included in the tournament.'
            ]);
        }

        if ($activeTournament->leg_3_meter_per_minute) {
            return redirect()->back()->with([
                'messageOnFailed' => 'Sorry you`ve finished the tournament.'
            ]);
        }

        $legOneMeterPerMin = $activeTournament->leg_1_meter_per_minute;
        $legTwoMeterPerMin = $activeTournament->leg_2_meter_per_minute;

        $timeStarted = $request->user()->activeTournament()->time_started_at;
        $clockedInTime = Carbon::now()->toTimeString();

        $to = Carbon::parse($clockedInTime);
        $from = Carbon::parse($timeStarted);
        $distance = ($user->detail->coordinate->distance_in_km * 1000);

        $diffInMinutes = $to->diffInMinutes($from);
        $currentLapSpeedPerMin = ($distance / $diffInMinutes);

        $speedPerMinute = 0;

        $data = [
            'updated_at' => Carbon::now(),
            'points' => DB::raw('points + 1')
        ];

        if (! $legOneMeterPerMin) 
        {
            $speedPerMinute = ($currentLapSpeedPerMin / 3);

            $data = $data + [
                'leg_1_meter_per_minute' => $currentLapSpeedPerMin
            ];
        }

        if ($legOneMeterPerMin && !$legTwoMeterPerMin) 
        {
            $speedPerMinute = ($legOneMeterPerMin + $currentLapSpeedPerMin) / 3;

            $data = $data + [
                'leg_2_meter_per_minute' => $currentLapSpeedPerMin
            ];
        }

        if ($legOneMeterPerMin && $legTwoMeterPerMin) 
        {
            $speedPerMinute = ($legOneMeterPerMin + $legTwoMeterPerMin + $currentLapSpeedPerMin) / 3;

            $data = $data + [
                'leg_3_meter_per_minute' => $currentLapSpeedPerMin
            ];
        }

        $data = $data + [
            'speed_per_minute' => $speedPerMinute
        ];

        $activeTournament->update($data);

        QrCodeGenerator::query()
            ->firstWhere('value', '=', $request->qr_code)
            ->markAsUsed();

        return redirect()->back()->with([
            'messageOnSuccess' => 'Clocked in successfully'
        ]);
    }

    public function startTimeToActiveTournaments()
    {
        Tournament::query()
            ->where([
                [ 'is_active', '=', true ],
                [ 'time_started_at', '=', null ]
            ])
            ->update([
                'time_started_at' => Carbon::now()->toTimeString()
            ]);

        return redirect()->back()->with([
            'messageOnSuccess' => 'Race has started successfully'
        ]);
    }

    public function restartTimeToActiveTournaments()
    {
        Tournament::query()
            ->where('is_active', '=', true)
            ->update([
                'time_started_at' => NULL
            ]);

        return redirect()->back()->with([
            'messageOnSuccess' => 'Time has restarted successfully'
        ]);
    }

    public function finish()
    {
        Tournament::query()
            ->where('is_active', '=', true)
            ->update([
                'is_active' => false,
                'ended_at' => Carbon::now()
            ]);

        return redirect()->back()->with([
            'messageOnSuccess' => 'Tournament has ended successfully'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tournament  $tournament
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tournament $tournament)
    {
        $tournament->details()->delete();
        $tournament->delete();

        return redirect()->back()->with([
            'messageOnDeleteSuccess' => 'Tournament deleted successfully'
        ]);
    }
}
