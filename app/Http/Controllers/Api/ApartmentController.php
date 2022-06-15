<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Apartment;
use App\Models\Image;
/* use App\Models\Service;
use App\Models\Sponsorship; */


class ApartmentController extends Controller
{
    public function index(Apartment $apartmen)
    {
        // $apartments = Apartment::with(['image','service', 'sponsorship' ])
            $apartments = Apartment::with('images')
        ->inRandomOrder()
        ->paginate(6);
        return response()->json($apartments);
    }
    public function show($id)
    {
        $post = Apartment::with('images')->findOrFail($id);
        return response()->json(
            [
                'success' => true,
                'results' => $apartment,
                // 'author' => $post->user,
                // 'comments' => $post->comments,
            ]);
    }
    public function destroy($id)
    {
        //ROTTE  delete the resource
        Apartment::destroy($id);
        return response('',204);
    }


}
