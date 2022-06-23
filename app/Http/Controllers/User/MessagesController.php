<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Message;
use App\Models\Apartment;
use App\User;


use Illuminate\Support\Facades\Storage;


use Illuminate\Support\Facades\Http;
use Illuminate\Validation\Rule;

class MessagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {      
        $user_id = Auth::id();
        $apartments = Apartment::all();
        $messages = Message::all();
            if ($user_id == 1 or $user_id == $apartment->user_id) {    
                return view('user.home', ['apartment' => $apartment] , ['messages' => $messages]);
            } else {
                return redirect()->route('user.home');
            }
    }
    
        // $user_id = Auth::id();

        // if ($user_id == 1) {
        //     $apartments = Apartment::all();
        // } else {
        //     $apartments = Apartment::where('user_id', $user_id)->get();
        // }

        // return view('user.messagges.index', compact('apartments'));
    
    

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
        $user_id = Auth::id();

        $apartment = Apartment::findOrFail($id);
        if ($user_id == 1 or $user_id == $apartment->user_id) {
            return view('user.home', ['apartment' => $apartment]);
        } else {
            return redirect()->route('user.404');
    }
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $message = Message::findOrFail($id);
        $message->delete();

        return redirect()->route('user.home')->with("alert-message", $message->email_content . " è stato eliminato con successo!")->with('alter-type', 'warning');
    }
}
