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
    {     if ($request->user_status=='all') {
             $arrayStatusId=[0,1];
          }else{
            $arrayStatusId=[$request->user_status];
          }
    	   
          $admin=new Admin();
             if ($request->report_type==1) {
                  if ($request->role_id=='all') {
                       $arrayRoleId=[1,2,3,4,5];
                    }else{
                      $arrayRoleId=[$request->role_id];
                    }
                    $admins=$admin->getUserDetailsByRoleId($arrayRoleId,$arrayStatusId);
                    $adminArrayId=$admin->getRoleDetailsByAdminArrayId($arrayRoleId); 
                    $usersmenus =Minu::whereIn('admin_id',$adminArrayId)
                                     ->where('status',1)
                                     ->with(['subMenuTypes'])
                                     ->get();
             } 
             if ($request->report_type==2) { 
                     $admins=$admin->getUserDetailsByUserId($request->user_id,$arrayStatusId); 
                     $adminAId=$admin->getDetailsAdminId($request->user_id,$arrayStatusId);
                     $usersmenus =Minu::where('admin_id',$adminAId)
                                        ->where('status',1)
                                        ->with(['subMenuTypes'])
                                        ->get();
                  
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
        	   $pdf = PDF::setOptions([
            'logOutputFile' => storage_path('logs/log.htm'),
            'tempDir' => storage_path('logs/')
           ])
           ->loadView('admin.account.report.userReport.role_list_with_menu',compact('admins','usersmenus','id')); 
    	     return $pdf->stream('section.pdf');
    	}
    	 
    }
}
