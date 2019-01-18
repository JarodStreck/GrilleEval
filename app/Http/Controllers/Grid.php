<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class Grid extends Controller
{
    public function index($id){
        $contents = DB::table('criteria_assessment')
        ->join('criteria','criteria_id','=','criteria.id')
        ->join('students','student_id','=','students.id')
        ->join('evaluation_grids','evaluation_grid_id','=','evaluation_grids.id')
        ->where('evaluation_grid_id','=',$id)
        ->select('nbPoint','maxPoint','description','criteria_id','name','student_id')
        ->orderBy('name','question_id','criteria.id')
        ->get();
        $points = array();
        foreach ($contents as $content) {


            $criterium[$content->criteria_id]['description']=$content->description;
            $criterium[$content->criteria_id]['maxPoint']=$content->maxPoint;

            $students[$content->student_id] = $content->name;

            $points[$content->student_id][$content->criteria_id] =$content->nbPoint;

        }
        return view('grid')->with('criterium', $criterium)->with('students',$students)->with('points',$points);
        
    }
}
