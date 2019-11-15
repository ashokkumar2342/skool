<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\AcademicYear;
use App\Model\Category;
use App\Model\GuardianRelationType;
use App\Model\IncomeRange;
use App\Model\Profession;
use App\Model\Religion;
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
           $guardianRelationTypes= GuardianRelationType::orderBy('name','ASC')->get();
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
        public function guardianEdit($id=null)
        {
          if ($id!=null) {
            $guardianRelationType=GuardianRelationType::find($id); 
          }
          if ($id==null) {
            $guardianRelationType=''; 
          }
            return view('admin.master.guardian.edit',compact('guardianRelationType')); 
        }
        public function guardianDelete($id)
        {
            $guardianRelationType=GuardianRelationType::find($id);
            $guardianRelationType->delete();
             return  redirect()->back()->with(['message'=>'Delete Successfully','class'=>'success']);
        }
        public function guardianUpdate(Request $request ,$id=null)
        {
            $rules=[
             'name' => 'required|max:30|unique:guardian_relation_types,name,'.$id, 
             'code' => 'required|max:5|unique:guardian_relation_types,code,'.$id 
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
        $guardianRelationType= GuardianRelationType::firstOrNew(['id'=>$id]);
        $guardianRelationType->name=$request->name; 
        $guardianRelationType->code=$request->code; 
        $guardianRelationType->save();
        $response=['status'=>1,'msg'=>'Update Successfully'];
            return response()->json($response);
          }  
        }

        //------------------------religion-----------------------------------------//
       public function religion($id='')
       {
          $religions=Religion::all(); 
          return view('admin.master.religion.list',compact('religions')); 
       }
       public function addForm($id='')
       { 
          if ($id!='') {
            $religion=Religion::find($id);
          }
          if ($id=='') {
            $religion='';
          }
          return view('admin.master.religion.add_form',compact('religion')); 
       }
       public function religionStore(Request $request,$id=null)
       {
         $rules=[
             'name' => 'required|max:30|unique:religions,name,'.$id, 
             'code' => 'required|max:5|unique:religions,code,'.$id 
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
        $religions= Religion::firstOrNew(['id'=>$id]);  
        $religions->name=$request->name; 
        $religions->code=$request->code; 
        $religions->save();
        $response=['status'=>1,'msg'=>'Update Successfully'];
            return response()->json($response);
          }  
       }
       public function religionDestroy($id)
        {
             $id =Crypt::decrypt($id); 
            $Category =Religion::find($id);
            $Category->delete();
             return  redirect()->back()->with(['message'=>'Delete Successfully','class'=>'success']);
        }

       //-------------category-----------------------//
       public function category($id='')
       {
          $categorys=Category::all(); 
          return view('admin.master.category.list',compact('categorys')); 
       }
       public function addCategory($id='')
       {
        if ($id!='') {
           $category=Category::find($id); 
        }
        if ($id=='') {
           $category=''; 
        }
          return view('admin.master.category.add_form',compact('category')); 
       }
       public function categoryStore(Request $request,$id=null)
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
               $Category=Category::firstOrNew(['id'=>$id]);  
               $Category->name=$request->name;  
               $Category->code=$request->code; 
               $Category->save();
                $response=['status'=>1,'msg'=>'Created Successfully'];
              }     return response()->json($response);
        } 
        public function categoryDestroy($id)
        {
             $id =Crypt::decrypt($id); 
            $Category =Category::find($id);
            $Category->delete();
             return  redirect()->back()->with(['message'=>'Delete Successfully','class'=>'success']);
        }
}
