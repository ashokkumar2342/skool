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
    	  $arrayStatusId=[$request->user_status];
          $admin=new Admin();
    if ($request->report_type==1) { 
         $admins=$admin->getUserDetailsByRoleId($request->role_id,$arrayStatusId); 
         $adminArrayId = Admin::
                                where('role_id',$request->role_id)
                              ->orderBy('first_name','ASC')
                              ->pluck('id')
                              ->toArray();
         $usersmenus =Minu::
                              whereIn('admin_id',$adminArrayId)
                             ->where('status',1)
                             ->with(['subMenuTypes'])
                             ->get();
   } 
   if ($request->report_type==2) { 
            $admins=$admin->getUserDetailsByUserId($request->user_id,$arrayStatusId); 
            $adminArrayId = Admin::where('id',$request->user_id)->orderBy('first_name','ASC')->pluck('id')->toArray();
            $usersmenus =Minu::whereIn('admin_id',$adminArrayId)->where('status',1)->with(['subMenuTypes'])->get();
        }
        
   }   
     
    	
        if ($request->report_details==1) {  
        	$pdf = PDF::setOptions([
            'logOutputFile' => storage_path('logs/log.htm'),
            'tempDir' => storage_path('logs/')
        ])
        ->loadView('admin.account.report.userReport.only_user_list',compact('usersmenus','admins')); 

    	return $pdf->stream('section.pdf');
    	}
    	elseif ($request->report_details==2) { 
    	    
            // $usersmenus = Minu::where('admin_id',$id)->where('status',0)->pluck('sub_menu_id')->toArray();
        	$pdf = PDF::setOptions([
            'logOutputFile' => storage_path('logs/log.htm'),
            'tempDir' => storage_path('logs/')
        ])
        ->loadView('admin.account.report.userReport.role_list_with_menu',compact('admins','usersmenus','id')); 
    	return $pdf->stream('section.pdf');
    	}
    	 
    }
}
