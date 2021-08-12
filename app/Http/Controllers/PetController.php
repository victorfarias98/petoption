<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Pets\Pet;
use App\Models\Pets\Breed;
use Illuminate\Http\Request;
use App\Models\Pets\Category;
use App\Models\Common\Address;
use Flasher\Laravel\Facade\Flasher;
use Flasher\Prime\FlasherInterface;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Database\Eloquent\Builder;

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
        $pet->founder_id =  Auth::user()->id;
        $request->validate([
            'thumb' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:4048',
        ]);
        $address = new Address;
        $address->zip_code = $request->address_zip_code;
        $address->street = $request->address_street;
        $address->number = $request->address_number;
        $address->district = $request->address_district;
        $address->city = $request->address_city;
        $address->state = $request->address_state;
        $address->country = 'Brasil';

        $imageName = $pet->nickname.time().'.'.$request->thumb->extension();
        $pet->thumb = $imageName;
        if($pet->save()){
            $request->thumb->move(public_path('pet_thumbs'), $imageName);
            $address->addressable_id = Pet::latest()->first()->id;
            $address->addressable_type = 'pet';
            if($address->save()){
                Flasher::addSuccess('Pet cadastrado com sucesso!');
                return redirect()->route('pets.index');
            }
            else{
                $pet->destroy($pet->id);
                Flasher::addError('Pet não cadastrado.');
                return back();
            }
        }
        Flasher::addError('Pet não cadastrado.');
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pets\Pet  $pet
     * @return \Illuminate\Http\Response
     */
    public function show(Pet $pet)
    {

        $address = Address::where('addressable_id', $pet->id)->first();
        $endereco = $address->street.' '.$address->number.' '.$address->district.' '.$address->city.' '.$address->state;
        $response = Http::get("https://nominatim.openstreetmap.org/search.php?q=$endereco&format=jsonv2");
        $lat = $response->json()[0]['lat'];
        $lon = $response->json()[0]['lon'];
        $display_name = $response->json()[0]['display_name'];
        $breed = $pet->breed;
        $category = $pet->category;
        $founder = User::find($pet->founder_id)->first();
        return view('pets.show', [
            "pet" => $pet ,
            "address" => $address,
            "lat" => $lat,
            "lon" => $lon,
            "display_name" => $display_name,
            "breed" => $breed,
            "category" => $category,
            "founder" => $founder
        ]);
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