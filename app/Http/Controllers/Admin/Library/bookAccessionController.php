<?php

namespace App\Http\Controllers\Admin\Library;

use App\Http\Controllers\Controller;
use App\Model\Library\BookAccession;
use App\Model\Library\BookPurchaseBill;
use App\Model\Library\BookStatus;
use App\Model\Library\Booktype;
use App\Model\Library\LibraryStatus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Validator;

class bookAccessionController extends Controller
{
   public function index()
   {
   	      // $booktypes=Booktype::orderBy('name','asc')->get();
   	      // $bookpurchasebills=BookPurchaseBill::orderBy('bill_no','asc')->get();
   	       return view('admin.library.bookaccession.book_accession');
   }
   public function addForm()
   {
     $libraryStatuss=LibraryStatus::all();
     $booktypes=Booktype::orderBy('name','asc')->get();
          $bookpurchasebills=BookPurchaseBill::orderBy('bill_no','asc')->get();
      return view('admin.library.bookaccession.book_accession_add_form',compact('booktypes','bookpurchasebills','libraryStatuss'));
   }

   public function store(Request $request)
   {     
         $rules=[
              
               
              'accession_no' => "required|max:12|unique:book_accessions,accession_no", 
              'isbn_no' => "required|max:12|unique:book_accessions,isbn_no", 
              'book_name' => 'required', 
              'bill_no' => 'required', 
              'status' => 'nullable' 
                
       
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
   	    $bookaccession=new BookAccession();
   	    $bookaccession->accession_no=$request->accession_no;
   	    $bookaccession->book_id=$request->book_name;
   	    $bookaccession->isbn_no=$request->isbn_no;
   	    $bookaccession->bill_id=$request->bill_no;
   	    $bookaccession->status=$request->status;
   	    $bookaccession->save();
   	   $response=['status'=>1,'msg'=>'Created Successfully'];
            return response()->json($response);
        } 
   }
   public function tableShow()
   {     
   	      $bookaccessions=BookAccession::all();
   	      return view('admin.library.bookaccession.book_accession_table',compact('bookaccessions'));
   }

   public function destroy($id)
   {
   	  $bookaccession=BookAccession::findOrFail(Crypt::decrypt($id));
    	 $bookaccession->delete();
    	 return  redirect()->back()->with(['message'=>'Delete Successfully','class'=>'success']);
   }


    public function edit($id)
    {   
       $libraryStatuss=LibraryStatus::all(); 
       $booktypes=Booktype::orderBy('name','asc')->get();
       $bookpurchasebills=BookPurchaseBill::orderBy('bill_no','asc')->get();

        $bookaccessions=BookAccession::findOrFail(Crypt::decrypt($id));
    	return view('admin.library.bookaccession.book_accession_edit',compact('bookaccessions','booktypes','bookpurchasebills','libraryStatuss'));
    }

   public function update(Request $request,$id)
   {     

   	    $rules=[
              
             'accession_no' => "required|max:12", 
             'isbn_no' => "required|max:12", 
              'book_name' => 'required', 
              'bill_no' => 'required', 
              'status' => 'nullable'
             
       
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
        $bookaccession= BookAccession::find($id);
        $bookaccession->accession_no=$request->accession_no;
        $bookaccession->book_id=$request->book_name;
        $bookaccession->isbn_no=$request->isbn_no;
        $bookaccession->bill_id=$request->bill_no;
        $bookaccession->status=$request->status;
        $bookaccession->save();
       $response=['status'=>1,'msg'=>'Update Successfully'];
            return response()->json($response);
        } 
   }
}
