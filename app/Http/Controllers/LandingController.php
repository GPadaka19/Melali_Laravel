<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class LandingController extends Controller
{
    public function index() : View
    {   
        //get all home
        //$home = Product::latest()->paginate(10);

        //render view with home
        return view('landing.landing');
    }
}
