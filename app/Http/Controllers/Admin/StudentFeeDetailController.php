<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\AcademicYear;
use App\Model\Concession;
use App\Model\FeeStructureLastDate;
use App\Model\StudentFeeDetail;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Auth\Middleware\Auth;
use Illuminate\Http\Request;
 
 
class StudentFeeDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { 
         $studentFeeDetails = StudentFeeDetail::latest('created_at')->paginate(20);        
        $acardemicYear = array_pluck(AcademicYear::get(['id','name'])->toArray(), 'name', 'id');
        $concession = array_pluck(Concession::get(['id','name'])->toArray(), 'name', 'id');
        $feeStructurLastDate = array_pluck(FeeStructureLastDate::get(['id','last_date'])->toArray(),'last_date', 'id');
        
        
        return view('admin.finance.student_fee_detail',compact('studentFeeDetails','acardemicYear','feeStructurLastDate','concession'));
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\StudentFeeDetail  $studentFeeDetail
     * @return \Illuminate\Http\Response
     */
    public function show(StudentFeeDetail $studentFeeDetail)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\StudentFeeDetail  $studentFeeDetail
     * @return \Illuminate\Http\Response
     */
    public function edit(StudentFeeDetail $studentFeeDetail)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\StudentFeeDetail  $studentFeeDetail
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, StudentFeeDetail $studentFeeDetail)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\StudentFeeDetail  $studentFeeDetail
     * @return \Illuminate\Http\Response
     */
    public function destroy(StudentFeeDetail $studentFeeDetail)
    {
        //
    }
}
