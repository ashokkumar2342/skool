<?php

namespace App\Helper;

use Illuminate\Support\Facades\Auth;

class MyFuncs {

    public static function full_name($first_name,$last_name) {
        // return $first_name . ', '. $last_name;   
        return $first_name . ', '. $last_name;   
    }
    function hello(){
    	return 'hello';
    }
    

    public static function menus(){ 
    $accountMenu1 = '
                   <li><a href="'.route('admin.account.role').'"><i class="fa fa-circle-o"></i> Role </a></li>
                   ';


     $accountMenu2 = '
                    
                   <li><a href="'.route('admin.account.form').'"><i class="fa fa-circle-o"></i> Add </a></li>
                   <li><a href="'.route('admin.account.list').'"><i class="fa fa-circle-o"></i> List</a></li>
                   <li><a href="'.route('admin.account.access').'"><i class="fa fa-circle-o"></i>User Access</a></li>
                   <li><a href="'.route('admin.userClass.list').'"><i class="fa fa-circle-o"></i> User  Class</a></li> ';
              
                    

    	$urls=[ 
     		 
     		'1'=>' <li class="treeview">
                <a href="#">
                    <i class="fa fa-user text-danger"></i>
                    <span>Account</span>
                    <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                     '.$accountMenu1.'              
                     '.$accountMenu2.'              
                </ul>
            </li>',
     		'2'=>' <li class="treeview">
                <a href="#">
                    <i class="fa fa-user text-danger"></i>
                    <span>Master</span>
                    <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="'.route('admin.academicYear.list').'"><i class="fa fa-circle-o"></i> Academic Year </a></li>
                    <li><a href="'.route('admin.paymentMode.list').'"><i class="fa fa-circle-o"></i> Payment Mode</a></li>
                                   
                </ul>
            </li> ',
            '3'=>' <li class="treeview">
                <a href="#">
                    <i class="fa fa-user text-warning"></i>
                    <span>Student</span>
                    <span class="pull-right-container">
                      
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="'.route('admin.student.form').'"><i class="fa fa-circle-o"></i> Add</a></li>
                      
                    <li><a href="'.route('admin.student.show').'"><i class="fa fa-circle-o"></i> Show</a></li>
                    <li><a href="'.route('admin.student.excel.import').'"><i class="fa fa-circle-o"></i> Excel Import</a></li>
                </ul>
            </li>',
            '4'=>' <li class="treeview">
                <a href="#">
                    <i class="fa fa-rupee text-danger"></i>                
                    <span>Finance</span>
                    <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li></li>
                    <li><a href="'.route('admin.feeAcount.list').'"><i class="fa fa-circle-o"></i>Fee Accounts </a></li>
                    <li><a href="'.route('admin.feeStructure.list').'"><i class="fa fa-circle-o"></i>Fee Structure </a></li> 
                    <li><a href="'.route('admin.feeStructureAmount.list').'"><i class="fa fa-circle-o"></i>Fee Structure Amount </a></li> 
                    <li><a href="'.route('admin.feeStructureLastDate.list').'"><i class="fa fa-circle-o"></i>Fee Structure Last Date </a></li>                 
                    <li><a href="'.route('admin.fineScheme.list').'"><i class="fa fa-circle-o"></i>Fee Fine Scheme </a></li> 
                     
                    <li><a href="'.route('admin.classFeeStructureForm').'"><i class="fa fa-circle-o"></i> Class Fee Structure Form </a></li> 
                    <li><a href="'.route('admin.feeGroup.list').'"><i class="fa fa-circle-o"></i>Fee Group </a></li>
                    <li><a href="'.route('admin.feeGroupDetail.list').'"><i class="fa fa-circle-o"></i>Fee Group Detail </a></li> 
                    <li><a href="'.route('admin.concession.list').'"><i class="fa fa-circle-o"></i>Concession </a></li>                 
                    <li><a href="'.route('admin.studentFeeDetail.list').'"><i class="fa fa-circle-o"></i>Student Fee Detail </a></li> 
                    <li><a href="'.route('admin.studentFeeGroupDetail.list').'"><i class="fa fa-circle-o"></i>Fee Group Wise </a></li> 
                    <li><a href="'.route('admin.studentFeeAssign.list').'"><i class="fa fa-circle-o"></i> Student Fee Assign </a></li>
                    <li><a href="'.route('admin.studentFeeCollection.list').'"><i class="fa fa-circle-o"></i> Fee Collection </a></li>
                    <li><a href="'.route('admin.cashbook.list').'"><i class="fa fa-circle-o"></i> Cashbook </a></li>
                    <li><a href="'.route('admin.feeDue.list').'"><i class="fa fa-circle-o"></i> Fee Due List </a></li>
                </ul>
            </li>',
            '5'=>' <li class="treeview">
                <a href="#">
                    <i class="fa fa-sticky-note text-primary"></i>
                    <span>Report</span>
                    <span class="pull-right-container">
                      
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="'. route('admin.student.report').'"><i class="fa fa-circle-o"></i> Student Report</a></li>

                    
                </ul>
            </li>',
            '6'=>' <li class="treeview">
                <a href="#">
                    <i class="fa fa-cogs text-danger"></i>
                    <span>Manage</span>
                    <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>            
                <ul class="treeview-menu">
                    
                    <li><a href="'. route('admin.class.list').'"><i class="fa fa-circle-o"></i> Add Class</a></li>
                    <li><a href="'. route('admin.section.list').'"><i class="fa fa-circle-o"></i> Add Section</a></li>
                     
                     
                    <li><a href="'.route('admin.manageSection.list').'"><i class="fa fa-circle-o"></i> Manage Section</a></li>
                </ul>
            </li>   ',
            '7'=>' <li class="treeview">
                <a href="#">
                    <i class="fa fa-book text-info"></i>
                    <span>Subject</span>
                    <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="'. route('admin.subjectType.list').'"><i class="fa fa-circle-o"></i> Subject Type </a></li>               
                    <li><a href="'. route('admin.subject.manageSubject').'"><i class="fa fa-circle-o"></i> Manage Subject </a></li>            
                    
                </ul>
            </li>',
              '8'=>' <li class="treeview">
                <a href="#">
                    <i class="fa fa-sticky-note text-primary"></i>
                    <span>Homework</span>
                    <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="'. route('admin.homework.list').'"><i class="fa fa-circle-o"></i> List </a></li>  
                </ul>
            </li>',
              '9'=>' <li class="treeview">
                <a href="#">
                    <i class="fa fa-clock-o text-success"></i>
                    <span>Attendance</span>
                    <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="'. route('admin.attendance.student.form').'"><i class="fa fa-circle-o"></i> Student </a></li>  
                </ul>
            </li>',
              '10'=>' <li class="treeview">
                <a href="#">
                    <i class="fa fa-sticky-note text-danger"></i>
                    <span>Certificate Issue</span>
                    <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="'. route('admin.student.certificateIssu.apply').'"><i class="fa fa-circle-o"></i> Apply </a></li>
                    <li><a href="'. route('admin.student.certificateIssu.list').'"><i class="fa fa-circle-o"></i> Apply List </a></li>
                </ul>
            </li>',
              '11'=>' <li class="treeview">
                <a href="#">
                    <i class="fa fa-sticky-note text-danger"></i>
                    <span>Fee Certificate</span>
                    <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="'. route('admin.student.certificateIssu.tuition').'"><i class="fa fa-circle-o"></i> Tuition Fee </a></li>
                     
                </ul>
            </li>',
              '12'=>' <li class="treeview">
                <a href="#">                
                    <i class="fa fa-users text-warning"></i>
                    <span>User Activity</span>
                    <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="'. route('admin.activity.list').'"><i class="fa fa-circle-o"></i> Activity List </a></li>              
                    
                </ul>
            </li>',
              '13'=>' <li class="treeview">
                <a href="#">                
                    <i class="fa fa-users text-warning"></i>
                    <span>Registration Form</span>
                    <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="'. route('admin.onlineForm.list').'"><i class="fa fa-circle-o"></i> List</a></li>              
                    
                </ul>
            </li>',
            '14'=>' <li class="treeview">
                <a href="#">                
                    <i class="fa fa-bus text-info"></i>
                    <span>Transport</span>
                    <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="'. route('admin.transport.list').'"><i class="fa fa-circle-o"></i> Transport</a></li> 
                    <li><a href="'. route('admin.vehicle.list').'"><i class="fa fa-circle-o"></i> Vehicle</a></li> 
                    <li><a href="'. route('admin.vehicleType.list').'"><i class="fa fa-circle-o"></i> Vehicle Type</a></li> 
                    <li><a href="'. route('admin.driver.list').'"><i class="fa fa-circle-o"></i> Drivier</a></li>  
                    <li><a href="'. route('admin.helper.list').'"><i class="fa fa-circle-o"></i> Helper</a></li> 
                    <li><a href="'. route('admin.boardingPoint.list').'"><i class="fa fa-circle-o"></i>  Boarding Point</a></li>              
                    <li><a href="'. route('admin.route.list').'"><i class="fa fa-circle-o"></i> Route</a></li>
                    <li><a href="'. route('admin.routeDetails.list').'"><i class="fa fa-circle-o"></i> Route Details</a></li>
                    <li><a href="'. route('admin.routeVehicle.list').'"><i class="fa fa-circle-o"></i> Route Vehicle</a></li>
                    <li><a href="'. route('admin.transportRegistration.list').'"><i class="fa fa-circle-o"></i> Transport Registration</a></li>              
                    
                </ul>
            </li>',
              '15'=>' <li class="treeview">
                <a href="#">                
                    <i class="fa fa-sticky-note text-warning"></i>
                    <span>Exam</span>
                    <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="'. route('admin.exam.test').'"><i class="fa fa-circle-o"></i> Class Test</a></li>  
                    <li><a href="'. route('admin.exam.test.details').'"><i class="fa fa-circle-o"></i> Class Test Details</a></li>                    
                    <li><a href="'. route('admin.exam.term').'"><i class="fa fa-circle-o"></i> Exam Term  </a></li>
                    <li><a href="'. route('admin.exam.schedule').'"><i class="fa fa-circle-o"></i> Exam Schedule</a></li>
                    <li><a href="'. route('admin.exam.mark.detail').'"><i class="fa fa-circle-o"></i> Exam Marks Details  </a></li> 
                    <li><a href="'. route('admin.exam.grade.detail').'"><i class="fa fa-circle-o"></i>Grade Details   </a></li> 

                    
                </ul>
            </li>',
     		 
    		]; 
    	foreach ($urls as $key => $value) {
    	
    		foreach (Auth::guard('admin')->user()->minus as $menu) {
    			if ($menu->minu_id==$key)
                 {
    		  	   echo $value;
    		      }
		    } 
    	}
    	
    }
}