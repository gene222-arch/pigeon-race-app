<?php

namespace App\Http\Controllers;

use App\Http\Requests\Tournament\ClockInRequest;
use App\Http\Requests\Tournament\StoreUpdateRequest;
use App\Models\Club;
use App\Models\Tournament;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Redirect;

class TournamentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('app.tournament.index', [
            'tournaments' => Tournament::simplePaginate(10)
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
            'clubs' => Club::all(['id', 'name']),
            'players' => User::with('detail')->get(['id', 'name'])->except(1)
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
            'club_name' => $clubName
        ] + $request->validated();

        $tournament = Tournament::query()->create($data);

        $tournamentDetails = [];

        foreach ($request->player_ids as $playerId) {
            $tournamentDetails[] = [
                'user_id' => $playerId
            ];
        }

        $tournament->details()->createMany($tournamentDetails);

        return Redirect::route('tournaments.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tournament  $tournament
     * @return \Illuminate\Http\Response
     */
    public function show(Tournament $tournament)
    {
        $tournament = $tournament->with('details.user')->find($tournament)->first();

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
            'players' => User::with('detail')->get(['id', 'name'])->except(1)
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
        $request->user()
            ->activeTournament()
            ->update([
                'updated_at' => Carbon::now()
            ]);

        return view('app.dashboard');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tournament  $tournament
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tournament $tournament)
    {
        $tournament->delete();

        return redirect()->back()->with([
            'messageOnDeleteSuccess' => 'Tournament deleted successfully'
        ]);
    }
}
