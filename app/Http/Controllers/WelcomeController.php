<?php

namespace App\Http\Controllers;

use App\Models\Kandidat;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class WelcomeController extends Controller
{
    public function index(){
        $kandidats = Kandidat::all();
        return view('welcome', compact('kandidats'));
    }
}
