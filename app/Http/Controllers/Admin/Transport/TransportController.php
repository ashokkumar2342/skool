<?php

namespace App\Http\Controllers\Admin\Transport;

use App\Http\Controllers\Controller;
use App\Model\Transport\Transport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Validator;

class TransportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $transports  = Transport::latest('created_at')->paginate(20);
        return view('admin.transport.transport',compact('transports'));
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
    	$rules=[
    	    'name' => 'required|max:30', 
            'mobile' => 'required|digits:10', 
            'contact_no' => 'required|digits:10',
            'email' => 'required|max:50|unique:transports',
            'gst_no' => 'required|max:50',
            'ifsc_code' => 'required|max:50',
            'account_no' => 'required|max:50|unique:transports',
            'branch_code' => 'required|max:50',
            'branch_name' => 'required|max:50',
            'account_holder_name' => 'required|max:50',
            'pincode' => 'required|digits:6',  
            'address' => 'required|string', 
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
            $Transport = new Transport();
            
            $Transport->name = $request->name;
            $Transport->mobile = $request->mobile;
            $Transport->contact_no = $request->contact_no;
            $Transport->email = $request->email;
            $Transport->gst_no = $request->gst_no;
            $Transport->ifsc_code = $request->ifsc_code;
            $Transport->account_no = $request->account_no;
            $Transport->branch_code = $request->branch_code;
            $Transport->branch_name = $request->branch_name;
            $Transport->account_holder_name = $request->account_holder_name;
            $Transport->pincode = $request->pincode;          
            $Transport->address = $request->address;
            $Transport->c_address = $request->c_address;
            $Transport->save();
             $response=['status'=>1,'msg'=>'Created Successfully'];
            return response()->json($response); 
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\Transport  $Transport
     * @return \Illuminate\Http\Response
     */
    public function show(Transport $Transport)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\Transport  $Transport
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $transport = Transport::findOrFail(Crypt::decrypt($id));
         
        return view('admin.transport.transportEdit',compact('transport'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\Transport  $Transport
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $rules=[
        'name' => 'required|max:30', 
            'mobile' => 'required|digits:10', 
            'contact_no' => 'required|digits:10',
            'email' => 'required|max:50|unique:transports,email,'.$id,
            'gst_no' => 'required|max:50',
            'ifsc_code' => 'required|max:50',
            'account_no' => 'required|max:50|unique:transports,account_no,'.$id,
            'branch_code' => 'required|max:50',
            'branch_name' => 'required|max:50',
            'account_holder_name' => 'required|max:50',
            'pincode' => 'required|digits:6',  
            'address' => 'required|string', 
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
            $Transport = Transport::find($id);
            
            $Transport->name = $request->name;
            $Transport->mobile = $request->mobile;
            $Transport->contact_no = $request->contact_no;
            $Transport->email = $request->email;
            $Transport->gst_no = $request->gst_no;
            $Transport->ifsc_code = $request->ifsc_code;
            $Transport->account_no = $request->account_no;
            $Transport->branch_code = $request->branch_code;
            $Transport->branch_name = $request->branch_name;
            $Transport->account_holder_name = $request->account_holder_name;
            $Transport->pincode = $request->pincode;          
            $Transport->address = $request->address;
            $Transport->c_address = $request->c_address;
            $Transport->save();
             $response=['status'=>1,'msg'=>'Updated Successfully'];
            return response()->json($response); 
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\Transport  $Transport
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $Transport = Transport::findOrFail(Crypt::decrypt($id));
        $Transport->delete();
        return  redirect()->back()->with(['message'=>'Delete Successfully','class'=>'success']);
    }
}
