<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class WeatherController extends Controller
{
    public function index(Request $request)
    {
        //return $request->all();
        $weather = Http::get('https://api.meteo-concept.com/api/forecast/daily?token=c3c56ef212aa6c6db866cc3ba8e2d42515cc583ab7e973428e71295fe428a940&insee=' . $request->insee)->json();
        return view('weather.index')->with([
            'weather' => $weather
        ]);
    }

    public function search(Request $request)
    {
        $cities = Http::get('https://api.meteo-concept.com/api/location/cities?token=c3c56ef212aa6c6db866cc3ba8e2d42515cc583ab7e973428e71295fe428a940&search=' . $request->name)->json();


        return view('weather.city_list')->with([
            'cities' => $cities
        ]);
    }
}
