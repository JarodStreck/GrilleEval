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

        $maxPoint = 0;
        foreach ($criterium as $ckey => $criteria) {
            $maxPoint += $criteria['maxPoint'];
        }
        foreach ($students as $skey => $student) {
            $totalPoint = 0;

            foreach ($points[$skey] as $pkey => $point)
            {
                $totalPoint+= $point;
            }
            $totalPoints[$skey] = $totalPoint;
            $noteFinale[$skey] = number_format(($totalPoints[$skey]/$maxPoint)*5 + 1,1);
            $noteDixieme[$skey] = round($noteFinale[$skey] * 2) / 2;
        }

        //dd($points);
        return view('grid')->with('criterium', $criterium)->with('students',$students)->with('points',$points)->with('totalPoints',$totalPoints)->with('noteFinale',$noteFinale)->with('noteDixieme',$noteDixieme)->with('id',$id);


    }
    public function update($id,$cid,$sid,$pts){
        dd($cid);
    }
}
