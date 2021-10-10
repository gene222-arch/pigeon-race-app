<?php

namespace App\Http\Controllers;

use App\Http\Requests\MyPigeon\StoreRequest;
use App\Http\Requests\MyPigeon\UpdateRequest;
use App\Models\MyPigeon;

class MyPigeonsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('app.my-pigeon.index', [
            'myPigeons' => MyPigeon::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('app.my-pigeon.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\MyPigeon\StoreRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {
        MyPigeon::create($request->validated());

        return redirect('/my-pigeons', 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\MyPigeon  $myPigeon
     * @return \Illuminate\Http\Response
     */
    public function show(MyPigeon $myPigeon)
    {
        return view('app.my-pigeon.show', [
            'myPigeon' => $myPigeon
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\MyPigeon  $myPigeon
     * @return \Illuminate\Http\Response
     */
    public function edit(MyPigeon $myPigeon)
    {
        return view('app.my-pigeon.edit', [
            'myPigeon' => $myPigeon
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\MyPigeon\UpdateRequest  $request
     * @param  \App\Models\MyPigeon  $myPigeon
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, MyPigeon $myPigeon)
    {
        $myPigeon->update($request->validated());

        return redirect('/my-pigeons', 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MyPigeon  $myPigeon
     * @return \Illuminate\Http\Response
     */
    public function destroy(MyPigeon $myPigeon)
    {
        $myPigeon->delete();

        return redirect()->back()->with([
            'messageOnDeleteSuccess' => 'Pigeon deleted successfully'
        ]);
    }
}
