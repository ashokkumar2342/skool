<?php

namespace App\Http\Controllers\Admin\Library;

use App\Http\Controllers\Controller;
use App\Model\Library\BookPurchaseBill;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Validator;

class BookPurchaseBillController extends Controller
{
    public function index()
    {
    	 return view('admin.library.bookpurchasebill.book_purchase_bill');
    }

    public function store(Request $request)
    {
    	// return $request;
         $rules=[
        
            
            'vendor_name' => 'required', 
            'mobile_no' => 'required', 
            'email' => 'required', 
            'bill_no' => 'required', 
            'total_amount' => 'required', 
       
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
    	 $bookpurchase= new BookPurchaseBill();
    	 $bookpurchase->book_purchase_date=$request->p_date;
    	 $bookpurchase->vendor_name=$request->vendor_name;
    	 $bookpurchase->mobile=$request->mobile_no;
    	 $bookpurchase->email=$request->email;
    	 $bookpurchase->address=$request->address;
    	 $bookpurchase->bill_no=$request->bill_no;
    	 $bookpurchase->total_amount=$request->total_amount;
    	 $bookpurchase->save();
         $response=['status'=>1,'msg'=>'Created Successfully'];
            return response()->json($response);
        } 
    }



    public function tableShow()
    { 
         $bookpurchases= BookPurchaseBill::all();
    	 return view('admin.library.bookpurchasebill.book_purchase_table',compact('bookpurchases'));
    }

    public function destroy($id)
    {
        
        $bookpurchases= BookPurchaseBill::findOrFail(Crypt::decrypt($id));
    	$bookpurchases->delete();
    	 return  redirect()->back()->with(['message'=>'Delete Successfully','class'=>'success']); 
    }

    public function edit($id)
    {
    	 $bookpurchases= BookPurchaseBill::findOrFail(Crypt::decrypt($id));
    	 return view('admin.library.bookpurchasebill.book_purchase_edit',compact('bookpurchases')); 
    }

    public function update(Request $request,$id)
    {

         $rules=[
        
            
            'vendor_name' => 'required', 
            'mobile_no' => 'required', 
            'email' => 'required', 
            'bill_no' => 'required', 
            'total_amount' => 'required', 
       
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
        $bookpurchase= BookPurchaseBill::find($id);
         $bookpurchase->book_purchase_date=$request->p_date;
         $bookpurchase->vendor_name=$request->vendor_name;
         $bookpurchase->mobile=$request->mobile_no;
         $bookpurchase->email=$request->email;
         $bookpurchase->address=$request->address;
         $bookpurchase->bill_no=$request->bill_no;
         $bookpurchase->total_amount=$request->total_amount;
         $bookpurchase->save();
         $response=['status'=>1,'msg'=>'Update Successfully'];
            return response()->json($response);
        }
    }
}
