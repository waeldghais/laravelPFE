<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FontController extends Controller
{
    public function index(){
    	return view('frontView.home.homeContent');
    }
}
