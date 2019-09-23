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
        $manageSubjects = Subject::all();
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
         
         foreach ($request->value as $key => $value) {
          
           $subject = Subject::where(['classType_id'=>$request->class,'subjectType_id'=>$key])->firstOrNew(['subjectType_id'=>$key]);
           $subject->subjectType_id = $key;
           $subject->isoptional_id = $value;
           $subject->classType_id = $request->class;
           $subject->save();

        }
           $message = 'Add Subject Succesfully';
           Event::fire(new UserActivity($message));
        return response()->json(['response'=>'OK','message'=>'Add Subject Succesfully', 'class'=>'sucess']);

    }
    public function search(Request $request)
    {

        $subjectTypes = SubjectType::all(); 

        foreach ($subjectTypes as $subjectType) {
            $checked = (\App\Model\Subject::where(['subjectType_id'=>$subjectType->id,'classType_id'=>$request->class])->count())?'checked':'';
            $row = '<tr>
            <td>'.$subjectType->code.'</td>
            <td> '.'<input type="checkbox" class="checkbox" '.$checked.' name="subject_id[]" value="'.$subjectType->id.'">'.  '</td>
            <td>'.$subjectType->name.'</td>
             ';
            // <input type="checkbox"  class="checkbox" name="subject_id[]" value="{{$subject->id}}">

                              

            foreach(\App\Model\Isoptional::all() as $optional){
                $checked = (\App\Model\Subject::where(['subjectType_id'=>$subjectType->id,'isoptional_id'=>$optional->id,'classType_id'=>$request->class])->count())?'checked':'';
                      $row .='<td >
                      <label class="radio-inline"><input type="radio" '.$checked.' name="value['.$subjectType->id.']" class="'. str_replace(' ', '_', strtolower($optional->name)).'"   value="'. $optional->id .'"> '. $optional->name .' </label>
                      </td>';
            }
            $row .= '</tr>';
            $options[] = [$row];
        }   
        return response()->json($options);
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
    public function destroy(Subject $subject)
    {
         $subject=Subject::find($subject);
         $subject->delete();
          return  redirect()->back()->with(['message'=>'Delete Successfully','class'=>'success']);
    }
    public function classSubjectPDF($value='')
    {
        $manageSubjects=Subject::orderBy('classType_id','ASC')->get();
         $pdf = PDF::loadView('admin.subject.class_subject_pdf',compact('manageSubjects'));
        return $pdf->stream('section.pdf');
    }
}
