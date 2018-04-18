<?php

namespace App\Http\Controllers\Admin;
use App\Center;
use App\Http\Controllers\Controller;
use App\Model\ClassFee;
use App\Model\ClassType;
use App\Model\SessionDate;
use Illuminate\Http\Request;

class ClassFeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $classfees =  ClassFee::all()
        
        $classes = array_pluck(ClassType::get(['id','alias'])->toArray(),'alias', 'id');
        $sessions = array_pluck(SessionDate::get(['id','date'])->toArray(),'date', 'id');
       
        return view('admin.manage.classfee.list',compact('centers','classes','classfees','sessions'));
    }
    public function searchClassFree(Request $request){
        return response()->json();
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
        $this->validate($request,[
            'session'=>'required|numeric',
            'class'=>'required|numeric',
            'admission_fees'=>'required|numeric',
            'registration_fees'=>'required|numeric',
            'annual_harges'=>'required|numeric',
            'bus_fees'=>'required|numeric',
            'caution_money'=>'required|numeric',
            'activity_charges'=>'required|numeric',
            'smart_class_fees'=>'required|numeric',
            'tuition_fees'=>'required|numeric',
        ]);
        if (ClassFee::where(['class_id'=>$request->class,'session_id'=>$request->session])->count()) {
            return redirect()->back()->with(['class'=>'error','message'=>'already created ! try another..']);
        }
        $classfee = new ClassFee();
        $classfee->session_id = $request->session;
        $classfee->class_id = $request->class;
        $classfee->admission_fee = $request->admission_fees;
        $classfee->registration_fee = $request->registration_fees;
        $classfee->annual_fee = $request->annual_harges;
        $classfee->bus_fee = $request->bus_fees;
        $classfee->caution_fee = $request->caution_money;
        $classfee->activity_charge = $request->activity_charges;
        $classfee->smart_fee = $request->smart_class_fees;
        $classfee->tution_fee = $request->tuition_fees;
        $classfee->other_fee = $request->other_charges;
        $classfee->total_fee = ($request->admission_fees+$request->registration_fees+$request->annual_harges+$request->bus_fees+$request->caution_money+$request->activity_charges+$request->smart_class_fees+$request->tuition_fees+$request->other_charges);
        if ($classfee->save()) {
            return redirect()->back()->with(['class'=>'success','message'=>'class fee created success ...']);
        }
        return redirect()->back()->with(['class'=>'error','message'=>'Whoops ! Look like somthing went wrong ..']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ClassFee  $classFee
     * @return \Illuminate\Http\Response
     */
    public function show(ClassFee $classFee)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ClassFee  $classFee
     * @return \Illuminate\Http\Response
     */
    public function edit(ClassFee $classFee)
    {
        $classfees =  ClassFee::all();
        $classes = array_pluck(ClassType::get(['id','alias'])->toArray(),'alias', 'id');
        $sessions = array_pluck(SessionDate::get(['id','date'])->toArray(),'date', 'id');
        // return $classFee;
        return view('admin.manage.classfee.list',compact('classes','classfees','classFee','sessions'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ClassFee  $classFee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ClassFee $classFee)
    {

        $this->validate($request,[
            'session'=>'required|numeric',
            'class'=>'required|numeric',
            'admission_fees'=>'required|numeric',
            'registration_fees'=>'required|numeric',
            'annual_harges'=>'required|numeric',
            'bus_fees'=>'required|numeric',
            'caution_money'=>'required|numeric',
            'activity_charges'=>'required|numeric',
            'smart_class_fees'=>'required|numeric',
            'tuition_fees'=>'required|numeric',
            'other_charges'=>'nullable|numeric',
        ]);
        $classFee->session_id = $request->session;
        $classFee->class_id = $request->class;
        $classFee->admission_fee = $request->admission_fees;
        $classFee->registration_fee = $request->registration_fees;
        $classFee->annual_fee = $request->annual_harges;
        $classFee->bus_fee = $request->bus_fees;
        $classFee->caution_fee = $request->caution_money;
        $classFee->activity_charge = $request->activity_charges;
        $classFee->smart_fee = $request->smart_class_fees;
        $classFee->tution_fee = $request->tuition_fees;
        $classFee->other_fee = $request->other_charges;
        $classFee->total_fee = ($request->admission_fees+$request->registration_fees+$request->annual_harges+$request->bus_fees+$request->caution_money+$request->activity_charges+$request->smart_class_fees+$request->tuition_fees+$request->other_charges);
        if ($classFee->save()) {
            return redirect()->route('admin.manage.classfee.list')->with(['class'=>'success','message'=>'class fee updated success ...']);
        }
        return redirect()->back()->with(['class'=>'error','message'=>'Whoops ! Look like somthing went wrong ..']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ClassFee  $classFee
     * @return \Illuminate\Http\Response
     */
    public function destroy(ClassFee $classFee)
    {
        if ($classFee->delete()) {
            return redirect()->back()->with(['class'=>'success','message'=>'class fee deleted success ...']);
        }
        return redirect()->back()->with(['class'=>'error','message'=>'Whoops ! Look like somthing went wrong ..']);
    }
}
