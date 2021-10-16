<?php

namespace App\Http\Controllers;

use App\Http\Requests\Tournament\StoreUpdateRequest;
use App\Models\Club;
use App\Models\Tournament;
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
            'club_name' => $clubName
        ] + $request->validated();

        Tournament::create($data);

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
            'tournament' => $tournament,
            'clubs' => Club::all(['id', 'name'])
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
        $clubName = Club::find($request->club_id)->name;

        $data = [
            'is_public' => $request->is_public === 'on',
            'club_name' => $clubName
        ] + $request->validated();

        $tournament->update($data);

        return Redirect::route('tournaments.index');
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
