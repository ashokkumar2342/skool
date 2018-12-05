<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\AcademicYear;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Validator;

class AcademicYearController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $academicYears = AcademicYear::all();
        return view('admin.master.academicyear.list',compact('academicYears'));
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
        $validator = Validator::make($request->all(), [
        
            'name' => 'required|max:30|unique:academic_years',
            'start_date' => 'required|max:30|unique:academic_years', 
            'end_date' => 'required|max:30|unique:academic_years', 
        ]);
        if ($validator->fails()) {                    
             return response()->json(['errors'=>$validator->errors()->all(),'class'=>'error']); 

        }
       $academicYears = new AcademicYear();
       $academicYears->name = $request->name;
       $academicYears->start_date = date('Y-m-d',strtotime($request->start_date)) ;
       $academicYears->end_date = date('Y-m-d',strtotime($request->end_date));
       $academicYears->description = $request->description; 
       $academicYears->save();
       return response()->json([$academicYears,'class'=>'success','message'=>'Academic Year Created Successfully']);
    }

    public function edit($id)
    {   
        $id =Crypt::decrypt($id); 
        $academicYear =AcademicYear::find($id); 
        return view('admin.master.academicyear.edit',compact('academicYear')); 
        
    }

    public function update(Request $request,$id)
    {  
         $validator = Validator::make($request->all(), [ 
             'name' => 'required|max:30',
             'start_date' => 'required|max:30', 
             'end_date' => 'required|max:30', 
         ]);
         if ($validator->fails()) {                    
              return response()->json(['errors'=>$validator->errors()->all(),'class'=>'error']); 
         }
        $id =Crypt::decrypt($id);
        $academicYears = AcademicYear::find($id);;
        $academicYears->name = $request->name;
        $academicYears->start_date = date('Y-m-d',strtotime($request->start_date)) ;
        $academicYears->end_date = date('Y-m-d',strtotime($request->end_date));
        $academicYears->description = $request->description; 
        $academicYears->save(); 
        $response = array();
        $response['status'] = 1; 
        $response['msg'] = 'Update Successfully'; 
        return $response; 
    }


    public function search(Request $request)
    {
        $academic = AcademicYear::find($request->academic_year_id);

        return response()->json(['start_date'=>date('d-m-Y',strtotime($academic->start_date)),'end_date'=>date('d-m-Y',strtotime($academic->end_date))]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\AcademicYear  $academicYear
     * @return \Illuminate\Http\Response
     */
    public function show(AcademicYear $academicYear)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\AcademicYear  $academicYear
     * @return \Illuminate\Http\Response
     */
     

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\AcademicYear  $academicYear
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {  
        $id =Crypt::decrypt($id);

        $academicYear =AcademicYear::find($id);
        $academicYear->delete();
         return  redirect()->back()->with(['message'=>'Delete Successfully','class'=>'success']);
    }
}
