<?php

namespace App\Http\Controllers;

use App\Models\MyPigeon;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\MyPigeon\StoreRequest;
use App\Http\Requests\MyPigeon\UpdateRequest;
use App\Http\Requests\MyPigeon\ImageUploadRequest;

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
            'myPigeons' => MyPigeon::latest()->get()
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
        $imagePath = '';

        if ($request->hasFile('image')) 
        {
            $image = $request->file('image');

            $fileName = time() . '_' . $image->getClientOriginalName();
            $filePath = $image->storeAs('my-pigeons', $fileName, 'public');

            $imagePath = '/storage/' . $filePath;
        }

        MyPigeon::create($request->validated() + [
            'image_path' => $imagePath
        ]);

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
        $imagePath = $myPigeon->image_path;

        if ($request->hasFile('image')) 
        {
            $image = $request->file('image');

            $fileName = time() . '_' . $image->getClientOriginalName();
            $filePath = $image->storeAs('my-pigeons', $fileName, 'public');

            $imagePath = '/storage/' . $filePath;
        }

        $myPigeon->update($request->validated() + [
            'image_path' => $imagePath
        ]);

        return Redirect::route('my-pigeons.index');
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
