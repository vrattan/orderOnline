<?php

namespace App\Http\Controllers;

use App\Currencies;
use Illuminate\Http\Request;
use App\Http\Resources\CurrienciesResource;

class CurrenciesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $currency = Currencies::with('country')->get();
        return CurrienciesResource::collection($currency);
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
            // 'image' => 'image|mimes:jpeg,png,jpg',
        ]);

        $currency = new Currencies;
        $currency->currency_name = $request->name;
        $currency->country_id = $request->country_id;
        $currency->symbol_position = $request->symbol_position;
        $currency->currency_code = $request->currency_code;
        $currency->currency_symbol = $request->currency_symbol;
        $currency->decimal_sign = $request->decimal_sign;
        $currency->decimal_position = $request->decimal_position;
        $currency->currency_rate = $request->currency_rate;
        $currency->thousand_sign = $request->thousand_sign;
        $currency->status = $request->status;
        $currency->save();

        return new CurrienciesResource($currency);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Currencies  $currencies
     * @return \Illuminate\Http\Response
     */
    public function show(Currencies $currencies,$id)
    {
        $currencies = Currencies::findOrFail($id);
        return new CurrienciesResource($currencies);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Currencies  $currencies
     * @return \Illuminate\Http\Response
     */
    public function edit(Currencies $currencies)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Currencies  $currencies
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Currencies $currencies,$id)
    {
        $this->validate($request, [
            'name' => 'required',         
            // 'image' => 'image|mimes:jpeg,png,jpg',
        ]);

        $currency = Currencies::findOrFail($id);
        $currency->currency_name = $request->name;
        $currency->country_id = $request->country_id;
        $currency->symbol_position = $request->symbol_position;
        $currency->currency_code = $request->currency_code;
        $currency->currency_symbol = $request->currency_symbol;
        $currency->decimal_sign = $request->decimal_sign;
        $currency->decimal_position = $request->decimal_position;
        $currency->currency_rate = $request->currency_rate;
        $currency->thousand_sign = $request->thousand_sign;
        $currency->status = $request->status;
        $currency->save();

        return new CurrienciesResource($currency);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Currencies  $currencies
     * @return \Illuminate\Http\Response
     */
    public function destroy(Currencies $currencies,$id)
    {
        $currency = Currencies::findOrFail($id);
        $currency->delete();
        return new CurrienciesResource($currency);
    }
}
