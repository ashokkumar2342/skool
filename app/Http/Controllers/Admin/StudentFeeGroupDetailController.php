<?php

namespace App\Http\Controllers\Admin;

use App\Helper\MyFuncs;
use App\Http\Controllers\Controller;
use App\Model\AcademicYear;
use App\Model\ClassType;
use App\Model\FeeGroup;
use App\Model\StudentFeeGroupDetail;
use App\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
        $classess = MyFuncs::getClasses();
         
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

   


    public function search(Request $request)
    {
        $students = Student::where('class_id',$request->class_id)
                            ->where('section_id',$request->section)
                            ->get(['id','name','registration_no']);
        $studentFeeGroups = FeeGroup::all();                    
        if (!$students->isEmpty()) { 
             foreach ($students as $key => $student) {
                $row = '<tr>
                <td>'.$student->id.'</td>
                <td>'.$student->name.'</td>
                <td>'.$student->registration_no.'</td>
                <td>'.
                    '<select name="old_group" class="form-control">
                            @foreach($studentFeeGroups as $studentFeeGroup)
                                <option value="">$studentFeeGroup</option>

                              @endforeach
                                
                    </select>'
                .'</td>
                <td>'.
                    '<select name="old_group" class="form-control">
                                <option value=""></option>
                                
                    </select>'
                .'</td>
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
    public function show(Request $request)
    { 
        $academic_year_id=$request->academic_year_id;
        $feeGroups = FeeGroup::all();
        $students=DB::select(DB::raw("call up_show_student_group_sectionwise ('$request->class_id','$request->section')"));
       $response=array();      
       $response['status']=1;      
       $response['data']=view('admin.finance.student_fee_group_detail_show',compact('feeGroups','students','academic_year_id'))->render();      
       return $response;

    }
     public function store(Request $request)
    { 
         $text='';
         foreach ($request->student_id as $student_id => $gorup_id) {
            $text.=$student_id.','.$gorup_id.',';
         } 
         $students=DB::select(DB::raw("call up_assign_fee_groupwise ('$request->academic_year_id','$text')"));
         $response=array();      
         $response['status']=1;      
         $response['msg']='Submit Successfully';      
         return $response;
        
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
