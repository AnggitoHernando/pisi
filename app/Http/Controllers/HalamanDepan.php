<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HalamanDepan extends Controller
{
    public function index()
    {
        return view('halamandepan/index');
    }
}
