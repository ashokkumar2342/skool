<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Student;
use Illuminate\Http\Request;

class StudentSearchController extends Controller
{
     public function index(){
     	return view('admin.finance.search');
     }

    public function search(Request $request){
     	$search = $request->input('search');
  
 	    $students = Student::where('name', 'like','%'.$search.'%')
 	       ->orWhere('registration_no', 'like', '%'.$search.'%')
 	       ->orWhere('father_name', 'like', '%'.$search.'%')
 	       ->orWhere('mother_name', 'like', '%'.$search.'%')
 	       ->orWhere('father_mobile', 'like', '%'.$search.'%')
 	       ->orWhere('dob', 'like', '%'.$search.'%')
 	       ->take(8)->get();
 	       $data = view('admin.finance.feecollection.stuentSearchTable',compact('students'))->render();
           return response()->json($data);
  		// return response()->json(['students'=>$students]);
 	    }
      
    public function viewmember($id){
  
         $student = Student::find($id);
  		return view('admin.finance.result');	
         
     }
  
     public function find(Request $request){
         $search = $request->input('search');
  
         $members = Member::where('firstname', 'like', "$search%")
            ->orWhere('lastname', 'like', "$search%")
            ->get();
  
         return view('searchresult')->with('members', $members);
     }
}
