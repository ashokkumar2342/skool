<?php

namespace App\Http\Controllers\Admin;

use App\Helper\MyFuncs;
use App\Http\Controllers\Controller;
use App\Model\AcademicYear;
use App\Model\AdmissionSeat;
use App\Model\AdmissionSeatDefault;
use App\Model\BloodGroup;
use App\Model\Category;
use App\Model\Complextion;
use App\Model\GuardianRelationType;
use App\Model\IncomeRange;
use App\Model\Profession;
use App\Model\Religion;
use App\Model\ReportTemplate;
use App\Model\ReportsType;
use App\Model\StudentStatus;
use App\Model\Subject;
use App\Model\Syllabus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Validator;
use PDF;

class MasterController extends Controller
{
   public function syllabus()
   {
     $academicYears=AcademicYear::orderBy('id','ASC')->get();
     $classTypes=MyFuncs::getClassByHasUser();
     return view('admin.master.syllabus.index',compact('academicYears','classTypes'));
   }
   public function syllabusAddForm(Request $request)
   {
     $classTypes=MyFuncs::getClassByHasUser();
     $academicYears=AcademicYear::orderBy('id','ASC')->get();
     $subjects=Subject::where('classType_id',$request->id)->get();
     return view('admin.master.syllabus.add_form',compact('classTypes','academicYears','subjects'));
   }
   public function syllabusClassSubject(Request $request)
   {
     $subjects=Subject::where('classType_id',$request->id)->get();
     return view('admin.master.syllabus.subject',compact('subjects'));
   }
   public function syllabusStore(Request $request)
   {
       $rules=[
            'academic_year_id' => 'required', 
            'class_id' => 'required', 
            'subject_id' => 'required', 
            'syllabus' => 'required', 
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
       $Syllabuss= Syllabus::firstOrNew(['academic_year_id'=>$request->academic_year_id,'class_id'=>$request->class_id,'subject_id'=>$request->subject_id,]);
       $Syllabuss->academic_year_id=$request->academic_year_id;
       $Syllabuss->class_id=$request->class_id;
       $Syllabuss->subject_id=$request->subject_id;
       if ($request->hasFile('syllabus')) { 
                $syllabus=$request->syllabus;
                $filename='syllabus'.$request->academic_year_id.'_'.$request->class_id.'_'.$request->subject_id.'.pdf'; 
                $syllabus->storeAs('student/syllabus/',$filename);
                $Syllabuss->syllabus=$filename;
      }
      $Syllabuss->save();
      $response=['status'=>1,'msg'=>'Submit Successfully'];
      return response()->json($response);
   }
 }
    public function syllabusShow(Request $request)
    {
          $Syllabuss= Syllabus::where('academic_year_id',$request->academic_year_id)
                                ->where('class_id',$request->class_id)
                                ->get();
          $response=array();
          $response["status"]=1;
          $response["data"]=view('admin.master.syllabus.syllabus_list',compact('Syllabuss'))->render();
          return $response;
      
    }
    public function syllabusView($id)
  {
        $documentUrl = Storage_path() . '/app/student/syllabus/'.$id; 
        return response()->file($documentUrl); 
  }

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

