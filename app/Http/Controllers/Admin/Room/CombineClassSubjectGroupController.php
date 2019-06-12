<?php

namespace App\Http\Controllers\Admin\Room;

use App\Http\Controllers\Controller;
use App\Model\Subject;
use App\Model\SubjectType;
use Illuminate\Http\Request;

class CombineClassSubjectGroupController extends Controller
{
    public function index(){
    	$subjectTypes=SubjectType::all();
    	return view('admin.room.combineClassSubjectGroup.view',compact('subjectTypes'));
    }
    public function subjectWiseGroup(Request $request){
      $subjects=Subject::where('subjectType_id',$request->id)->get();
      return view('admin.room.combineClassSubjectGroup.add_group',compact('subjects'));
    }
}
