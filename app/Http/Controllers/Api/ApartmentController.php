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
       /*  ->inRandomOrder() */
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
                'services' => $apartment->service_id,
                // 'comments' => $post->comments,
            ]);
    }
    public function destroy($id)
    {
        //ROTTE  delete the resource
        Apartment::destroy($id);
        return response('',204);
    }

    public function search(Request $request)
    {
        $result = Apartment::where('title', 'LIKE', '%'. $request->title. '%')
                            ->where('n_bathrooms', 'LIKE', '%'. $request->n_bathrooms. '%')
                            ->where('n_rooms', 'LIKE', '%'. $request->n_rooms. '%')
                            ->where('sqr_meters', 'LIKE', '%'. $request->sqr_meters. '%')
                            ->where('n_beds', 'LIKE', '%'. $request->n_beds. '%')
                            ->where('n_floor', 'LIKE', '%'. $request->n_floor. '%')
                            ->where('price', 'LIKE', '%'. $request->price. '%')
                            ->with('images')
                            //->whereBetween('latitude', [1, 100])->whereBetween('longitude', [200, 300])

        ->get();
        if(count($result)){
            return Response()->json($result);
        }
        else
        {
            return response()->json(['Result' => 'No Data not found'], 404);
        }
    }

}