   public function incomeSlabReport($value='')
    {
        $incomeSlabs = IncomeRange::orderBy('code','ASC')->get();
        $pdf=PDF::setOptions([
            'logOutputFile' => storage_path('logs/log.htm'),
            'tempDir' => storage_path('logs/')
        ])
        ->loadView('admin.master.income_slab.pdf',compact('incomeSlabs'));
        return $pdf->stream('room.pdf');
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

       public function professionReport($value='')
    {
        $professions = Profession::orderBy('name','ASC')->get();
        $pdf=PDF::setOptions([
            'logOutputFile' => storage_path('logs/log.htm'),
            'tempDir' => storage_path('logs/')
        ])
        ->loadView('admin.master.profession.pdf',compact('professions'));
        return $pdf->stream('room.pdf');
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
        public function guardianReport($value='')
       {
        $guardianRelationTypes= GuardianRelationType::orderBy('name','ASC')->get();
        $pdf=PDF::setOptions([
            'logOutputFile' => storage_path('logs/log.htm'),
            'tempDir' => storage_path('logs/')
        ])
        ->loadView('admin.master.guardian.pdf',compact('guardianRelationTypes'));
        return $pdf->stream('room.pdf');
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
        public function religionReport($value='')
    {
       $religions=Religion::orderBy('name','ASC')->get(); 
        $pdf=PDF::setOptions([
            'logOutputFile' => storage_path('logs/log.htm'),
            'tempDir' => storage_path('logs/')
        ])
        ->loadView('admin.master.religion.pdf',compact('religions'));
        return $pdf->stream('room.pdf');
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

       public function categoryReport($value='')
       {
        $categorys=Category::orderBy('name','ASC')->get(); 
        $pdf=PDF::setOptions([
            'logOutputFile' => storage_path('logs/log.htm'),
            'tempDir' => storage_path('logs/')
        ])
        ->loadView('admin.master.category.pdf',compact('categorys'));
        return $pdf->stream('room.pdf');
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

         public function complextionReport($value='')
        {
        $completions=Complextion::orderBy('name','ASC')->get();
        $pdf=PDF::setOptions([
            'logOutputFile' => storage_path('logs/log.htm'),
            'tempDir' => storage_path('logs/')
        ])
        ->loadView('admin.master.complextion.pdf',compact('completions'));
        return $pdf->stream('room.pdf');
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
         public function bloodgroupReport($value='')
        {
        $completions=BloodGroup::orderBy('name','ASC')->get();
        $pdf=PDF::setOptions([
            'logOutputFile' => storage_path('logs/log.htm'),
            'tempDir' => storage_path('logs/')
        ])
        ->loadView('admin.master.bloodGroup.pdf',compact('completions'));
        return $pdf->stream('room.pdf');
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

         public function studentStatusReport($value='')
        {
        $completions=StudentStatus::orderBy('name','ASC')->get();
        $pdf=PDF::setOptions([
            'logOutputFile' => storage_path('logs/log.htm'),
            'tempDir' => storage_path('logs/')
        ])
        ->loadView('admin.master.studentStatus.pdf',compact('completions'));
        return $pdf->stream('room.pdf');
       }

        //-----------admission seat-----------------------------

        public function adminssionSeat($value='')
        {
          $adminssionSeats=AdmissionSeat::orderBy('academic_year_id','ASC')->get();  
          return view('admin.master.admissionSeat.list',compact('adminssionSeats')); 
        }
        public function addadminssionSeat($id=null)
        {
          $userId=Auth::guard('admin')->user()->id; 
          $academicYears=AcademicYear::orderBy('id','ASC')->get();
          $classes=MyFuncs::getClassByHasUser();
          if ($id!=null) {
            $adminssionSeat=AdmissionSeat::find(Crypt::decrypt($id));
            $adminssionSeatId=AdmissionSeat::find(Crypt::decrypt($id));
           }
           if ($id==null) {
            $adminssionSeat=AdmissionSeatDefault::where('user_id',$userId)->first();
           } 
          return view('admin.master.admissionSeat.form',compact('academicYears','classes','adminssionSeat','adminssionSeatId')); 
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
                $attachment->storeAs('student/admissionschedule/syllabus/',$filename);
                $adminssionSeat->syllabus=$filename;
                } 
               $adminssionSeat->save();
                $response=['status'=>1,'msg'=>'Submit Successfully'];
              }     return response()->json($response);
        }
        public function adminssionSeatDestroy($id)
        {
           $adminssionSeat=AdmissionSeat::find(Crypt::decrypt($id));
           $adminssionSeat->delete();  
           return redirect()->back()->with(['message'=>'Delete Successfully','class'=>'success']);
        }
        public function adminssionSeatDownload($id){  
        $documentUrl = Storage_path() . '/app/student/admissionschedule/syllabus/'.$id;
        @mkdir($documentUrl, 0755, true);  
        return response()->file($documentUrl); 
       }

       //--------------report-Template------------------------------------------//

       public function reportTemplate()
       {
          $ReportsTypes=ReportsType::orderBy('id','ASC')->get();
          return view('admin.master.reportTemplate.index',compact('ReportsTypes'));
       }
       public function reportTemplateOnChange(Request $request)
       {
          $ReportTemplates=ReportTemplate::where('reports_type_id',$request->id)->get();
          return view('admin.master.reportTemplate.table',compact('ReportTemplates'));  
       }
       public function reportTemplateStatus($id,$reports_type_id)
       {
          $ReportTemplates =ReportTemplate::where('reports_type_id',$reports_type_id)->get(); 
          foreach ($ReportTemplates as  $value) {
             $ReportTemplates =ReportTemplate::find($value->id);
             $ReportTemplates->status=0;
             $ReportTemplates->save(); 
          }
          $ReportTemplates =ReportTemplate::find($id); 
          $ReportTemplates->status=1;
          $ReportTemplates->save();
          $response=['status'=>1,'msg'=>'Change Successfully'];
          return response()->json($response);
       }
}
