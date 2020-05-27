<?php

namespace App\Http\Controllers\Admin;

use App\Events\UserActivity;
use App\Helper\MyFuncs;
use App\Http\Controllers\Controller;
use App\Model\ClassType;
use App\Model\Subject;
use App\Model\SubjectType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\Auth;
use PDF;
class SubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subjectTypes = SubjectType::all();
        $manageSubjects = Subject::orderBy('classType_id','ASC')->get();
        $classes = MyFuncs::getClasses(); 
        return view('admin.subject.manageSubject',compact('subjectTypes','manageSubjects','classes'));
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
         foreach ($request->value as $key => $value) {
          
           $subject = Subject::where(['classType_id'=>$request->class,'subjectType_id'=>$key])->firstOrNew(['subjectType_id'=>$key]);
           $subject->subjectType_id = $key;
           $subject->isoptional_id = $value;
           $subject->classType_id = $request->class;
           $subject->last_updated_by = $admin;
           $subject->save();

        }
           $message = 'Add Subject Succesfully';
           Event::fire(new UserActivity($message));
        return response()->json(['response'=>'OK','message'=>'Add Subject Succesfully', 'class'=>'sucess']);

    }
    public function search(Request $request)
    {

        $subjectTypes = SubjectType::orderBy('name','ASC')->get(); 
      $class = $request->id; 

     
         return view('admin.subject.subject_list',compact('subjectTypes','class'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function show(Subject $subject)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function edit(Subject $subject)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Subject $subject)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    { 
         $subject=Subject::find($id);
         $subject->delete();
          return  redirect()->back()->with(['message'=>'Delete Successfully','class'=>'success']);
    }
    public function classSubjectPDF(Request $request)
    {
        $conditionVal=$request->optradio;
        if ($request->optradio=='class_wise') {
          $manageSubjects=Subject::orderBy('classType_id','ASC')->get()->groupBy('classType_id'); 
        }
        elseif ($request->optradio=='all') { 
        $manageSubjects=Subject::orderBy('classType_id','ASC')->get();
        }
         $pdf = PDF::setOptions([
            'logOutputFile' => storage_path('logs/log.htm'),
            'tempDir' => storage_path('logs/')
        ])
        ->loadView('admin.subject.class_subject_pdf',compact('manageSubjects','conditionVal'));
        return $pdf->stream('section.pdf');
    }
}
