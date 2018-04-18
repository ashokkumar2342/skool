<?php

namespace App\Http\Controllers\admin;

use App\Model\StudentSportHobby;
use App\Model\SessionDate;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StudentSportHobbyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $sportHobby = new StudentSportHobby();
        $sportHobby->student_id = $request->student_id;
        $sportHobby->sports_activity_name = $request->sports_activity_name;        
        $sportHobby->session_id = $request->session_id;
        $sportHobby->save();  

        return response()->json([$sportHobby, 'message'=>'Success']) ;


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\StudentSportHobby  $studentSportHobby
     * @return \Illuminate\Http\Response
     */
    public function show(StudentSportHobby $studentSportHobby)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\StudentSportHobby  $studentSportHobby
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, StudentSportHobby $studentSportHobby)
    {
     

        $sportHobby = StudentSportHobby::where('id',$request->id)->get();
        

        return response()->json(['sport_hobby'=>$sportHobby]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\StudentSportHobby  $studentSportHobby
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, StudentSportHobby $studentSportHobby)
    {
        $sportHobby = StudentSportHobby::find($request->id);
        $sportHobby->student_id = $request->student_id;
        $sportHobby->sports_activity_name = $request->sports_activity_name;        
        $sportHobby->session_id = $request->session_id;
        $sportHobby->save();  

        return response()->json([$sportHobby, 'message'=>'Success']) ;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\StudentSportHobby  $studentSportHobby
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, StudentSportHobby $studentSportHobby)
    {
        $sportHobby = StudentSportHobby::find($request->id);
           

         $sportHobby->delete();

         return response()->json([$sportHobby, 'message'=>'Delete Succeefully']);
    }
}
