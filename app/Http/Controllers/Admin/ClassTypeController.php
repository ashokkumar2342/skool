<?php

namespace App\Http\Controllers\Admin;

use App\Model\ClassType;
use App\Model\ClassFee;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ClassTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $classes = ClassType::all();
        return view('admin.manage.class.list',compact('classes'));
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
    public function search(Request $request)
    {
        $classFee = ClassFee::where('class_fees.session_id',$request->id)->join('class_types','class_types.id','=','class_fees.class_id')->get(['class_types.id','class_types.name','class_types.alias']);
        return response()->json($classFee);
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
            'className' => 'required|max:199',
            'shortName' => 'required|max:199',
            'shorting_id' => 'required|max:199'
            ]);
        $class = new ClassType();
        $class->name = $request->className;
        $class->alias = $request->shortName;
        $class->shorting_id = $request->shorting_id;
        if ($class->save()) {
            return redirect()->back()->with(['class'=>'success','message'=>'Class created success ...']);
        }
        return redirect()->back()->with(['class'=>'error','message'=>'Whoops ! Look like somthing went wrong ..']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ClassType  $classType
     * @return \Illuminate\Http\Response
     */
    public function show(ClassType $classType)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ClassType  $classType
     * @return \Illuminate\Http\Response
     */
    public function edit(ClassType $classType)
    {
        $classes = ClassType::all();
        return view('admin.manage.class.list',compact('classes','classType'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ClassType  $classType
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ClassType $classType)
    {
         $this->validate($request,[
            'className' => 'required|max:199',
            'shortName' => 'required|max:199'
            ]);
        $classType->name = $request->className;
        $classType->alias = $request->shortName;
        if ($classType->save()) {
            return redirect()->route('admin.class.list')->with(['class'=>'success','message'=>'Class updated success ...']);
        }
        return redirect()->back()->with(['class'=>'error','message'=>'Whoops ! Look like somthing went wrong ..']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ClassType  $classType
     * @return \Illuminate\Http\Response
     */
    public function destroy(ClassType $classType)
    {
        if ($classType->delete()) {
            return redirect()->back()->with(['class'=>'success','message'=>'class deleted success ...']);
        }
        return redirect()->back()->with(['class'=>'error','message'=>'Whoops ! Look like somthing went wrong ..']);
    }
}
