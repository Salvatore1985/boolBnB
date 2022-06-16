<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Apartment;
use Illuminate\Support\Facades\Http;

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
    public function create()
    {
        return view('User.apartments.create');
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
                'title' => 'required|string',
                'description' => 'required|string|min:10',
                'n_rooms' => 'required|numeric|min:1',
                'n_beds' => 'required|numeric|min:1',
                'n_floor' => 'required|numeric|min:1',
                'n_bathrooms' => 'required|numeric|min:1',
                'sqr_meters' => 'required|numeric|min:1',
                'street' => 'required|string',
                'house_number' => 'required|numeric',
                'city' => 'required|string',
                'price' => 'required|numeric|min:1',
            ]
        );

        $data = $request->all();
        $data['user_id'] = Auth::id();

        $address = $data['street'] . ' ' . $data['house_number'] . ' ' . $data['city'];

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
        //$newApartment->is_visible = true;
        $newApartment->save();

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
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $apartment = Apartment::findOrFail($id);
        return view('user.apartments.edit', ['apartment' => $apartment]);
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
        $data = $request->all();
        if (!array_key_exists('is_visible', $data)) $data['is_visibile'] = 0;

        $address = $data['street'] . ' ' . $data['house_number'] . ' ' . $data['city'];

        // TOMTOM api
        $response = Http::get("https://api.tomtom.com/search/2/geocode/$address.json", [
            'key' => 'SsllzLi6J5XLezFkwzq7gpR0xOCwBOzL',
            ])->json();
        $coordinates = $response['results'][0]['position'];
        $data['lat'] = $coordinates['lat'];
        $data['long'] = $coordinates['lon'];
        $data['address'] = $address;

        // creation new apartment
        $apartment->update($data);
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
