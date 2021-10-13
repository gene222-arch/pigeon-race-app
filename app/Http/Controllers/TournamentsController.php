<?php

namespace App\Http\Controllers;

use App\Http\Requests\Tournament\StoreUpdateRequest;
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
        return view('app.tournament.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Tournament\StoreUpdateRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUpdateRequest $request)
    {
        $data = [
            'is_public' => $request->is_public === 'on'
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
            'tournament' => $tournament
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
        $data = [
            'is_public' => $request->is_public === 'on'
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
