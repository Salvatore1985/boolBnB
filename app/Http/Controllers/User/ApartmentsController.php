<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Apartment;
use App\Models\Service;
use App\Models\Image;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Http;
use Illuminate\Validation\Rule;

class ApartmentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $apartments = Apartment::where('user_id',  Auth::user()->id)->orderBy('id', 'desc')->paginate(10);
        return view('user.apartments.index', compact('apartments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Apartment $apartment, Service $service)
    {

        $apartment= Apartment::all();
        $services = Service::all();
        return view('User.apartments.create', ['services' => $services, 'apartment' => $apartment]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate(
            [
                'title' => 'required|string|unique:apartments|min:3',
                'description' => 'required|string|min:10',
                'n_rooms' => 'required|numeric|min:1',
                'n_beds' => 'required|numeric|min:1',
                'n_floor' => 'required|numeric|min:1',
                'n_bathrooms' => 'required|numeric|min:1',
                'sqr_meters' => 'required|numeric|min:1',
                'address' => 'required|string',
                'service' => 'required',
                'price' => 'required|numeric|min:1',
            ] ,
            [
                /* 'required' => 'Devi riempire il campo :attribute', */
                'title.required'=>'Devi inserire il titolo',
                'title.min'=>'Il minimo dei carattere del titolo deve essere di :min',
                'title.unique'=>"Il titolo ''$request->title'' esiste già ",
                'description.required'=>'Devi inserire la descrizione',
                'description.min'=>'Il minimo dei carattere della descrizione deve essere di :min',
                'n_rooms.required'=>'Devi il numero delle stanze',
                'n_rooms.min'=>'Il numero delle stanze deve essere più di :min',
                'n_beds.required'=>'Devi il numero dei letti',
                'n_beds.min'=>'Il numero dei letti deve essere più di :min',
                'n_floor.required'=>'Devi il numero dei piani',
                'n_floor.min'=>'Il numero dei piani deve essere più di :min',
                'n_bathrooms.required'=>'Devi il numero dei bagni',
                'n_bathrooms.min'=>'Il numero dei bagni deve essere più di :min',
                'sqr_meters.required'=>'Devi il numero dei mq',
                'sqr_meters.min'=>'Il numero dei mq deve  essere più di :min',
                'address.required'=>'Devi il numero dei mq',
                'price.required'=>'Devi il numero il prezzo',
                'price.min'=>'Il prezzo non può essere inferiore a :min €',
                'images' => 'required'
            ]
        );


        // ***********
        $data = $request->all();
        $data['user_id'] = Auth::id();
        $address = $data['address'];
        // TOMTOM api
        $response = Http::get("https://api.tomtom.com/search/2/geocode/$address.json", [
            'key' => 'SsllzLi6J5XLezFkwzq7gpR0xOCwBOzL',
            ])->json();
        $coordinates = $response['results'][0]['position'];
        $data['lat'] = $coordinates['lat'];
        $data['long'] = $coordinates['lon'];
        $data['address'] = $address;

        // creation new apartment
        $newApartment = new Apartment();
        $newApartment->fill($data);
        $newApartment->save();
        if (array_key_exists('services', $data))
        $apartment->services()->attach($data['services']);


        // creating new Images
        if(array_key_exists('images', $data))
        $newImage = new Image();
        $newImage->apartment_id = $newApartment->id;
        $newImage->link= Storage::put('upload', $data['images']);
        $newImage->save();

        return redirect()->route('user.apartments.show', $newApartment->id)->with('message', $data['title']. " è stato pubblicato con successo.");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $apartment = Apartment::findOrFail($id);
        return view('user.apartments.show', ['apartment' => $apartment]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @param Service $services
     * @return \Illuminate\Http\Response
     */
    public function edit($id, Service $services)
    {

        $services = Service::all();
        $apartment = Apartment::findOrFail($id);
        return view('user.apartments.edit', ['apartment' => $apartment, 'services' => $services]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  id  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Apartment $apartment)
    {
        $request->validate(
            [
                'title' => ['required', 'string', Rule::unique('apartments')->ignore($apartment->id), 'min:3'],
                'description' => 'required|string|min:10',
                'n_rooms' => 'required|numeric|min:1',
                'n_beds' => 'required|numeric|min:1',
                'n_floor' => 'required|numeric|min:1',
                'n_bathrooms' => 'required|numeric|min:1',
                'sqr_meters' => 'required|numeric|min:1',
                'address' => 'required|string',
                'service' => 'required',
                'price' => 'required|numeric|min:1',
            ] ,
            [
                /* 'required' => 'Devi riempire il campo :attribute', */
                'title.required'=>'Questo campo non più essere vuoto',
                'title.min'=>'Il minimo dei carattere del titolo deve essere di :min',
                'title.unique'=>"Il titolo ''$request->title'' esiste già ",
                'description.required'=>'Devi inserire la descrizione',
                'description.min'=>'Il minimo dei carattere della descrizione deve essere di :min',
                'n_rooms.required'=>'Devi il numero delle stanze',
                'n_rooms.min'=>'Il numero delle stanze deve essere più di :min',
                'n_beds.required'=>'Devi il numero dei letti',
                'n_beds.min'=>'Il numero dei letti deve essere più di :min',
                'n_floor.required'=>'Devi il numero dei piani',
                'n_floor.min'=>'Il numero dei piani deve essere più di :min',
                'n_bathrooms.required'=>'Devi il numero dei bagni',
                'n_bathrooms.min'=>'Il numero dei bagni deve essere più di :min',
                'sqr_meters.required'=>'Devi il numero dei mq',
                'sqr_meters.min'=>'Il numero dei mq deve  essere più di :min',
                'address.required'=>'Questo campo non più essere vuoto',
                'price.required'=>'Devi il numero il prezzo',
                'price.min'=>'Il prezzo non può essere inferiore a :min €',

            ]
        );

        $data = $request->all();
        if (!array_key_exists('is_visible', $data)) $data['is_visibile'] = 0;

        $address = $data['address'];

        // TOMTOM api
        $response = Http::get("https://api.tomtom.com/search/2/geocode/$address.json", [
            'key' => 'SsllzLi6J5XLezFkwzq7gpR0xOCwBOzL',
            ])->json();
        $coordinates = $response['results'][0]['position'];
        $data['lat'] = $coordinates['lat'];
        $data['long'] = $coordinates['lon'];
        $data['address'] = $address;
        // $apartment->is_visible = $data['is_visible'];
        // creation new apartment
        $apartment->fill($data);
        if (!array_key_exists('services', $data) && $apartment->services)
            $apartment->services()->detach();
        else
        $apartment->services()->sync($data['services']);
        $apartment->save();
        return redirect()->route('user.apartments.show', $apartment->id)->with('message', $data['title']. " è stato pubblicato con successo.");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Apartment $apartment)
    {
        $apartment->delete();
        return redirect()->route("user.apartments.index", $apartment)->with("alert-message","Apartment è stato eliminato con successo!")->with('alter-type', 'warning');

    }
}
