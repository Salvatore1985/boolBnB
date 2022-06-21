<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Apartment;
use App\Models\Image;
use Illuminate\Support\Facades\Http;
/* use App\Models\Service;
use App\Models\Sponsorship; */


class ApartmentController extends Controller
{
    public function index(Apartment $apartment)
    {
        $apartments = Apartment::with(['images', 'services', 'user'])->paginate(20);
        return response()->json($apartments);
    }

    public function show($id)
    {
        $apartment = Apartment::with(['images', 'services', 'user'])->findOrFail($id);
        return response()->json(
            [
                'success' => true,
                'results' => $apartment,
                'services' => $apartment->service_id,
                'user_id' => $apartment->users,
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
        //$apiTomTom = Http::get("https://api.tomtom.com/search/2/geocode/$request->address.json?key=SsllzLi6J5XLezFkwzq7gpR0xOCwBOzL")->json();
        //$resultTomTom = $apiTomTom['results'][0]['position'];
        //if ($distance == 5) {
        //    $range_lat = (1 / 111) * 5;
        //    $range_lon = (1 / 85) * 5;
        //} else if ($distance == 10) {
        //    $range_lat = (1 / 111) * 10;
        //    $range_lon = (1 / 85) * 10;
        //} else if ($distance == 20) {
        //    $range_lat = (1 / 111) * 20;
        //    $range_lon = (1 / 85) * 20;
        //} else if ($distance == 50) {
        //    $range_lat = (1 / 111) * 50;
        //    $range_lon = (1 / 85) * 50;
        //} else {
        //    $range_lat = (1 / 111) * 10;
        //    $range_lon = (1 / 85) * 10;
        //}
        //$min_lat = $lat - $range_lat;
        //$max_lat = $lat + $range_lat;
        //$min_lon = $lon - $range_lon;
        //$max_lon = $lon + $range_lon;
        $result = Apartment::where('address', 'LIKE', '%'. $request->address. '%')
                            ->where('n_rooms', 'LIKE', '%'. $request->n_rooms. '%')
                            ->where('n_beds', 'LIKE', '%'. $request->n_beds. '%')
                            ->with('images')
                            //->whereBetween('latitude', [1, 100])->whereBetween('longitude', [200, 300])

        ->get();
        if(count($result)){
            return Response()->json([$result]);
        }
        else
        {
            return response()->json(['Result' => 'No Data not found'], 404);
        }
    }

}
