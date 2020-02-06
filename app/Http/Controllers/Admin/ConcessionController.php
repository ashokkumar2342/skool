<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\Concession;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Validator;

class ConcessionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $concessions = Concession::latest('created_at')->paginate(20);
        return view('admin.finance.concession',compact('concessions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function addForm($id=null)
    {
        if ($id!=null) {
        $concessions = Concession::find(Crypt::decrypt($id));
            
        }if ($id==null) {
        $concessions = '';
            
        }
        return view('admin.finance.concession_form',compact('concessions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,$id=null)
    {
       $rules=[       
            
            'name' => 'required|max:30|unique:concessions,name,'.$id, 
            'amount' => 'required|max:7', 
             
        ];
        $validator = Validator::make($request->all(),$rules);
        if ($validator->fails()) {
            $errors = $validator->errors()->all();
            $response=array();
            $response["status"]=0;
            $response["msg"]=$errors[0];
            return response()->json($response);// response as json
        } else {
            $concession =  Concession::firstOrNew(['id'=>$id]); 
            $concession->name = $request->name;
            $concession->amount = $request->amount;
            $concession->percentage = $request->percentage;
            $concession->save();
             $response["status"]=1;
            $response["msg"]='Concession Submit Successfully';
            return response()->json($response);
            
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\Concession  $concession
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        $concession = Concession::find($request->concession);
         
        return response()->json($concession);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\Concession  $concession
     * @return \Illuminate\Http\Response
     */
    public function edit(Concession $concession)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\Concession  $concession
     * @return \Illuminate\Http\Response
     */
     
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\Concession  $concession
     * @return \Illuminate\Http\Response
     */
   public function destroy($id)
   {
       $concession = Concession::find(Crypt::decrypt($id));
       $concession->delete();
       return  redirect()->back()->with(['message'=>'Concession Delete Successfully','class'=>'success']);
   }
}
