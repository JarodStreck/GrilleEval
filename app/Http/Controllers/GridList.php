<?php

namespace App\Http\Controllers;
use App\Grid;
use Illuminate\Http\Request;
use DB;
class GridList extends Controller
{
    public function index(){

        $grids = Grid::orderBy('date','DESC')->get();

        return view('gridlist')->with('grids',$grids);
    }
}
