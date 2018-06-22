<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\AcademicYear;
use App\Model\ClassType;
use App\Model\FeeGroup;
use App\Model\StudentFeeGroupDetail;
use App\Student;
use Illuminate\Http\Request;

class StudentFeeGroupDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {        
          
        $academicYear = array_pluck(AcademicYear::get(['id','name'])->toArray(), 'name', 'id');
        $classess = array_pluck(ClassType::get(['id','name'])->toArray(), 'name', 'id');
         
        return view('admin.finance.student_fee_group_detail',compact('academicYear','classess'));
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
        $students = Student::where('class_id',$request->class_id)->get(['id','name','registration_no']);
        if (!$students->isEmpty()) { 
             foreach ($students as $key => $student) {
                $row = '<tr>
                <td>'.$student->id.'</td>
                <td>'.$student->name.'</td>
                <td>'.$student->registration_no.'</td>
                ';

                $row .= '</tr>';
                $options[] = [$row]; 
            }
        }
        else{
         return response()->json(null);    
        }
        
        return response()->json($options); 
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\StudentFeeGroupDetail  $studentFeeGroupDetail
     * @return \Illuminate\Http\Response
     */
    public function show(StudentFeeGroupDetail $studentFeeGroupDetail)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\StudentFeeGroupDetail  $studentFeeGroupDetail
     * @return \Illuminate\Http\Response
     */
    public function edit(StudentFeeGroupDetail $studentFeeGroupDetail)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\StudentFeeGroupDetail  $studentFeeGroupDetail
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, StudentFeeGroupDetail $studentFeeGroupDetail)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\StudentFeeGroupDetail  $studentFeeGroupDetail
     * @return \Illuminate\Http\Response
     */
    public function destroy(StudentFeeGroupDetail $studentFeeGroupDetail)
    {
        //
    }
}
