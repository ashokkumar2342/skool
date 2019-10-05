<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\Section;
use App\Model\SectionType;
use Illuminate\Http\Request;
use Validator;
use PDF;

class SectionTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $sections = SectionType::orderBy('sorting_order_id','ASC')->get();
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
            'name' => 'required|max:30|unique:section_types',             
            'code' => 'required|max:5|unique:section_types',             
            'sorting_order_id' => 'required|max:2|unique:section_types',             
            ]);
        $section = new SectionType();
        $section->name = $request->name;        
        $section->code = $request->code;        
        $section->sorting_order_id = $request->sorting_order_id;        
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
        
        return view('admin.manage.section.section_edit',compact('sectionType'));
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
        $id=$sectionType->id;
         $rules=[
          'name' => 'required|max:30|unique:section_types,name,'.$id,
            'code' => 'required|max:5|unique:section_types,code,'.$id,
            'sorting_order_id' => 'required|max:2|unique:section_types,sorting_order_id,'.$id,
            
           
         ];

         $validator = Validator::make($request->all(),$rules);
         if ($validator->fails()) {
             $errors = $validator->errors()->all();
             $response=array();
             $response["status"]=0;
             $response["msg"]=$errors[0];
             return response()->json($response);// response as json
         }
          else {
              
             $sectionType->name = $request->name; 
             $sectionType->code = $request->code; 
             $sectionType->sorting_order_id = $request->sorting_order_id; 
             $sectionType->save();
              $response=['status'=>1,'msg'=>'Updated Successfully'];
             return response()->json($response); 
         }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\SectionType  $sectionType
     * @return \Illuminate\Http\Response
     */
    public function destroy(SectionType $sectionType)
    {
        if ($sectionType->delete()) {
            return redirect()->route('admin.section.list')->with(['class'=>'success','message'=>'Section Delete successfully']);
        }
    }
    public function pdfGenerate($value='')
    {
        $sections=SectionType::orderBy('code','ASC')->get();
         $pdf = PDF::loadView('admin.manage.section.section_pdf',compact('sections'));
        return $pdf->stream('section.pdf');
       
    }
     
}
