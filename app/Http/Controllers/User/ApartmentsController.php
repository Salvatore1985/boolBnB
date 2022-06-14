<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Apartment;
use Illuminate\Http\Request;

class ApartmentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Apartment  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Apartment $apartment)
    {
        $data = $request->all();

        $apartment->address = $data["address"];
        $apartment->n_rooms = $data["n_rooms"];
        $apartment->description = $data["description"];
        $apartment->sqr_meters = $data["sqr_meters"];
        $apartment->n_bedss = $data["n_beds"];
        $apartment->n_bathrooms = $data["n_bathrooms"];
        $apartment->lat = $data["lat"];
        $apartment->long = $data["long"];
        $apartment->title = $data["title"];
        $apartment->is_visible = $data["is_visible"];
        $apartment->price = $data["price"];

        $apartment->save();

        return redirect()->route('user.apartment.show', $apartment)
        ->with('message', $data['title']. " è stato modificato con successo.");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
