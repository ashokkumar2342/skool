<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\Section;
use App\Model\SectionType;
use Illuminate\Http\Request;

class SectionTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $sections = SectionType::all();
        return view('admin.manage.section.list',compact('sections'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function selectList(Request $request)
    {
        $sections = Section::find($request->id); 
        $classSections = array_pluck(Section::where('class_id',$request->id)->get(['section_id'])->toArray(), 'section_id'); 
        $sectionTypes = SectionType::all(); 
        $data= view('admin.manage.section.selectList',compact('sectionTypes','classSections'))->render(); 
        return response($data);
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
            'sectionName' => 'required|max:199',             
            ]);
        $section = new SectionType();
        $section->name = $request->sectionName;        
        if ($section->save()) {
            return redirect()->back()->with(['section'=>'success','message'=>'Section created success ...']);
        }
        return redirect()->back()->with(['class'=>'error','message'=>'Whoops ! Look like somthing went wrong ..']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\SectionType  $sectionType
     * @return \Illuminate\Http\Response
     */
    public function show(SectionType $sectionType)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\SectionType  $sectionType
     * @return \Illuminate\Http\Response
     */
    public function edit(SectionType $sectionType)
    {
        $sections = SectionType::all();
        return view('admin.manage.section.list',compact('sections','sectionType'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\SectionType  $sectionType
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SectionType $sectionType)
    {
         $this->validate($request,[
            'sectionName' => 'required|max:199',
             
            ]);
        $sectionType->name = $request->sectionName;
      
        if ($sectionType->save()) {
            return redirect()->route('admin.section.list')->with(['class'=>'success','message'=>'Section updated success ...']);
        }
        return redirect()->back()->with(['class'=>'error','message'=>'Whoops ! Look like somthing went wrong ..']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\SectionType  $sectionType
     * @return \Illuminate\Http\Response
     */
    public function destroy(SectionType $sectionType)
    {
        //
    }
}
