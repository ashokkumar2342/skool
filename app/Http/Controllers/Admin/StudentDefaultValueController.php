<?php

namespace App\Http\Controllers\Admin;

 use App\Http\Controllers\Controller;
use App\Model\BloodGroup;
use App\Model\Category;
use App\Model\ClassType;
use App\Model\DiscountType;
use App\Model\DocumentType;
use App\Model\Gender;
use App\Model\GuardianRelationType;
use App\Model\IncomeRange;
use App\Model\Isoptional;
use App\Model\ParentsInfo;
use App\Model\PaymentType;
use App\Model\Religion;
use App\Model\SessionDate;
use App\Model\StudentDefaultValue;
use App\Model\StudentFee;
use App\Model\StudentSubject;
use App\Model\Subject;
use App\Model\SubjectType;
use App\Student;
use Auth;
use Carbon;
use DB;
use Excel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Storage;

class StudentDefaultValueController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    
        $classes = array_pluck(ClassType::get(['id','alias'])->toArray(),'alias', 'id');    
        $sessions = array_pluck(SessionDate::get(['id','date'])->toArray(),'date', 'id');
        $genders = array_pluck(Gender::get(['id','genders'])->toArray(),'genders', 'id');
        $religions = array_pluck(Religion::get(['id','name'])->toArray(),'name', 'id');
        $categories = array_pluck(Category::get(['id','name'])->toArray(),'name', 'id');
        $default = StudentDefaultValue::find(1); 
           
        return view('admin.student.studentdetails.default',compact('classes','sessions','default','genders','religions','categories','default'));
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
         
        $default = StudentDefaultValue::find(1);
        $default->class_id = $request->class;
        $default->section_id = $request->section;
        $default->religion_id = $request->religion;
        $default->category_id = $request->category;
        $default->state = $request->state;
        $default->city = $request->city;
        $default->pincode = $request->pincode;
        $default->save();
        return redirect()->back()->with(['message'=>'Default Value Updated','class'=>'success']);


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\StudentDefaultValue  $studentDefaultValue
     * @return \Illuminate\Http\Response
     */
    public function show(StudentDefaultValue $studentDefaultValue)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\StudentDefaultValue  $studentDefaultValue
     * @return \Illuminate\Http\Response
     */
    public function edit(StudentDefaultValue $studentDefaultValue)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\StudentDefaultValue  $studentDefaultValue
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, StudentDefaultValue $studentDefaultValue)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\StudentDefaultValue  $studentDefaultValue
     * @return \Illuminate\Http\Response
     */
    public function destroy(StudentDefaultValue $studentDefaultValue)
    {
        //
    }
}
