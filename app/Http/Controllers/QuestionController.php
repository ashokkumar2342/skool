<?php

namespace App\Http\Controllers;
  
use App\Http\Controllers\Controller;
use App\Model\Question; 
use App\User;
use Auth;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
 

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function questionForm()
    {
        $datas=Question::paginate(10);
        return view('question.form',compact('datas'));
    }
    public function destroy($id)
    {
        $datas=Question::where('id',$id)->delete();
        return redirect()->back()->with(['message'=>'Delete Successfully','class'=>'success']);
    }
    public function Report1()
    {
       $data=Question::get();
       $datas=array();
       $datas['datas']=$data;
         // $pdf = PDF::setOptions([
         //  'isJavascriptEnabled' => true,
         //     'isHtml5ParserEnabled' => true,
         //     'defaultMediaType' => 'screen',
         //     'isPhpEnabled' => true,
         //     'adminUsername' => 'user',
         //     'adminPassword' => '123',
          
             
         // ])
         // ->loadView('admin.master.pdf',$datas);
         // return $pdf->stream('report.pdf');
         return view('question.report1',$datas); 
    } 
    public function Report2()
    {
     $data=Question::get();
     $datas=array();
     $datas['datas']=$data; 
     return view('question.report2',$datas); 
          
    }  
    public function questionStore(Request $request)
    {
       
      if (empty($request->editor_question)) {
        return redirect()->back()->with(['message'=>'Question Field required ','class'=>'success']);
      }

      $obj =new Question();
      $obj->question=$request->editor_question; 
      $obj->save();
      return redirect()->back()->with(['message'=>'Submit Successfully','class'=>'success']);

     
    }
   
 
}
