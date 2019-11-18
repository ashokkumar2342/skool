<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Model\AcademicYear;
use App\Model\AwardLevel;
use App\Model\SessionDate;
use App\Model\StudentSportHobby;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

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
    public function addForm(Request $request,$student_id)
    {

        $academicYears=AcademicYear::orderBy('id','DESC')->get();
        $awardLevels=AwardLevel::all();
        return view('admin.student.studentdetails.include.add_sport_hobby',compact('sportHobbies','student_id','academicYears','awardLevels'));


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\StudentSportHobby  $studentSportHobby
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $sportHobbies =  StudentSportHobby::where('student_id',$id)->get();
        return view('admin.student.studentdetails.include.sport_hobbies_list',compact('sportHobbies'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\StudentSportHobby  $studentSportHobby
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request,$id)
    {
     
       
       $academicYears=AcademicYear::orderBy('id','DESC')->get();
        $awardLevels=AwardLevel::all();
        $sportHobby = StudentSportHobby::find($id);
         $student_id=$sportHobby->student_id; 
        return view('admin.student.studentdetails.include.add_sport_hobby',compact('sportHobbies','student_id','academicYears','awardLevels','sportHobby'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\StudentSportHobby  $studentSportHobby
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id=null)
    {  
        $rules=[
          
            'academic_year'=>'required',
            'level'=>'required',
            'sports_activity_name'=>'required',
       
        ];

        $validator = Validator::make($request->all(),$rules);
        if ($validator->fails()) {
            $errors = $validator->errors()->all();
            $response=array();
            $response["status"]=0;
            $response["msg"]=$errors[0];
            return response()->json($response);// response as json
        }
        else {
        $sportHobby = StudentSportHobby::firstOrNew(['id'=>$id]);
        $sportHobby->student_id = $request->student_id;
        $sportHobby->sports_activity_name = $request->sports_activity_name;        
        $sportHobby->session_id = $request->academic_year;
        $sportHobby->award_level = $request->level;
        $sportHobby->save();  
        $response=['status'=>1,'msg'=>'Created Successfully'];
            return response()->json($response);
        }  
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\StudentSportHobby  $studentSportHobby
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    { 
        $sportHobby = StudentSportHobby::find($id);
        $sportHobby->delete();
         $response=['status'=>1,'msg'=>'Delete Successfully'];
            return response()->json($response);
           

        
    }
}
