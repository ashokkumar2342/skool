<?php

namespace App\Http\Controllers\Admin;

use App\Model\Section;
use App\Model\SectionType;
use App\Model\ClassType;
use App\Model\ClassFee;
use App\Model\SessionDate;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SectionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sections = SectionType::all();
        $manageSections = Section::all();
        $classes = array_pluck(ClassType::get(['id','alias'])->toArray(),'alias', 'id');     
        return view('admin.manage.section.manageSection',compact('sections','classes','manageSections'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
       
      $sections = Section::where('class_id',$request->id)->join('section_types','section_types.id','=','sections.section_id')->get(['section_types.id','section_id','section_types.name']); 
        return response()->json($sections);
   
    }
     public function search2(Request $request)
    {
         
       
      $sections = Section::where('class_id',$request->id)->join('section_types','section_types.id','=','sections.section_id')->get(['section_types.id','section_id','section_types.name']); 
        return response()->json(['section'=>$sections]);
   
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
            'section_id' => 'required|max:199',
            'class' => 'required|numeric'            
        ]);
        $data = $request->except('_token');
        $section_count = count($data['section_id']);
         
        for($i=0; $i < $section_count; $i++){
        
            $manageSection = new Section();
            $manageSection->section_id = $data['section_id'][$i];
            $manageSection->class_id = $data['class'];
            $manageSection->save();
        }         
        return redirect()->back()->with(['class'=>'success','message'=>'Manage Section created successfully ...']);
         
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\SectionType  $sectionType
     * @return \Illuminate\Http\Response
     */
    public function show(Section $sectionType)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\SectionType  $sectionType
     * @return \Illuminate\Http\Response
     */
    public function edit(Section $sectionEdit)
    {
        $sections = Section::all();
        $classes = array_pluck(ClassType::get(['id','alias'])->toArray(),'alias', 'id');
        $sessions = array_pluck(SessionDate::get(['id','date'])->toArray(),'date', 'id');
        return view('admin.manage.section.list',compact('sections','sectionEdit','classes','sessions'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\SectionType  $sectionType
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Section $section)
    {
        $this->validate($request,[
            'session' => 'required|max:199',
            'class' => 'required|numeric',
            'sectionName' => 'required|max:199'
            ]);
        $section->name = $request->sectionName;
        $section->class_id = $request->class;
        $section->session_id = $request->session;
        if ($section->save()) {
            return redirect()->route('admin.section.list')->with(['class'=>'success','message'=>'Class created success ...']);
        }
        return redirect()->back()->with(['class'=>'error','message'=>'Whoops ! Look like somthing went wrong ..']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\SectionType  $sectionType
     * @return \Illuminate\Http\Response
     */
    public function destroy(Section $section)
    {
        if ($section->delete()) {
            return redirect()->back()->with(['class'=>'success','message'=>'section deleted success ...']);
        }
        return redirect()->back()->with(['class'=>'error','message'=>'Whoops ! Look like somthing went wrong ..']);
    }
}
