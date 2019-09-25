<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\AcademicYear;
use App\Model\GuardianRelationType;
use App\Model\IncomeRange;
use App\Model\Profession;
use Illuminate\Http\Request;
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
        $incomeSlabs = IncomeRange::all();
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
        $validator = Validator::make($request->all(), [
        
            'range' => 'required|max:30|unique:income_ranges',
             
        ]);
        if ($validator->fails()) {                    
             return response()->json(['errors'=>$validator->errors()->all(),'class'=>'error']); 

        }
       $IncomeRange = new IncomeRange();
       $IncomeRange->range = $request->range;
        
       $IncomeRange->save();
        $response = array();
        $response['status'] = 1; 
        $response['msg'] = 'Create Successfully'; 
        return $response; 
    }

    public function incomeSlabEdit($id)
    {   
        $id =Crypt::decrypt($id); 
        $incomeRange =IncomeRange::find($id); 
        return view('admin.master.income_slab.edit',compact('incomeRange')); 
        
    }

    public function incomeSlabUpdate(Request $request,$id)
    {  
         $validator = Validator::make($request->all(), [ 
             'range' => 'required|max:30',
            
         ]);
         if ($validator->fails()) {                    
              return response()->json(['errors'=>$validator->errors()->all(),'class'=>'error']); 
         }
        $id =Crypt::decrypt($id);
        $incomeRange = IncomeRange::find($id);;
        $incomeRange->range = $request->range;
         
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
            $professions = Profession::all();
            return view('admin.master.profession.list',compact('professions'));
        }

         
        /**
         * Store a newly created resource in storage.
         *
         * @param  \Illuminate\Http\Request  $request
         * @return \Illuminate\Http\Response
         */
        public function professionStore(Request $request)
        {  
            $validator = Validator::make($request->all(), [
            
                'name' => 'required|max:30|unique:professions',
                 
            ]);
            if ($validator->fails()) {                    
                $response['status'] = 0; 
            $response['msg'] = 'Already Create'; 
            return $response; 

            }
           $profession = new Profession();
           $profession->name = $request->name;
            
           $profession->save();
            $response = array();
            $response['status'] = 1; 
            $response['msg'] = 'Create Successfully'; 
            return $response; 
        }

        public function professionEdit($id)
        {   
            $id =Crypt::decrypt($id); 
            $profession =Profession::find($id); 
            return view('admin.master.profession.edit',compact('profession')); 
            
        }

        public function professionUpdate(Request $request,$id)
        {  
             $validator = Validator::make($request->all(), [ 
                 'name' => 'required|max:30',
                
             ]);
             if ($validator->fails()) {                    
                  return response()->json(['errors'=>$validator->errors()->all(),'class'=>'error']); 
             }
            $id =Crypt::decrypt($id);
            $profession = Profession::find($id);;
            $profession->name = $request->name;
             
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
        $guardianRelationType->name=$request->guardian; 
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
        $guardianRelationType->name=$request->guardian; 
        $guardianRelationType->save();
        $response=['status'=>1,'msg'=>'Update Successfully'];
            return response()->json($response);
          }  
        }
}
