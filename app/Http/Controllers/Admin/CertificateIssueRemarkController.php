<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\CertificateIssueRemark;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Auth;
use App\Admin;

class CertificateIssueRemarkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
         
         $validator = Validator::make($request->all(), [
             
            
            'remark' => 'required|max:191', 
            'certificate_id' => 'required', 
              
        ]);

        if ($validator->passes()) {

         $admin_id = Auth::guard('admin')->user()->id; 
        $remark = new CertificateIssueRemark();

        $remark->certificate_issue_id = $request->certificate_id;
        $remark->admin_id = $admin_id;
        $remark->remarks = $request->remark; 
        $remark->save();
        return response()->json([$remark, 'message'=>'add success','class'=>'success']);
          }

        return response()->json(['message'=>$validator->errors()->all(),'class'=>'error']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\CertificateIssueRemark  $certificateIssueRemark
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, CertificateIssueRemark $certificateIssueRemark)
    {         
       $remarks = CertificateIssueRemark::where('certificate_issue_id',$request->id)->get();
        
       if ($remarks->count()) {
         
            foreach ($remarks as $remark) {
             $row = '<tr><td>'.$remark->admins->first_name.'</td>
             <td>'.$remark->created_at->diffForHumans().'</td>
             <td>'.$remark->remarks.'</td>
             ';
                
               $row .= '</tr>';
               $options[] = [$row];
            }  
           return response()->json($options);  
       }
       else{
        return ' ';
       }

       // return response()->json('No Remakrs'); 



       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\CertificateIssueRemark  $certificateIssueRemark
     * @return \Illuminate\Http\Response
     */
    public function edit(CertificateIssueRemark $certificateIssueRemark)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\CertificateIssueRemark  $certificateIssueRemark
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CertificateIssueRemark $certificateIssueRemark)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\CertificateIssueRemark  $certificateIssueRemark
     * @return \Illuminate\Http\Response
     */
    public function destroy(CertificateIssueRemark $certificateIssueRemark)
    {
        //
    }
}
