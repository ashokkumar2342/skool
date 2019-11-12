<?php

namespace App\Http\Controllers\Admin;

use App\Helper\MyFuncs;
use App\Http\Controllers\Controller;
use App\Model\ClassFee;
use App\Model\ClassType;
use App\Model\Section;
use App\Model\SectionType;
use App\Model\SessionDate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use PDF;
use Auth;
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
        $manageSections =Section:: orderBy('class_id','ASC')->orderBy('section_id','ASC')->get(); 
        $classes = ClassType::orderBy('shorting_id','ASC')->get();     
        return view('admin.manage.section.manageSection',compact('sections','classes','manageSections'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
   

    public function search(Request $request)
    {
       
      $sections =MyFuncs::getSections($request->id); 
        return response()->json($sections);
   
    }
     public function search2(Request $request)
    {   
      $sections =MyFuncs::getSections($request->id);
      return response()->json(['section'=>$sections]);
   
    }

     public function sectionSelectBox(Request $request)
    {  
        $sections =MyFuncs::getSections($request->id); 
          return view('admin.manage.section.selectBox',compact('sections'))->render();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {        
        $user_id=Auth::guard('admin')->user()->id;
        $rules=[
        'section_id' => 'required|max:199',
            'class' => 'required|numeric'   
        ]; 
        $validator = Validator::make($request->all(),$rules);
        if ($validator->fails()) {
            $errors = $validator->errors()->all();
            $response=array();
            $response["status"]=0;
            $response["msg"]=$errors[0];
            return response()->json($response);// response as json
        }  
         
        $data = $request->except('_token');
        $section_count = count($data['section_id']);
         
        for($i=0; $i < $section_count; $i++){
        
            $manageSection = Section::firstOrNew(['class_id'=>$data['class'],'section_id'=>$data['section_id'][$i]]);
            $manageSection->section_id = $data['section_id'][$i];
            $manageSection->class_id = $data['class'];
            $manageSection->last_updated_by = $user_id;
            $manageSection->save();
        }         
       $response['msg'] = 'Save Successfully';
        $response['status'] = 1;
        return response()->json($response); 
         
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
        $classes = MyFuncs::getClasses();
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
    public function classSectionPDF($value='')
    {
        
        $sections = Section::orderBy('class_id','ASC')->orderBy('section_id','ASC')->get();
        $pdf=PDF::setOptions([
            'logOutputFile' => storage_path('logs/log.htm'),
            'tempDir' => storage_path('logs/')
        ])
        ->loadView('admin.manage.section.class_section_pdf',compact('sections'));
        return $pdf->stream('class_section.pdf');
    }
}
