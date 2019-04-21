<?php

namespace App\Http\Controllers\Admin;

use App\Model\Minu;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class MinuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     Public function status(Minu $minu){   

      // $minus = Auth::guard('admin')->user()->minus()->where('minu_id',2)->first(); 
      // return $minus;



        $data = ($minu->status == 1)?['status' => 0]:['status' => 1 ]; 
        $minu->status = $data['status'];
        if( $minu->save()){
            return redirect()->back()->with(['class'=>'success','message'=>'status change  successfully ...']);   
        }
        else{
            return response()->json(['status'=>'error','message'=>'Whoops, looks like something went wrong ! Try again ...']);
        }
    }


    Public function rstatus(Minu $minu){
        
        $data = ($minu->r_status == 1)?['r_status' => 0]:['r_status' => 1 ]; 
        $minu->r_status = $data['r_status'];
        if( $minu->save()){
            return redirect()->back()->with(['class'=>'success','message'=>'status change  successfully ...']);   
        }
        else{
            return response()->json(['status'=>'error','message'=>'Whoops, looks like something went wrong ! Try again ...']);
        }
    }

    Public function wstatus(Minu $minu){
        
        $data = ($minu->w_status == 1)?['r_status' => 0]:['r_status' => 1 ]; 
        $minu->w_status = $data['r_status'];
        if( $minu->save()){
            return redirect()->back()->with(['class'=>'success','message'=>'status change  successfully ...']);   
        }
        else{
            return response()->json(['status'=>'error','message'=>'Whoops, looks like something went wrong ! Try again ...']);
        }
    }


    Public function dstatus(Minu $minu){
        
        $data = ($minu->d_status == 1)?['r_status' => 0]:['r_status' => 1 ]; 
        $minu->d_status = $data['r_status'];
        if( $minu->save()){
            return redirect()->back()->with(['class'=>'success','message'=>'status change  successfully ...']);   
        }
        else{
            return response()->json(['status'=>'error','message'=>'Whoops, looks like something went wrong ! Try again ...']);
        }
    }

    public function menuPermissionCheck(Request $request )
    {

      $deleteStatus=$request->d_status;
      $editStatus=$request->w_status;
      $readStatus=$request->r_status;
      foreach ($editStatus as $menu_id => $status) {
        $minu =Minu::find($menu_id);
        $minu->w_status = $status;
        $minu->save();
      }foreach ($readStatus as $menu_id => $status) {
        $minu =Minu::find($menu_id);
        $minu->r_status = $status;
        $minu->save();
      }foreach ($deleteStatus as $menu_id => $status) {
        $minu =Minu::find($menu_id);
        $minu->d_status = $status;
        $minu->save();
      }
       $response['msg'] = 'Save Successfully';
        $response['status'] = 1;
        return response()->json($response); 
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\Minu  $minu
     * @return \Illuminate\Http\Response
     */
    public function show(Minu $minu)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\Minu  $minu
     * @return \Illuminate\Http\Response
     */
    public function edit(Minu $minu)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\Minu  $minu
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Minu $minu)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\Minu  $minu
     * @return \Illuminate\Http\Response
     */
    public function destroy(Minu $minu)
    {
        //
    }
}
