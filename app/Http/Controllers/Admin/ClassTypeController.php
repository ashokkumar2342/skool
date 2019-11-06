<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\ClassFee;
use App\Model\ClassType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use PDF;
class ClassTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $classes = ClassType::orderBy('shorting_id','asc')->get();
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
         
        $admin=Auth::guard('admin')->user()->id;
        $this->validate($request,[
            'name' => 'required|max:20|unique:class_types',
            'code' => 'required|max:5|unique:class_types,alias',
            'shorting_id' => 'required|max:2|unique:class_types',
            ]);
        $class = new ClassType();
        $class->name = $request->name;
        $class->alias = $request->code;
        $class->shorting_id = $request->shorting_id;
        $class->last_updated_by = $admin;
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
    public function edit($id=null)
    {
        if ($id!=null) {
             $classes= ClassType::find($id); 
        }else{
            $classes=null;
        }
        
        return view('admin.manage.class.edit',compact('classes','classType'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ClassType  $classType
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id=null)
    {  $admin=Auth::guard('admin')->user()->id;
         $rules=[
          'name' => 'required|max:20|unique:class_types,name,'.$id,
            'code' => 'required|max:5|unique:class_types,alias,'.$id,
            'shorting_id' => 'required|max:2|unique:class_types,shorting_id,'.$id,
            
           
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
             $classType= ClassType::firstOrNew(['id'=>$id]); 
             $classType->name = $request->name;
            $classType->alias = $request->code;
            $classType->shorting_id = $request->shorting_id;
            $classType->last_updated_by = $admin;
             $classType->save();
              $response=['status'=>1,'msg'=>'Submit Successfully'];
             return response()->json($response); 
         }
         
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ClassType  $classType
     * @return \Illuminate\Http\Response
     */
    public function destroy(ClassType $classType)
    { 
         $classes = ClassType::find($classType->id);
        if ($classes->delete()) {
            return redirect()->back()->with(['class'=>'success','message'=>'class deleted success ...']);
        }
        return redirect()->back()->with(['class'=>'error','message'=>'Whoops ! Look like somthing went wrong ..']);
    }
    public function pdfGenerate()
    {
         
        $classes = ClassType::orderBy('shorting_id','ASC')->get();
        $pdf = PDF::setOptions([
            'logOutputFile' => storage_path('logs/log.htm'),
            'tempDir' => storage_path('logs/')
        ])
        ->loadView('admin.manage.class.class_pdf',compact('classes')); 
        return $pdf->stream('class.pdf');
         
    }
}
