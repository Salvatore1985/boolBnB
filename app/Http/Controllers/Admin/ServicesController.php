<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Models\Service;

class ServicesController extends Controller
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
            $services = Service::orderBy('id', 'desc')->paginate('10');
            return view('admin.services.index', compact('services'));
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
            $service = new Service();
            return view('admin.services.create', compact('service'));
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
                'name.required' =>'Questo campo non più essere vuoto']);
        $user_id = Auth::id();

        if ($user_id == 1) {
            $data = $request->all();

            $service = new Service();
            $service->fill($data);

            $service->save();

            return redirect()->route('admin.services.index');
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
     * @param  Service $service
     * @return \Illuminate\Http\Response
     */
    public function edit(Service $service)
    {
        $user_id = Auth::id();

        if ($user_id == 1) {
            return view('admin.services.edit', compact('service'));
        } else {
            return redirect()->route('admin.dashboard');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Service $service
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Service $service)
    {
        $request->validate(
            ['name' => ['required', 'string','min:3'],
            'name.required' =>'Questo campo non più essere vuoto']);
        $user_id = Auth::id();

        if ($user_id == 1) {
            $data = $request->all();
            $service->fill($data);

            $service->save();

            return redirect()->route('admin.services.index');
        } else {
            return redirect()->route('admin.dashboard');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Service $service)
    {
        // $user_id = Auth::id();

        // if ($user_id == 1) {
        // $service->delete();
        // return redirect()->route('admin.services.index')->with('alert-message', 'Servizio eliminato con successo.')->with('alert-type', 'success');
        // }
    }
}
