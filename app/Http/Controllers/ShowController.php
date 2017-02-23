<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ShowController extends Controller
{
    public function index(){

    	$with = [];
    	return view('calendar')->with($with);
    }
}
