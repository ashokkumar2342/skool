<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\FinanceYear;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Validator;

class FinanceYearController extends Controller
{
    public function index(){
        $financeYears=FinanceYear::orderBy('name','ASC')->get();   
    	return view('admin.finance.financeYear.index',compact('financeYears'));
    }
    public function addForm($id=null){

        if ($id!=null) {
        	$academicYear=FinanceYear::find(Crypt::decrypt($id));  
        }
        if ($id==null) {
        	$academicYear='';  
        }
        return view('admin.finance.financeYear.add_form',compact('academicYear'));
    }
    public function store(Request $request,$id='')
    { $admin=Auth::guard('admin')->user()->id; 
     $id =Crypt::decrypt($id);
        $rules=[
          
            'name' => 'required|unique:finance_years,name,'.$id,
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
        $academicYears = FinanceYear::firstOrNew(['id'=>$id]);
        $academicYears->name = $request->name;
        $academicYears->start_date = date('Y-m-d',strtotime($request->start_date)) ;
        $academicYears->end_date = date('Y-m-d',strtotime($request->end_date));
        $academicYears->description = $request->description; 
        $academicYears->last_updated_by = $admin; 
        $academicYears->save();
        $response=['status'=>1,'msg'=>'Submit Successfully'];
            return response()->json($response);
        } 
       
    }
    public function destroy($id)
    {
    	$departments=FinanceYear::find(Crypt::decrypt($id));
    	$departments->delete();
    	return redirect()->back()->with(['message'=>'Delete Successfully','class'=>'success']);
    }
}
