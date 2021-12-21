<?php

namespace App\Http\Controllers;

use App\Models\Club;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\Club\StoreRequest;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\Club\UpdateRequest;
use App\Models\User;
use Carbon\Carbon;

class ClubsController extends Controller
{
    public function __construct()
    {
        $this->middleware(['role: Admin'])->except('show');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('app.club.index', [
            'clubs' => Club::latest()->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('app.club.create', [
            'players' => User::all([ 'id', 'name'])->except(1)
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  App\Http\Requests\Club\StoreRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {
        try {
            DB::transaction(function () use($request)
            {
                $imagePath = '';
    
                if ($request->hasFile('logo')) 
                {
                    $logo = $request->file('logo');
        
                    $fileName = time() . '_' . $logo->getClientOriginalName();
                    $filePath = $logo->storeAs('clubs', $fileName, 'public');
        
                    $imagePath = '/storage/' . $filePath;
                }
        
                $club = Club::create($request->validated() + [
                    'logo_path' => $imagePath
                ]);

                $club->players()->sync($request->user_ids);
            });
    
        } catch (\Throwable $th) {
            return Redirect::route('clubs.index')->with([
                'errorMessage' => $th->getMessage()
            ]);
        }

        return Redirect::route('clubs.index')->with([
            'messageOnSuccess' => 'Club created successfully'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Club  $club
     * @return \Illuminate\Http\Response
     */
    public function show(Club $club)
    {
        $club = Club::with('players')->find($club->id);

        return view('app.club.show', [
            'club' => $club
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Club  $club
     * @return \Illuminate\Http\Response
     */
    public function edit(Club $club)
    {
        $club = Club::with('players')->find($club->id);

        return view('app.club.edit', [
            'club' => $club,
            'players' => User::all([ 'id', 'name'])->except(1),
            'selectedPlayers' => $club->players->map->id->toArray()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Club\UpdateRequest  $request
     * @param  \App\Models\Club  $club
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, Club $club)
    {
        try {
            DB::transaction(function () use($request, $club)
            {
                $imagePath = '';
                
                $dataToUpdate = $request->validated();

                if ($request->hasFile('logo')) 
                {
                    $logo = $request->file('logo');
        
                    $fileName = time() . '_' . $logo->getClientOriginalName();
                    $filePath = $logo->storeAs('clubs', $fileName, 'public');
        
                    $imagePath = '/storage/' . $filePath;

                    $dataToUpdate = $dataToUpdate + [
                        'logo_path' => $imagePath
                    ];
                }

                $club->update($dataToUpdate);
                $club->players()->sync($request->user_ids);
            });
    
        } catch (\Throwable $th) {
            return Redirect::route('clubs.index')->with([
                'errorMessage' => $th->getMessage()
            ]);
        }

        return Redirect::route('clubs.index')->with([
            'messageOnSuccess' => 'Club updated successfully'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Club  $club
     * @return \Illuminate\Http\Response
     */
    public function destroy(Club $club)
    {
        $club->delete();

        return redirect()->back()->with([
            'messageOnSuccess' => 'Club deleted successfully'
        ]);
    }
}
