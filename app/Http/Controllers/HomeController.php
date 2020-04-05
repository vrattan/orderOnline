<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
    public function categories()
    {
        return view('categories.index');
    }
    public function any()
    {
        return view('categories.index');
    }
    public function mealtime()
    {
        return view('mealtime.index');
    }
    public function countries()
    {
        return view('countries.index');
    }
    public function currencies()
    {
        return view('currencies.index');
    }
    public function rootany()
    {
        return view('categories.index');
    }
}
