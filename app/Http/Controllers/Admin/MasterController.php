<?php

namespace App\Http\Controllers\Admin;

use App\Helper\MyFuncs;
use App\Http\Controllers\Controller;
use App\Model\AcademicYear;
use App\Model\AdmissionSeat;
use App\Model\BloodGroup;
use App\Model\Category;
use App\Model\Complextion;
use App\Model\GuardianRelationType;
use App\Model\IncomeRange;
use App\Model\Profession;
use App\Model\Religion;
use App\Model\StudentStatus;
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
          $religions=Religion::orderBy('name','ASC')->get(); 
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
          $categorys=Category::orderBy('name','ASC')->get(); 
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
              
                'name' => 'required|max:50|unique:categories,name,'.$id, 
             'code' => 'required|max:3|unique:categories,code,'.$id   
             
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




        //--------------complextion---------------------------------------//
        public function complextion($value='')
        {
          $completions=Complextion::orderBy('name','ASC')->get();
          return view('admin.master.complextion.list',compact('completions')); 
        }
        public function addComplextion($id=null)
        {
           if ($id!=null) {
              $completion=Complextion::find($id);
           }
           if ($id==null) {
              $completion='';
           }
           return view('admin.master.complextion.add_form',compact('completion')); 
        }
        public function complextionStore(Request $request,$id=null)
      {
          $rules=[
              
                'name' => 'required|max:50|unique:complextions,name,'.$id, 
             'code' => 'required|max:3|unique:complextions,code,'.$id   
             
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
               $Category=Complextion::firstOrNew(['id'=>$id]);  
               $Category->name=$request->name;  
               $Category->code=$request->code; 
               $Category->save();
                $response=['status'=>1,'msg'=>'Created Successfully'];
              }     return response()->json($response);
        }
        public function complextionDestroy($id)
        {
             $id =Crypt::decrypt($id); 
            $Category =Complextion::find($id);
            $Category->delete();
             return  redirect()->back()->with(['message'=>'Delete Successfully','class'=>'success']);
        } 




        //--------------blood-group---------------------------------------//
        public function bloodgroup($value='')
        {
          $completions=BloodGroup::orderBy('name','ASC')->get();
          return view('admin.master.bloodGroup.list',compact('completions')); 
        }
        public function addbloodgroup($id=null)
        {
           if ($id!=null) {
              $completion=BloodGroup::find($id);
           }
           if ($id==null) {
              $completion='';
           }
           return view('admin.master.bloodGroup.add_form',compact('completion')); 
        }
        public function bloodgroupStore(Request $request,$id=null)
      {
          $rules=[
              
                'name' => 'required|max:50|unique:blood_groups,name,'.$id, 
               
             
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
               $Category=BloodGroup::firstOrNew(['id'=>$id]);  
               $Category->name=$request->name;  
               
               $Category->save();
                $response=['status'=>1,'msg'=>'Created Successfully'];
              }     return response()->json($response);
        }
        public function bloodgroupDestroy($id)
        {
             $id =Crypt::decrypt($id); 
            $Category =BloodGroup::find($id);
            $Category->delete();
             return  redirect()->back()->with(['message'=>'Delete Successfully','class'=>'success']);
        } 

         //--------------student-status---------------------------------------//
        public function studentStatus($value='')
        {
          $completions=StudentStatus::orderBy('name','ASC')->get();
          return view('admin.master.studentStatus.list',compact('completions')); 
        }
        public function addstudentStatus($id=null)
        {
           if ($id!=null) {
              $completion=StudentStatus::find($id);
           }
           if ($id==null) {
              $completion='';
           }
           return view('admin.master.studentStatus.add_form',compact('completion')); 
        }
        public function studentStatusStore(Request $request,$id=null)
      {
          $rules=[
              
                'name' => 'required|max:50|unique:student_statuses,name,'.$id, 
                'code' => 'required|max:5|unique:student_statuses,code,'.$id, 
            
             
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
               $Category=StudentStatus::firstOrNew(['id'=>$id]);  
               $Category->name=$request->name;  
               $Category->code=$request->code;  
              
               $Category->save();
                $response=['status'=>1,'msg'=>'Created Successfully'];
              }     return response()->json($response);
        }
        public function studentStatusDestroy($id)
        {
             $id =Crypt::decrypt($id); 
            $Category =StudentStatus::find($id);
            $Category->delete();
             return  redirect()->back()->with(['message'=>'Delete Successfully','class'=>'success']);
        } 



        //-----------admission seat-----------------------------

        public function adminssionSeat($value='')
        {
          $adminssionSeats=AdmissionSeat::orderBy('academic_year_id','ASC')->get();  
          return view('admin.master.admissionSeat.list',compact('adminssionSeats')); 
        }
        public function addadminssionSeat($id=null)
        {
          $academicYears=AcademicYear::orderBy('id','ASC')->get();
          $classes=MyFuncs::getClassByHasUser();
          if ($id!=null) {
            $adminssionSeat=AdmissionSeat::find($id);
           }
           if ($id==null) {
            $adminssionSeat='';
           } 
          return view('admin.master.admissionSeat.form',compact('academicYears','classes','adminssionSeat')); 
        }

        public function adminssionSeatStore(Request $request,$id=null)
      {  
          $rules=[
              
                'academic_year_id' => 'required', 
                'class_id' => 'required', 
                'total_seat' => 'required', 
                'from_date' => 'required|date', 
                'last_date' => 'required|date', 
                'test_date' => 'required|date', 
                'retest_date' => 'required|date', 
                'result_date' => 'required|date', 
                
                
            
             
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
               $adminssionSeat=AdmissionSeat::firstOrNew(['id'=>$id]);  
               $adminssionSeat->academic_year_id=$request->academic_year_id;  
               $adminssionSeat->class_id=$request->class_id;  
               $adminssionSeat->total_seat=$request->total_seat;  
               $adminssionSeat->form_fee=$request->from_fee;  
               $adminssionSeat->from_date=$request->from_date;  
               $adminssionSeat->last_date=$request->last_date; 
               $adminssionSeat->test_date=$request->test_date; 
               $adminssionSeat->retest_date=$request->retest_date; 
               $adminssionSeat->result_date=$request->result_date;
               if ($request->hasFile('attachment')) { 
                $attachment=$request->attachment;
                $filename='test_syllabus'.date('d-m-Y').time().'.pdf'; 
                $attachment->storeAs('app/student/test/syllabus/',$filename);
                $adminssionSeat->syllabus=$filename;
                } 
               $adminssionSeat->save();
                $response=['status'=>1,'msg'=>'Submit Successfully'];
              }     return response()->json($response);
        }
}
