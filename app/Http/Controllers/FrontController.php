<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Park;
use App\Models\User;
use App\Models\Report;
use App\Models\Review;

use Illuminate\Support\Facades\Http;

class FrontController extends Controller
{
    public function parks(Request $request)
    {
        /*-- Get input location & setting url & key --*/
        $location = $request->input('location');

        session(['user_location' => $location]);

        $rangeLati = 0.0707;

        $rangeLongi = 0.1;

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

                if(($parkLatitude>$latitude-$rangeLati)&&($parkLatitude<$latitude+$rangeLati)&&($parkLongitude>$longitude-$rangeLongi)&&($parkLongitude<$longitude+$rangeLongi)){
                    $parksResult[] = $park;
                }
            }

            return view('front.parksresult', [
                'location' => $location,
                'parks' => $parksResult,

            ]);

        } else{
            return view('error');
        }

    }

    public function parkDetail(Park $park)
    {
        $searchedLocation = session('user_location');
        
        $reports = [];
        $reviews = [];
        $users = [];

        $markTotal=0;
        $finalMark=null;

        $allReports = Report::all();

        foreach($allReports as $report){
            $parkInReport = $report->park_id;
            if($parkInReport === $park->id){
                $reports[] = $report;
            }
        }

        $allReviews = Review::all();

        foreach($allReviews as $review){
            $parkInReview = $review->park_id;
            if($parkInReview === $park->id){
                $reviews[] = $review;

                foreach($reviews as $reviewWithMark){
                    $eachMark = $reviewWithMark->mark;
                    $markTotal =+ $eachMark;
                }
            }
        }

        if(count($reviews)>0){
            $finalMark = round($markTotal/count($reviews),1);
        }

        return view('front.park',[
            'park'=>$park,
            'reports'=>$reports,
            'reviews'=>$reviews,
            'marks' => $finalMark,
            'searchedLocation' => $searchedLocation,
        ]);
    }

    public function addReviewForm(Park $park)
    {
        return view('front.addReview',[
            'park'=>$park,
        ]);
    }

    public function addReview(Park $park, Request $request)
    {
        $attributes = request()->validate([
            'mark'=>'required',
            'description'=>'nullable',
        ]);

        $review = new Review();
        $review->user_id = auth()->user()->id;
        $review->park_id = $park->id;
        $review->mark = $attributes['mark'];
        $review->description = $attributes['description'];
        $review->save();

        $previous = $request->session()->get('url.intended');
        if($previous!== null){
            $request->session()->put('url.intended', null);
        }
       
        return redirect('/parks/'.$park->id);
    }

    public function addReportForm(Park $park)
    {
        return view('front.addReport',[
            'park'=>$park,
        ]);
    }

    public function addReport(Park $park, Request $request)
    {
        $attributes = request()->validate([
            'report'=>'required',
        ]);
        
        $report = new Report();
        $report->user_id = auth()->user()->id;
        $report->park_id = $park->id;
        $report->report = $attributes['report'];
        $report->save();

        $previous = $request->session()->get('url.intended');
        if($previous!== null){
            $request->session()->put('url.intended', null);
        }
        
        return redirect('/parks/'.$park->id);
    }

}