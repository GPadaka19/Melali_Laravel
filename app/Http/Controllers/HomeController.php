<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Destination;

class HomeController extends Controller
{
    public function index()
    {
        // Mengambil semua destinasi dari database
        $destinations = Destination::all();

        return view('home.home', compact('destinations'));
    }
}
