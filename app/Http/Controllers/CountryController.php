<?php

namespace App\Http\Controllers;

use App\Country;
use Illuminate\Http\Request;
use App\Http\Resources\CountryResource;

class CountryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $country = Country::get();
        return CountryResource::collection($country);
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
            'country_name' => 'required',
            'iso_code_2' => 'nullable|string|min:2|max:2',               
            'iso_code_3' => 'nullable|string|min:3|max:3',               
            'priority' => 'required',               
            // 'image' => 'image|mimes:jpeg,png,jpg',
        ]);
        $country = new Country;
        $country->country_name = $request->country_name;
        $country->iso_code_2 = $request->iso_code_2;
        $country->iso_code_3 = $request->iso_code_3;
        $country->format = $request->format;
        $country->flag = $request->flag;
        $country->priority = $request->priority;
        $country->status = $request->status;
        $country->save();
        return new CountryResource($country);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $country = Country::findOrFail($id);
        return new CountryResource($country);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function edit(Country $country)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'country_name' => 'required',
            'iso_code_2' => 'nullable|string|min:2|max:2',               
            'iso_code_3' => 'nullable|string|min:3|max:3',               
            'priority' => 'required',     
        ]);
        $country = Country::findOrFail($id);
        $country->country_name = $request->country_name;
        $country->iso_code_2 = $request->iso_code_2;
        $country->iso_code_3 = $request->iso_code_3;
        $country->format = $request->format;
        $country->flag = $request->flag;
        $country->priority = $request->priority;
        $country->status = $request->status;
        $country->save();

        return new CountryResource($country);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $country = Country::findOrFail($id);
        $country->delete();
        return new CountryResource($country);
    }
}
