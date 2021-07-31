<?php

namespace App\Http\Controllers;

use App\Models\Pets\Pet;
use Illuminate\Http\Request;

class PetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $pets = Pet::all();
        return view('pets.index', ['pets' => $pets]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pets.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // var_dump(json_encode($request->all()));
        // exit;
        $pet = new Pet;
        $pet->nickname = $request->nickname;
        $pet->description = $request->description;
        $pet->category_id = $request->category_id;
        $pet->breed_id = $request->breed_id;
        $request->validate([
            'file' => 'required|mimes:png,jpg,jpeg,gif'
        ]);
        $path = $request->file('thumb')->storeAs(
            'thumb',  $pet->nickname
        );
        $pet->thumb = $path;

        if($pet->save()){
            $pets = Pet::all();
            return view('pets.index', ['pets' => $pets]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pets\Pet  $pet
     * @return \Illuminate\Http\Response
     */
    public function show(Pet $pet)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pets\Pet  $pet
     * @return \Illuminate\Http\Response
     */
    public function edit(Pet $pet)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pets\Pet  $pet
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pet $pet)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pets\Pet  $pet
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pet $pet)
    {
        //
    }
}
