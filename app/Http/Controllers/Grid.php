<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;
class Grid extends Controller
{
    //Get all criteria /students / criteria assessement of a grid
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
        //Create correct array to easily display them after
        foreach ($contents as $content) {


            $criterion[$content->criteria_id]['description']=$content->description;
            $criterion[$content->criteria_id]['maxPoint']=$content->maxPoint;

            $students[$content->student_id] = $content->name;

            $points[$content->student_id][$content->criteria_id] =$content->nbPoint;
        }

        $maxPoint = 0;
        //Store max point of every criteria
        foreach ($criterion as $ckey => $criteria) {
            $maxPoint += $criteria['maxPoint'];
        }
        foreach ($students as $skey => $student) {
            $totalPoint = 0;

            foreach ($points[$skey] as $pkey => $point)
            {
                $totalPoint+= $point;
            }
            //Calculating  total of point finale note and rounded note
            $totalPoints[$skey] = $totalPoint;
            $noteFinale[$skey] = number_format(($totalPoints[$skey]/$maxPoint)*5 + 1,1);
            $noteDixieme[$skey] = round($noteFinale[$skey] * 2) / 2;
        }


        return view('grid')->with('criterion', $criterion)->with('students',$students)->with('points',$points)->with('totalPoints',$totalPoints)->with('noteFinale',$noteFinale)->with('noteDixieme',$noteDixieme)->with('id',$id)->with('maxPoint',$maxPoint);


    }
    public function update(Request $request,$id){
        //Update the point of a specific student / criteria
        DB::table('criteria_assessment')
        ->where('student_id','=',$request->sid)
        ->Where('criteria_id','=',$request->cid)
        ->update(array('nbPoint' => $request->pts));
        return back()->withInput();


    }
    public function edit(Request $request,$id){
        //Get all criteria and all students of a specific grid. also the grid info
        $contents = DB::table('criteria_assessment')
        ->join('criteria','criteria_id','=','criteria.id')
        ->join('students','student_id','=','students.id')
        ->join('evaluation_grids','evaluation_grid_id','=','evaluation_grids.id')
        ->where('evaluation_grid_id','=',$id)
        ->select('description','criteria_id','name','lastname','student_id','module','date','class')
        ->orderBy('criteria_id','student.id')
        ->get();

        foreach ($contents as $content) {

            $criterion[$content->criteria_id] = $content->description;
            $students[$content->student_id] = $content->name ." ".$content->lastname;
            $gridinfo['module'] = $content->module;
            $gridinfo['date'] = $content->date;
            $gridinfo['class'] = $content->class;

        }

        return view('editgrid')->with('id',$id)->with('students',$students)->with('criterion',$criterion)->with('gridinfo',$gridinfo);
    }
    public function addstudent(Request $request, $id)
    {
        //Get all criteria
        $contents = DB::table('criteria')
        ->join('evaluation_grids','evaluation_grid_id','=','evaluation_grids.id')
        ->where('evaluation_grid_id','=',$id)
        ->select('criteria.id')
        ->orderBy('criteria.id')
        ->get();


        //Split name and last name
        $namePart = explode(" ",$request->student);
        //add user in db insertGetId give us the last inserted ID
        $addedUser = DB::table('students')->insertGetId(
            ['name' =>$namePart[0],'lastname'=>$namePart[1]]
        );

        //For every criteria , generate a criteria assessement
        foreach ($contents as $cid => $criteria) {
            DB::table('criteria_assessment')->insert(
                ['nbPoint'=> 0,'student_id' =>$addedUser,'criteria_id'=>$criteria->id]
            );
        }
        return back()->withInput();

    }
    public function addcriteria(Request $request,$id){

    }
}
