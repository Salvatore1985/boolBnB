<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Apartment;

class ApartmentController extends Controller
{
    public function index(Post $post)
    {
        $apartments= Apartment::paginate(5);
        return response()->json($apartments);
    }

    public function destroy($id)
    {
        //ROTTE  delete the resource
        Apartment::destroy($id);
        return response('',204);
    }
}
