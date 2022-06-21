<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Sponsorship;
use App\User;


class SponsorshipsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_id = Auth::id();

        if ($user_id == 1) {
            $sponsorships = Sponsorship::all();
            return view('admin.sponsorships.index', compact('sponsorships'));
        } else {
            return redirect()->route('admin.dashboard');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user_id = Auth::id();

        if ($user_id == 1) {
            return view('admin.sponsorships.create');
        } else {
            return redirect()->route('admin.dashboard');
        }
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
            ['name' => ['required', 'string','min:3'],
            'period' => ['required', 'string','min:3'],
            'price' => ['required','min:3'],
            ['name.required' =>'Questo campo non più essere vuoto',
            'nperiod' =>'Devi inserire le max ore',
            'price' =>'Questo campo non più essere vuoto']
        ]);
        $user_id = Auth::id();

        if ($user_id == 1) {
            $data = $request->all();

            $sponsorship = new sponsorship();
            $sponsorship->fill($data);

            $sponsorship->save();

            return redirect()->route('user.sponsorships.index');
        } else {
            return redirect()->route('admin.dashboard');
        }
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
     * @param  Sponsorship $sponsorship
     * @return \Illuminate\Http\Response
     */
    public function edit(Sponsorship $sponsorship)
    {
        $user_id = Auth::id();

        if ($user_id == 1) {
            $spnsorship;
            return view('admin.sponsorships.edit', compact('sponsorship'));
        } else {
            return redirect()->route('admin.dashboard');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Sponsorship $sponsorship
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Sponsorship $sponsorship)
    {
        $request->validate(
            ['name' => ['required', 'string','min:3'],
            'period' => ['required', 'string','min:3'],
            'price' => ['required','min:3'],
            ['name.required' =>'Questo campo non più essere vuoto',
            'nperiod' =>'Devi inserire le max ore',
            'price' =>'Questo campo non più essere vuoto']
        ]);
        $user_id = Auth::id();

        if ($user_id == 1) {
            $data = $request->all();
            $sponsorship->fill($data);

            $sponsorship->save();

            return redirect()->route('user.sponsorships.index');
        } else {
            return redirect()->route('user.dashboard');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Sponsorship $sponsorship
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sponsorship $sponsorship)
    {
        $user_id = Auth::id();
        if ($user_id == 1) {
        $sponsorship->delete();
        return redirect()->route('user.sponsorships.index')->with('alert-message', 'la sponsorrizzazione è stato eliminato con successo.')->with('alert-type', 'success');
        }
    }
}
