<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mealtime;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\MealtimeResource;

class MealtimeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mwnu = Mealtime::get();
        return MealtimeResource::collection($mwnu);
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
            'mealtime_name' => 'required',         
            'start_time' => 'required',         
            'end_time' => 'required',         
            // 'image' => 'image|mimes:jpeg,png,jpg',
        ]);
        $cat = new Mealtime;
        $cat->mealtime_name = $request->mealtime_name;
        $cat->start_time = $request->start_time;
        $cat->end_time = $request->end_time;
        $cat->status = $request->status;
        $cat->save();
        return new MealtimeResource($cat);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $mealtime = Mealtime::findOrFail($id);
        return new MealtimeResource($mealtime);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'mealtime_name' => 'required',
            'start_time' => 'required',         
            'end_time' => 'required',      
        ]);
        $Mealtime = Mealtime::findOrFail($id);
        
        
        $Mealtime->mealtime_name = $request->get('mealtime_name');
        $Mealtime->status = $request->status;
        $Mealtime->start_time = $request->start_time;
        $Mealtime->end_time = $request->end_time;
        $Mealtime->save();

        return new MealtimeResource($Mealtime);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $Mealtime = Mealtime::findOrFail($id);
        $Mealtime->delete();
        return new MealtimeResource($Mealtime);
    }
}
