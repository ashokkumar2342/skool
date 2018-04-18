<?php

namespace App\Http\Controllers\Admin;

use App\Model\SubjectType;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SubjectTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subjects = SubjectType::all();
        return view('admin.subject.list',compact('subjects'));
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
         
         $request->validate([
         'subjectName' => 'required|max:199',
         'code' => 'required|max:199',
         ]);
         
        $subject = new SubjectType();
        $subject->name = $request->subjectName;
        $subject->code = $request->code;
        if ($subject->save()) {
            return redirect()->back()->with(['subject'=>'success','message'=>'subject created success ...']);
        }
        return redirect()->back()->with(['class'=>'error','message'=>'Whoops ! Look like somthing went wrong ..']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\SubjectType  $subjectType
     * @return \Illuminate\Http\Response
     */
    public function show(SubjectType $subjectType)
    {
        $subjects = subjectType::all();
        return view('admin.manage.class.list',compact('subjects','subjectType'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\SubjectType  $subjectType
     * @return \Illuminate\Http\Response
     */
    public function edit(SubjectType $subjectType)
    {
        $subjects = SubjectType::all();
        return view('admin.subject.list',compact('subjects','subjectType'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\SubjectType  $subjectType
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SubjectType $subjectType)
    {
        $request->validate([
         'subjectName' => 'required|max:199',
         'code' => 'required|max:199',
         ]);         
        $subjectType->name = $request->subjectName;
        $subjectType->code = $request->code;
        if ($subjectType->save()) {
            return redirect()->route('admin.subjectType.list')->with(['class'=>'success','message'=>'Subject updated successfully']);
        }
        return redirect()->back()->with(['class'=>'error','message'=>'Whoops ! Look like somthing went wrong']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\SubjectType  $subjectType
     * @return \Illuminate\Http\Response
     */
    public function destroy(SubjectType $subjectType)
    {
        
       if ($subjectType->delete()) {
         return redirect()->back()->with(['subject'=>'success','message'=>'subject Delete successfully']);
        }
        return redirect()->back()->with(['class'=>'error','message'=>'Whoops ! Look like somthing went wrong']);

            
        
    }
}
