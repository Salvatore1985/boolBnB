<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Apartment;
use App\Models\Image;
use Illuminate\Support\Facades\Http;
use App\Models\Service;
use Illuminate\Support\Facades\DB;
//use Illuminate\Support\Facades\Redirect;
//use App\Models\Sponsorship;


class ApartmentController extends Controller
{
    public function index(Apartment $apartment)
    {

        $apartments = Apartment::with(['images', 'services', 'user'])->paginate(8);

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
        $apiTomTom = Http::get("https://api.tomtom.com/search/2/geocode/$request->address.json?key=SsllzLi6J5XLezFkwzq7gpR0xOCwBOzL")->json();
        $lat = $apiTomTom['results'][0]['position']['lat'];
        $long = $apiTomTom['results'][0]['position']['lon'];

        $distance = $request->nKm;
        if ($distance == 5) {
            $range_lat = (1 / 111) * 5;
            $range_lon = (1 / 85) * 5;
        } else if ($distance == 10) {
            $range_lat = (1 / 111) * 10;
            $range_lon = (1 / 85) * 10;
        } else if ($distance == 20) {
            $range_lat = (1 / 111) * 20;
            $range_lon = (1 / 85) * 20;
        } else {
            $range_lat = (1 / 111) * 20;
            $range_lon = (1 / 85) * 20;
        }
        $min_lat = $lat - $range_lat;
        $max_lat = $lat + $range_lat;
        $min_lon = $long - $range_lon;
        $max_lon = $long + $range_lon;

        $result = Apartment::
                            //->join('apartment_service', 'apartments.id', '=', 'apartment_service.apartment_id')
                            //->join('images', 'images.apartment_id', '=', 'apartments.id')
                            //->join('users', 'users.id', '=', 'apartments.user_id')
                            //->whereIn('apartment_service.service_id', [1, 2])
                            whereBetween('lat', [$min_lat, $max_lat])->whereBetween('long', [$min_lon, $max_lon])
                            ->where('n_rooms', 'LIKE', '%'. $request->n_rooms. '%')
                            ->where('n_beds', 'LIKE', '%'. $request->n_beds. '%')
                            ->where('is_visible', 1)
                            ->with('services')
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
