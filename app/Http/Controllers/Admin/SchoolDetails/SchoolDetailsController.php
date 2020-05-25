<?php

namespace App\Http\Controllers\Admin\SchoolDetails;

use App\Http\Controllers\Controller;
use App\Model\Quote;
use App\School_details;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Storage;
use Illuminate\Support\Facades\Validator;
use PDF;

class SchoolDetailsController extends Controller
{
    public function index()
    {
    	 return view('schoolDetails.view');
    }
    public function addForm()
    {
          $schoolDetail= School_details::first(); 
    	 return view('schoolDetails.add_form',compact('schoolDetail'));
    }
    public function store(Request $request)
    {  

    	$rules=[
    	  
            // 'name' => 'required', 
            // 'mobile' => 'required|digits:10', 
            // 'contact' => 'required|digits:10', 
            // 'logo' => 'required', 
            // 'image' => 'required', 
            // 'address' => 'required', 
             
       
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

    	 $schoolDetails= School_details::firstOrNew(['id'=>$request->id]);    
        if ($request->hasFile('logo')) {
               $logoImage=$request->logo; 
                $filelogo='logo'.date('d-m-Y').time().'.jpg'; 
                $path ='school/logo/';
                $logoImage->storeAs($path,$filelogo);
                $schoolDetails->logo=$path.$filelogo; 
        }  
        if ($request->hasFile('image')) {
            $image=$request->image;            
            $filename='image'.date('d-m-Y').time().'.jpg';  
            $image->storeAs($path,$filename);    
            $schoolDetails->image=$path.$filename;
          }   
    	
    	$schoolDetails->name=$request->name; 
    	$schoolDetails->mobile=$request->mobile; 
    	$schoolDetails->contact=$request->contact; 

    	
    	 
    	$schoolDetails->address=$request->address; 
        $schoolDetails->report_header=$request->report_header; 
    	$schoolDetails->save();
    	$response=['status'=>1,'msg'=>'Created Successfully'];
            return response()->json($response);
        

        }  
    }
    public function tableShow()
    {
         $SchoolDetail=School_details::first();
         return view('schoolDetails.table_show',compact('SchoolDetail'));
    }




    public function quotesindex(){
        return view('schoolDetails.quotes.index'); 
    }

    public function quotesAddForm(){
        return view('schoolDetails.quotes.add_form'); 
    }
    public function quotesStore(Request $request)
    {

        $rules=[
          
             'date' => 'required', 
            'discription' => 'required',
       
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
         $userId=Auth::guard('admin')->user()->id;
        $Quotes= new Quote(); 
        $Quotes->created_by=$userId; 
        $Quotes->date=$request->date; 
        $Quotes->discription=$request->discription; 
        $Quotes->save();
        $response=['status'=>1,'msg'=>'Created Successfully'];
            return response()->json($response);
        

        }  
    }
    public function quotesTableShow()
    {
         $Quotes=Quote::all();
         return view('schoolDetails.quotes.table_show',compact('Quotes'));
    }
    public function quotesEdit($id)
    {
         $Quotes=Quote::find($id);
         return view('schoolDetails.quotes.edit',compact('Quotes'));
    }
    public function quotesUpdate(Request $request,$id)
    {

        $rules=[
          
            'date' => 'required', 
            'discription' => 'required', 
            
             
       
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
         $userId=Auth::guard('admin')->user()->id;
        $Quotes=Quote::find($id); 
        $Quotes->created_by=$userId; 
        $Quotes->date=$request->date; 
        $Quotes->discription=$request->discription; 
        $Quotes->save();
        $response=['status'=>1,'msg'=>'Update Successfully'];
            return response()->json($response);
        

        }  
    }
    public function quotesDestroy($id){
         $Quotes=Quote::find($id); 
         $Quotes->delete();
         return  redirect()->back()->with(['message'=>'Delete Successfully','class'=>'success']);
    }

    public function logoImage($image)
    {
         $img = Storage::disk('public')->get('school/'.$image);
        return response($img);
    }
    public function reportCheck($value='')
    {
       
        $pdf=PDF::setOptions([
            'logOutputFile' => storage_path('logs/log.htm'),
            'tempDir' => storage_path('logs/')
        ])
        ->loadView('schoolDetails.logo_header');
        return $pdf->stream('ckeck.pdf');
    }
}

