<?php

namespace App\Http\Controllers;
use App\Evaluation_grid;
use Illuminate\Http\Request;
use DB;
class GridList extends Controller
{
    public function index(){

        $grids = Evaluation_grid::orderBy('date','DESC')->get();

        return view('gridlist')->with('grids',$grids);
    }
}
