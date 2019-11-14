<?php

namespace App\Http\Controllers\Admin;

use App\Admin;
use App\Http\Controllers\Controller;
use App\Model\Minu;
use App\Model\MinuType;
use App\Model\Role;
use App\Model\SubMenu;
use Illuminate\Http\Request;
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
    public function filter(Request $request)
    {  
    	// return $request;
    if ($request->report_type==1) { 
    	 if ($request->role_id==0) {
    		$admins = Admin::orderBy('first_name','ASC')->get();
    	} 
    	elseif ($request->user_status==0) {

    		$admins = Admin::where('role_id',$request->role_id)->orderBy('first_name','ASC')->get(); 
    	}
    	elseif ($request->user_status==1) {
    		$admins = Admin::where('role_id',$request->role_id)->where('status',1)->orderBy('first_name','ASC')->get();
    	}
    	elseif ($request->user_status==2) {
    		$admins = Admin::where('role_id',$request->role_id)->where('status',0)->orderBy('first_name','ASC')->get();
    	}
    }	
    if ($request->report_type==2) { 
    	if ($request->user_status==0) {

    		$admins = Admin::where('id',$request->user_id)->orderBy('first_name','ASC')->get(); 
    	}
    	 
    }		
    	
        if ($request->report_details==1) { 
        	$pdf = PDF::setOptions([
            'logOutputFile' => storage_path('logs/log.htm'),
            'tempDir' => storage_path('logs/')
        ])
        ->loadView('admin.account.report.userReport.only_user_list',compact('admins')); 
    	return $pdf->stream('section.pdf');
    	}
    	elseif ($request->report_details==2) {
    	    $id = $request->user_id;
            $menus = MinuType::all();
            $subMenus = SubMenu::all();
            $usersmenus = array_pluck(Minu::where('admin_id',$id)->where('status',1)->get(['sub_menu_id'])->toArray(), 'sub_menu_id'); 
            // $usersmenus = Minu::where('admin_id',$id)->where('status',0)->pluck('sub_menu_id')->toArray();
        	$pdf = PDF::setOptions([
            'logOutputFile' => storage_path('logs/log.htm'),
            'tempDir' => storage_path('logs/')
        ])
        ->loadView('admin.account.report.userReport.user_with_menu_list',compact('admins','menus','subMenus','usersmenus','id')); 
    	return $pdf->stream('section.pdf');
    	}
    	 
    }
}
