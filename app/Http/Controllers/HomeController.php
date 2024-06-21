<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function index() : View
    {   
        //get all home
        //$home = Product::latest()->paginate(10);

        //render view with home
        return view('home.home');
    }
}
