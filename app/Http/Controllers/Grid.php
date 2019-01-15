<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Grid extends Controller
{
    public function index($id){



        return view('grid')->with('id',$id);
    }
}
