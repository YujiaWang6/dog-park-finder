<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Park;

class ParksController extends Controller
{
    public function list()
    {
        return view('parks.list', [
            'parks' => Park::all()
        ]);
    }

    public function deleteConfirm(Park $park)
    {
        return view('parks.delete',[
            'park'=>$park
        ]);
    }

    public function deleted(Park $park)
    {
        $park->delete();

        return redirect('/console/parks/list')
            ->with('message', $park->park_name . ' has been deleted' );
    }

    public function addForm()
    {
        return view('parks.add');
    }

    public function add()
    {
        $attributes = request()->validate([
            'park_name' => 'required',
            'address' => 'required',
            'postcode' => 'required',
            'information' => 'nullable',
            'latitude' => 'nullable',
            'longitude' => 'nullable',
            'city' => 'nullable',
        ]);

        $park = new Park();
        $park->park_name = $attributes['park_name'];
        $park->address = $attributes['address'];
        $park->postcode = $attributes['postcode'];
        $park->information = $attributes['information'];
        $park->latitude = $attributes['latitude'];
        $park->longitude = $attributes['longitude'];
        $park->city = $attributes['city'];
        $park->save();

        return redirect('/console/parks/list')
            ->with('message', $park->park_name . ' has been added');
    }

    public function editForm(Park $park)
    {
        return view('parks.edit',[
            'park'=>$park,
        ]);
    }

    public function edit(Park $park)
    {
        $attributes = request()->validate([
            'park_name' => 'required',
            'address' => 'required',
            'postcode' => 'required',
            'information' => 'nullable',
            'latitude' => 'nullable',
            'longitude' => 'nullable',
            'city' => 'nullable',
        ]);

        $park->park_name = $attributes['park_name'];
        $park->address = $attributes['address'];
        $park->postcode = $attributes['postcode'];
        $park->information = $attributes['information'];
        $park->latitude = $attributes['latitude'];
        $park->longitude = $attributes['longitude'];
        $park->city = $attributes['city'];
        $park->save();

        return redirect('/console/parks/list')
            ->with('message', $park->park_name . ' has been updated');
    }
}
