<?php

namespace App\Http\Controllers\Admin;

use App\Admin;
use App\Http\Controllers\Controller;
use App\Model\Minu;
use App\Model\MinuType;
use App\Model\Role;
use App\Model\SubMenu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PDF;

class UserReportController extends Controller
{
    public function index()
    {
    	 return view('admin.account.report.userReport.view');
    }
    public function reportTypeFilter(Request $request)
    {   
    	$reportType=$request->report_type;
    	if ($request->report_type==1) {
    	   $datas=Role::orderBy('name','ASC')->get();
    	}
    	elseif ($request->report_type==2) {
    	   $datas=Admin::orderBy('first_name','ASC')->get();
    	}
    	elseif ($request->report_type==3) {
    		$menus = MinuType::all();
            $subMenus = SubMenu::all(); 
    	} 
    	 return view('admin.account.report.userReport.report_type_page',compact('datas','menus','subMenus','reportType'));
    }
    public function filter(Request $request){
    if ($request->report_type==1) {  
        if ($request->role_id==0) { 
           $datas=Admin::where('role_id','!=',12)->get(); 
            foreach ($datas as $key => $value) {
            $admins[]=DB::select(DB::raw("call up_report_role_users ('$value->role_id','$request->user_status')"));
            } 
            if ($request->report_details==2) {
              $menus= array();
              foreach ($admins as $key => $values) {
                foreach ($values as $key => $value) { 
                $menus[]= DB::select(DB::raw("call up_report_user_menu_access ('$value->id')"));
                }  
              }
            }  
        }elseif ($request->role_id!=0) {
            $datas=Admin::where('role_id',$request->role_id)->get();
            foreach ($datas as $key => $value) {
            return $admins=DB::select(DB::raw("call up_report_user_menu_access ('$value->id')"));    
            }  
        } 
        $pdf = PDF::setOptions([
            'logOutputFile' => storage_path('logs/log.htm'),
            'tempDir' => storage_path('logs/')
        ])
        ->loadView('admin.account.report.userReport.role_list_with_menu',compact('menus','admins')); 
           return $pdf->stream('section.pdf');
    }elseif($request->report_type==2)  { 
       $userName=Admin::find($request->user_id);   
       $admins= DB::select(DB::raw("call up_report_user_menu_access ('$request->user_id')"));
       $pdf = PDF::setOptions([
            'logOutputFile' => storage_path('logs/log.htm'),
            'tempDir' => storage_path('logs/')
        ])
        ->loadView('admin.account.report.userReport.menu_with_user',compact('admins','userName')); 
           return $pdf->stream('user_report.pdf');  
    }
    elseif($request->report_type==3)  {  
       $SunMenuName=SubMenu::find($request->sub_menu_id);   
       $admins= DB::select(DB::raw("call up_report_menu_users ('$request->sub_menu_id',$request->user_status)"));
       $pdf = PDF::setOptions([
            'logOutputFile' => storage_path('logs/log.htm'),
            'tempDir' => storage_path('logs/')
        ])
        ->loadView('admin.account.report.userReport.only_user_list',compact('admins','SunMenuName')); 
           return $pdf->stream('user_report.pdf');  
    }
  }     
}
