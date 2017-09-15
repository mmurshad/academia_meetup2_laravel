<?php

namespace App\Http\Controllers;

use App\Country;
use Illuminate\Http\Request;

class CountryController extends Controller
{
    public function index()
    {
    	$countries = Country::all();

    	return response()->json($countries, 200);
    }

    public function store(Request $request)
    {
    	$country = new Country;
    	$country->setAttribute('country', $request->get('country'));
    	$country->setAttribute('code', 	  $request->get('code'));
    	$country->setAttribute('rate',	  $request->get('rate'));
    	$country->save();

    	return response()->json(" ",204);
    }

    public function getCountries()
    {
    	$countries = Country::select('country', 'code')->get();

    	return response()->json($countries, 200);
    }

    public function getRate(Request $request)
    {
    	$dt = [];

    	$value = $request->all();

    	$val =  $value['value']; 

    	$rate = Country::select('code', 'rate')->get();

    	foreach ($rate as $r) {
    		$rat = $r->rate;
    		$code = $r->code;

    		$dt[$code] =  $rat * $val;

    	}

    	return response()->json($dt, 200);
    }
}
