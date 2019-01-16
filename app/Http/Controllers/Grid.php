<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class Grid extends Controller
{
    public function index($id){
        $content = DB::table('criteria_assessment')
        ->join('criteria','criteria_id','=','criteria.id')
        ->join('students','student_id','=','students.id')
        ->join('evaluation_grids','evaluation_grid_id','=','evaluation_grids.id')
        ->where('evaluation_grid_id','=',$id)
        ->select('nbPoint','maxPoint','description','name')
        ->orderBy('name','question_id','criteria.id')
        ->get();
        dd($content);
    }
}
