<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\SubjectType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use PDF;
class SubjectTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subjects = SubjectType::orderBy('sorting_order_id','ASC')->get();
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
         
          $admin=Auth::guard('admin')->user()->id;
         $request->validate([
            'sorting_order_id' => 'required|max:2|unique:subject_types',
         'name' => 'required|min:2|max:50|unique:subject_types',
            'code' => 'required|max:10|unique:subject_types',
         ]);
         
        $subject = new SubjectType();
        $subject->name = $request->name;
        $subject->code = $request->code;
        $subject->sorting_order_id = $request->sorting_order_id;
        $subject->last_updated_by = $admin;
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
    public function edit($id)
    {

        $subjects = SubjectType::find($id);
        return view('admin.subject.subject_edit',compact('subjects'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\SubjectType  $subjectType
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$subjectType)
    { 
        $admin=Auth::guard('admin')->user()->id;
        $rules=[
          'name' => 'required|min:2|max:30|unique:subject_types,name,'.$subjectType,
            'code' => 'required|max:10|unique:subject_types,code,'.$subjectType,
            'sorting_order_id' => 'required|max:2|unique:subject_types,sorting_order_id,'.$subjectType,
       
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
        $subjectType= SubjectType::find($subjectType);
        $subjectType->name = $request->name;
        $subjectType->code = $request->code;
        $subjectType->sorting_order_id = $request->sorting_order_id;
        $subjectType->last_updated_by = $admin;
        $subjectType->save();
        $response=['status'=>1,'msg'=>'Update Successfully'];
            return response()->json($response);
        } 
        
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
    public function pdfGenerate($value='')
    {
        $subjects=SubjectType::orderBy('code','ASC')->get();
         $pdf = PDF::setOptions([
            'logOutputFile' => storage_path('logs/log.htm'),
            'tempDir' => storage_path('logs/')
        ])
        ->loadView('admin.subject.subject_pdf',compact('subjects'));
        return $pdf->stream('section.pdf');
    }
}
