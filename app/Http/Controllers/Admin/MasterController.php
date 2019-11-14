<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\AcademicYear;
use App\Model\GuardianRelationType;
use App\Model\IncomeRange;
use App\Model\Profession;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Validator;

class MasterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function incomeSlab()
    {
        $incomeSlabs = IncomeRange::orderBy('code','ASC')->get();
        return view('admin.master.income_slab.list',compact('incomeSlabs'));
    }

     
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function incomeSlabStore(Request $request)
    { 
        $admin=Auth::guard('admin')->user()->id;
        $rules=[
        'range' => 'required|max:30|unique:income_ranges',
            'code' => 'required|string|max:5|unique:income_ranges',
        ];
      $validator = Validator::make($request->all(),$rules);
      if ($validator->fails()) {
          $errors = $validator->errors()->all();
          $response=array();
          $response["status"]=0;
          $response["msg"]=$errors[0];
          return response()->json($response);// response as json
      } 
       $IncomeRange = new IncomeRange();
       $IncomeRange->range = $request->range;
       $IncomeRange->code = $request->code;
       $IncomeRange->last_updated_by =$admin;
        
       $IncomeRange->save();
        $response = array();
        $response['status'] = 1; 
        $response['msg'] = 'Create Successfully'; 
        return $response; 
    }

    public function incomeSlabEdit($id='')
    {   if ($id!=null) {
        $id =Crypt::decrypt($id); 
        $incomeRange =IncomeRange::find($id); 
       }
       if ($id==null) {
        
        $incomeRange =''; 
       }
        return view('admin.master.income_slab.edit',compact('incomeRange')); 
        
    }

    public function incomeSlabUpdate(Request $request,$id='')
    {    
      $id =Crypt::decrypt($id);
      $admin=Auth::guard('admin')->user()->id;

        $rules=[
        'range' => 'required|max:30|unique:income_ranges,range,'.$id,
            'code' => 'required|string|max:5|unique:income_ranges,code,'.$id,
        ];
      $validator = Validator::make($request->all(),$rules);
      if ($validator->fails()) {
          $errors = $validator->errors()->all();
          $response=array();
          $response["status"]=0;
          $response["msg"]=$errors[0];
          return response()->json($response);// response as json
      } 
        
        $incomeRange = IncomeRange::firstOrNew(['id'=>$id]);;
        $incomeRange->range = $request->range;
        $incomeRange->code = $request->code;
        $incomeRange->last_updated_by =$admin;
         
        $incomeRange->save(); 
        $response = array();
        $response['status'] = 1; 
        $response['msg'] = 'Update Successfully'; 
        return $response; 
    }

 

     
    public function incomeSlabDestroy($id)
    {  
        $id =Crypt::decrypt($id);

        $IncomeRange =IncomeRange::find($id);
        $IncomeRange->delete();
         return  redirect()->back()->with(['message'=>'Delete Successfully','class'=>'success']);
    }



    public function profession()
        {
            $professions = Profession::orderBy('name','ASC')->get();
            return view('admin.master.profession.list',compact('professions'));
        }

         
        /**
         * Store a newly created resource in storage.
         *
         * @param  \Illuminate\Http\Request  $request
         * @return \Illuminate\Http\Response
         */
        public function professionStore(Request $request)
        {  $admin=Auth::guard('admin')->user()->id;
            $rules=[
            'name' => 'required|max:30|unique:professions',
            'code' => 'required|max:5|unique:professions',
        ];
          $validator = Validator::make($request->all(),$rules);
          if ($validator->fails()) {
              $errors = $validator->errors()->all();
              $response=array();
              $response["status"]=0;
              $response["msg"]=$errors[0];
              return response()->json($response);// response as json
          }  
           $profession = new Profession();
           $profession->name = $request->name;
           $profession->code = $request->code;
           $profession->last_updated_by = $admin; 
           $profession->save();
            $response = array();
            $response['status'] = 1; 
            $response['msg'] = 'Create Successfully'; 
            return $response; 
        }

        public function professionEdit($id='')
        {   if ($id!='') {
            $id =Crypt::decrypt($id); 
            $profession =Profession::find($id); 
            }
            if ($id=='') {
             
            $profession =''; 
            }
            return view('admin.master.profession.edit',compact('profession')); 
            
        }

        public function professionUpdate(Request $request,$id='')
        {  $id =Crypt::decrypt($id);
            $admin=Auth::guard('admin')->user()->id;
            $rules=[
            'name' => 'required|max:30|unique:professions,name,'.$id,
            'code' => 'required|min:2|max:5|unique:professions,code,'.$id,
        ];
          $validator = Validator::make($request->all(),$rules);
          if ($validator->fails()) {
              $errors = $validator->errors()->all();
              $response=array();
              $response["status"]=0;
              $response["msg"]=$errors[0];
              return response()->json($response);// response as json
          }  
            
            $profession = Profession::firstOrNew(['id'=>$id]);;
            $profession->name = $request->name;
            $profession->code = $request->code;
            $profession->last_updated_by = $admin;
             
            $profession->save(); 
            $response = array();
            $response['status'] = 1; 
            $response['msg'] = 'Update Successfully'; 
            return $response; 
        }

     

         
        public function professionDestroy($id)
        {  
            $id =Crypt::decrypt($id);

            $profession =Profession::find($id);
            $profession->delete();
             return  redirect()->back()->with(['message'=>'Delete Successfully','class'=>'success']);
        }




//-----------------guardian------------------------------------------------------------------        
        public function guardian()
        {
           $guardianRelationTypes= GuardianRelationType::orderBy('id','ASC')->get();
            return view('admin.master.guardian.list',compact('guardianRelationTypes')); 
        }
        public function guardianStore(Request $request)
        {
           $rules=[
            'name' => 'required|max:30|unique:guardian_relation_types',
              
            
             
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
        $guardianRelationType=new GuardianRelationType();
        $guardianRelationType->name=$request->name; 
        $guardianRelationType->save();
        $response=['status'=>1,'msg'=>'Created Successfully'];
            return response()->json($response);
          }  
        }
        public function guardianEdit($id)
        {
            $guardianRelationType=GuardianRelationType::find($id);
            return view('admin.master.guardian.edit',compact('guardianRelationType')); 
        }
        public function guardianDelete($id)
        {
            $guardianRelationType=GuardianRelationType::find($id);
            $guardianRelationType->delete();
             return  redirect()->back()->with(['message'=>'Delete Successfully','class'=>'success']);
        }
        public function guardianUpdate(Request $request ,$id)
        {
            $rules=[
             'name' => 'required|max:30|unique:guardian_relation_types,name,'.$id 
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
        $guardianRelationType= GuardianRelationType::find($id);
        $guardianRelationType->name=$request->name; 
        $guardianRelationType->save();
        $response=['status'=>1,'msg'=>'Update Successfully'];
            return response()->json($response);
          }  
        }
}
