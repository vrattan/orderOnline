<?php

namespace App\Http\Controllers;

use App\Location;
use Illuminate\Http\Request;
use App\Http\Resources\LocationResource;

class LocationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $location = Location::with('country')->get();
        return LocationResource::collection($location);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',         
            'email' => 'required| email',         
            'address_1' => 'required',         
            'city' => 'required',         
            'state' => 'required',         
            'postcode' => 'required',         
            'country_id' => 'required',
            'permalink_slug'  => 'unique:locations,permalink_slug,'.$request->permalink_slug,         
            'telephone' => 'required| digits:10',         
            // 'image' => 'image|mimes:jpeg,png,jpg',
        ]);

        $loc = new Location;
        if ($request->hasFile('image')) {
            $this->validate($request, [
            // 'name' => 'required',         
                'image' => 'image|mimes:jpeg,png,jpg',
            ]);
            $image = $request->file('image');
            $name = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/uploads/location');
            $imagePath = $destinationPath . "/" . $name;
            $image->move($destinationPath, $name);
            $loc->image = $name;
        }

        $loc->name = $request->name;
        $loc->email = $request->email;
        $loc->address_1 = $request->address_1;
        $loc->address_2 = $request->address_2;
        $loc->city = $request->city;
        $loc->state = $request->state;
        $loc->postal_code = $request->postcode;
        $loc->telephone = $request->telephone;
        if($request->country_id > 0)
        {
            $loc->country_id = $request->country_id;
        }
        
        // $loc->priority = $request->priority;
        $loc->status = $request->status;
        $loc->permalink_slug = $request->permalink_slug;
        $loc->save();

        return new LocationResource($loc);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Location  $location
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // $menuCategories = MenuCategories::findOrFail($id);
        // return new MenuCategoriesResource($menuCategories);
        $location = Location::findOrFail($id);
        return new LocationResource($location);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Location  $location
     * @return \Illuminate\Http\Response
     */
    public function edit(Location $location)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Location  $location
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $this->validate($request, [
            'name' => 'required',         
            'email' => 'required| email',         
            'address_1' => 'required',         
            'city' => 'required',         
            'state' => 'required',         
            'postcode' => 'required',         
            'country_id' => 'required',
            'permalink_slug'  => 'unique:locations,permalink_slug,'.$id,        
            'telephone' => 'required| digits:10',         
            // 'image' => 'image|mimes:jpeg,png,jpg',
        ]);

        $loc = Location::findOrFail($id);
        if ($request->hasFile('image')) {
            $this->validate($request, [         
                'image' => 'image|mimes:jpeg,png,jpg',
            ]);
            $image = $request->file('image');
            $name = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/uploads/location');
            $imagePath = $destinationPath . "/" . $name;
            $image->move($destinationPath, $name);
            $loc->image = $name;
        }
        if($request->image == null || $request->image == 'null')
        {
            $loc->image = NULL;
        }
        $loc->name = $request->name;
        $loc->email = $request->email;
        $loc->address_1 = $request->address_1;
        $loc->address_2 = $request->address_2;
        $loc->city = $request->city;
        $loc->state = $request->state;
        $loc->postal_code = $request->postcode;
        $loc->telephone = $request->telephone;
        if($request->country_id > 0)
        {
            $loc->country_id = $request->country_id;
        }
        
        // $loc->priority = $request->priority;
        $loc->status = $request->status;
        $loc->permalink_slug = $request->permalink_slug;
        $loc->save();

        return new LocationResource($loc);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Location  $location
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $location = Location::findOrFail($id);
        $location->delete();
        return new LocationResource($location);
    }
}
