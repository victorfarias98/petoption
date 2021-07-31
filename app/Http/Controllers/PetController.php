<?php

namespace App\Http\Controllers;

use App\Models\Pets\Pet;
use App\Models\Pets\Breed;
use Illuminate\Http\Request;
use App\Models\Pets\Category;

class PetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $pets = Pet::simplePaginate(12);
        return view('pets.index', ['pets' => $pets]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $breeds = Breed::all();
        $categories = Category::all();
        return view('pets.create', [
            "breeds" => $breeds,
            "categories" => $categories
        ] );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $pet = new Pet;
        $pet->nickname = $request->nickname;
        $pet->description = $request->description;
        $pet->category_id = $request->category_id;
        $pet->breed_id = $request->breed_id;
        $request->validate([
            'thumb' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $imageName = $pet->nickname.time().'.'.$request->thumb->extension();
        $request->thumb->move(public_path('pet_thumbs'), $imageName);
        $pet->thumb = $imageName;
        if($pet->save()){
            return redirect()->route('pets.index');
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
        return view('pets.show', ['pet' => $pet]);
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