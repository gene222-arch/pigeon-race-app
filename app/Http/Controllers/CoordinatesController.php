<?php

namespace App\Http\Controllers;

use App\Http\Requests\Coordinate\StoreUpdateRequest;
use App\Models\Coordinate;
use Illuminate\Support\Facades\Redirect;

class CoordinatesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('app.coordinate.index', [
            'coordinates' => Coordinate::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('app.coordinate.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Coordinate\StoreUpdateRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUpdateRequest $request)
    {
        Coordinate::create($request->validated());

        return redirect('/coordinates', 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Coordinate  $coordinate
     * @return \Illuminate\Http\Response
     */
    public function show(Coordinate $coordinate)
    {
        return view('app.coordinate.show', [
            'coordinate' => $coordinate
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Coordinate  $coordinate
     * @return \Illuminate\Http\Response
     */
    public function edit(Coordinate $coordinate)
    {
        return view('app.coordinate.edit', [
            'coordinate' => $coordinate
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Coordinate\StoreUpdateRequest  $request
     * @param  \App\Models\Coordinate  $coordinate
     * @return \Illuminate\Http\Response
     */
    public function update(StoreUpdateRequest $request, Coordinate $coordinate)
    {
        $coordinate->update($request->validated());

        return Redirect::route('coordinates.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Coordinate  $coordinate
     * @return \Illuminate\Http\Response
     */
    public function destroy(Coordinate $coordinate)
    {
        $coordinate->delete();

        return redirect()->back()->with([
            'messageOnDeleteSuccess' => 'Coordinate deleted successfully'
        ]);
    }
}
