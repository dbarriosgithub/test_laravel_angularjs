<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\person\Country;

class CountryController extends Controller
{
  
  public function index()
  {
  	$country = Country::first()->departments();

  //	$country = $country::department()->get('id');

    
	foreach ($country as $value) {
	    echo "$value";
	}
     
  }

}
