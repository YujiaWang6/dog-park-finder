<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Park;

use Illuminate\Support\Facades\Http;

class HomeController extends Controller
{
    public function parks(Request $request)
    {
        /*-- Get input location & setting url & key --*/
        $location = $request->input('location');

        $range = 1;

        $key = '9jKWTSTaq7k8VEAkGWIGdz0jNtjl2m6F';

        $geoUrl = 'https://www.mapquestapi.com/geocoding/v1/address?key='.$key.'&location='.$location;

        /*-- Access GeoAPI --*/
        $response = Http::Get($geoUrl);

        if($response->successful()){
            $data = $response->json();

            $latitude = $data['results'][0]['locations'][0]['latLng']['lat'];
            $longitude = $data['results'][0]['locations'][0]['latLng']['lng'];

            $parksInDB = Park::all();

            $parksResult = [];

            foreach($parksInDB as $park){
                $parkLatitude = $park->latitude;
                $parkLongitude = $park->longitude;

                if(($parkLatitude>$latitude-$range)&&($parkLatitude<$latitude+$range)&&($parkLongitude>$longitude-$range)&&($parkLongitude<$longitude+$range)){
                    $parksResult[] = $park;
                }
            }

            return view('home.parksresult', [
                'location' => $location,
                'parks' => $parksResult,

            ]);

        } else{
            return view('error');
        }


    }
}
