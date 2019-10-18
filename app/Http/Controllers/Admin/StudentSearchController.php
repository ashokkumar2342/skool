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
        $st=new Student();
        $students=$st->getStudentsSearchDetilas($search);  
 	     
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
