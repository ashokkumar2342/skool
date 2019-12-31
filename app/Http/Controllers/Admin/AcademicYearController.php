<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\AcademicYear;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use PDF;
class AcademicYearController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $academicYears = AcademicYear::orderBy('start_date','DESC')->get();
        return view('admin.master.academicyear.list',compact('academicYears'));
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
        $validator = Validator::make($request->all(), [
        
            'name' => 'required|max:30|unique:academic_years',
            'start_date' => 'required', 
            'end_date' => 'required', 
        ]);
        if ($validator->fails()) {                    
             return response()->json(['errors'=>$validator->errors()->all(),'class'=>'error']); 

        }
       $academicYears = new AcademicYear();
       $academicYears->name = $request->name;
       $academicYears->start_date = date('Y-m-d',strtotime($request->start_date)) ;
       $academicYears->end_date = date('Y-m-d',strtotime($request->end_date));
       $academicYears->description = $request->description; 
       $academicYears->last_updated_by = $admin; 
       $academicYears->save();
       return response()->json([$academicYears,'class'=>'success','message'=>'Academic Year Created Successfully']);
    }

    public function edit($id='')
    {   if ($id!='') {
        $id =Crypt::decrypt($id); 
        $academicYear =AcademicYear::find($id); 
         }
         if ($id=='') { 
        $academicYear =''; 
         }
        return view('admin.master.academicyear.edit',compact('academicYear')); 
        
    }

    public function update(Request $request,$id='')
    { $admin=Auth::guard('admin')->user()->id; 
     $id =Crypt::decrypt($id);
        $rules=[
          
            'name' => 'required|unique:academic_years,name,'.$id,
             'start_date' => 'required', 
             'end_date' => 'required', 
       
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
        $academicYears = AcademicYear::firstOrNew(['id'=>$id]);
        $academicYears->name = $request->name;
        $academicYears->start_date = date('Y-m-d',strtotime($request->start_date)) ;
        $academicYears->end_date = date('Y-m-d',strtotime($request->end_date));
        $academicYears->description = $request->description; 
        $academicYears->last_updated_by = $admin; 
        $academicYears->save();
        $response=['status'=>1,'msg'=>'Created Successfully'];
            return response()->json($response);
        } 
       
    }


    public function search(Request $request)
    {
        $academic = AcademicYear::find($request->academic_year_id);

        return response()->json(['start_date'=>date('d-m-Y',strtotime($academic->start_date)),'end_date'=>date('d-m-Y',strtotime($academic->end_date))]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\AcademicYear  $academicYear
     * @return \Illuminate\Http\Response
     */
    public function show(AcademicYear $academicYear)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\AcademicYear  $academicYear
     * @return \Illuminate\Http\Response
     */
     

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\AcademicYear  $academicYear
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {  
        $id =Crypt::decrypt($id);

        $academicYear =AcademicYear::find($id);
        $academicYear->delete();
         return  redirect()->back()->with(['message'=>'Delete Successfully','class'=>'success']);
    }
    public function defaultValue($id)
    {
          $academicYear =AcademicYear::all(); 
          foreach ($academicYear as  $value) {
             $academicYear =AcademicYear::find($value->id);
             $academicYear->status=0;
             $academicYear->save(); 
          }
          $academicYear =AcademicYear::find($id); 
          $academicYear->status=1;
          $academicYear->save();
          return  redirect()->back()->with(['message'=>'Default Value Set Successfully','class'=>'success']);
    }
    public function pdfGenerate()
    {
        $academicYears = AcademicYear::orderBy('start_date','DESC')->get();
        $pdf=PDF::setOptions([
            'logOutputFile' => storage_path('logs/log.htm'),
            'tempDir' => storage_path('logs/')
        ])
        ->loadView('admin.master.academicyear.pdf_generate',compact('academicYears'));
        return $pdf->stream('academicYear.pdf');
    }
}
