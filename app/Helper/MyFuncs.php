<?php

namespace App\Helper;

use App\Model\AcademicYear;
use App\Model\ClassType;
use App\Model\HotMenu;
use App\Model\Minu;
use App\Model\MinuType;
use App\Model\Notification;
use App\Model\Section;
use App\Model\SectionType;
use App\Model\StudentDefaultValue;
use App\Model\StudentUserMap;
use App\Model\SubMenu;
use App\Model\UserClassType;
use DateInterval;
use DatePeriod;
use DateTime;
use Illuminate\Support\Facades\Auth;
use Route;

class MyFuncs {

    public static function full_name($first_name,$last_name) {
        // return $first_name . ', '. $last_name;   
        return $first_name . ', '. $last_name;   
    }
    public static function hello(){
    	return 'hello';
    } 

    public static function getUser(){
       return $user = Auth::guard('admin')->user();  
    }

    public static function getUserId(){
       return $user = Auth::guard('admin')->user()->id;  
    } 
    public static function getStudentClasses(){

        $user = MyFuncs::getUser();    
        $userClass = UserClassType::where('admin_id',$user->id)->distinct()->get(['class_id']);
        return $classes = array_pluck(ClassType::get(['id','name'])->toArray(),'name', 'id');
    }
    public static function getClasses(){

        $user = MyFuncs::getUser();    
        $userClass = UserClassType::where('admin_id',$user->id)->distinct()->get(['class_id']);
        return $classes = array_pluck(ClassType::whereIn('id',$userClass)->get(['id','name'])->toArray(),'name', 'id');
    }

    public static function getClassByHasUser(){
        $user = MyFuncs::getUser();
        $userClass = UserClassType::where('admin_id',$user->id)->distinct()->get(['class_id']);
        return $classes = ClassType::whereIn('id',$userClass)->get();
    }

    public static function getAllClasses(){ 
        return $classes = array_pluck(ClassType::get(['id','name'])->toArray(),'name', 'id');
    }

    public static function getSections($class_id){
        $user = MyFuncs::getUser();
        $userClass = UserClassType::where('admin_id',$user->id)->distinct()->get(['class_id']);
        $userSections = UserClassType::where('admin_id',$user->id)->where('class_id',$class_id)->get(['section_id']);  
       return SectionType::whereIn('id',$userSections)->get();
       
    }
    public static function getSectionsClaasArrayId($class_id){
        $user = MyFuncs::getUser();
        $userClass = UserClassType::where('admin_id',$user->id)->distinct()->get(['class_id']);
        $userSections = UserClassType::where('admin_id',$user->id)->whereIn('class_id',$class_id)->get(['section_id']);  
       return SectionType::whereIn('id',$userSections)->get();
       
    }
    public static function getStudentSections($class_id){
        $user = MyFuncs::getUser();
        $userClass = UserClassType::where('admin_id',$user->id)->distinct()->get(['class_id']);
        $userSections = UserClassType::where('admin_id',$user->id)->where('class_id',$class_id)->get(['section_id']);  
       return SectionType::all();
       
    }


   // hot menu 
  public static function hotMenu($menu_type_id){ 
      $hotMenus = HotMenu::where('admin_id',Auth::guard('admin')->user()->id)
                          ->where('minu_id',$menu_type_id)
                          ->get(['sub_menu_id']); 
        
       return $subMenus = SubMenu::whereIn('id',$hotMenus)->take('7') 
                          ->get(); 
    
  } 
   // main menu 
  public static function mainMenu($menu_type_id){ 
      $mainMenus = Minu::where('admin_id',Auth::guard('admin')->user()->id)
                          ->where('minu_id',$menu_type_id)
                          ->where('status',1)
                          ->get(['sub_menu_id']); 
        
       return $subMenus = SubMenu::whereIn('id',$mainMenus)->orderBy('sorting_id','ASC')
                          ->get(); 
    
  }
     // read write delete permission check
  public static function menuPermission(){ 
    $user_id =Auth::guard('admin')->user()->id;
    $routeName= Route::currentRouteName();
    $previousRoute= app('router')->getRoutes()->match(app('request')->create(url()->previous()))->getName();
    $subMenu =SubMenu::where('url',$routeName)->first(); 
    $previoussubMenu =SubMenu::where('url',$previousRoute)->first(); 
    if (empty($subMenu)) {
      return Minu::where('admin_id',$user_id)->where('status',1)->where('sub_menu_id',$previoussubMenu->id)->first();   
     } 
    return Minu::where('admin_id',$user_id)->where('status',1)->where('sub_menu_id',$subMenu->id)->first();
              

  }
     // all permission check
  public static function isPermission(){ 
    $user =Auth::guard('admin')->user();
    $routeName= Route::currentRouteName();
    $subMenu =SubMenu::where('url',$routeName)->first(); 
       if (empty($subMenu)) {
           return true;
       }else{
            $menu= Minu::where('admin_id',$user->id)->where('status',1)->where('sub_menu_id',$subMenu->id)->first();
            if (empty($menu)) {
                return false;
            }else{
                return true;
            }
       }          

   }
// read write delete permission check
  public static function userHasMinu(){ 
    return array_pluck(Minu::where('admin_id',Auth::guard('admin')->user()->id)->where('status',1)->distinct()->get(['minu_id'])->toArray(), 'minu_id');
               

  } 

  public static function showMenu(){
    $menu='';
    $subMenus=array();
    $menuTypes = MinuType::orderBy('sorting_id','asc')->get();
    foreach ($menuTypes as  $menuType) {
        
         $menus=MyFuncs::mainMenu($menuType->id);
         foreach ($menus as $subMenu) {
             $subMenus[]=$subMenu->id;
         }
    }
    return $subMenus;
    // $mainMenus = Minu::where('admin_id',Auth::guard('admin')->user()->id)
    //                     ->where('minu_id',$menu_type_id)
    //                     ->get(['sub_menu_id']); 
   
  }

  public function getMonthYear()
  {     
      $AcademicYear=AcademicYear::where('status',1)->first(); 

      $start    = (new DateTime($AcademicYear->start_date))->modify('first day of this month');
      $end      = (new DateTime($AcademicYear->end_date))->modify('first day of next month');
      $interval = DateInterval::createFromDateString('1 month');
      $period   = new DatePeriod($start, $interval, $end);
      $yearmonths = array();
      foreach ($period as $dt) {
          $yearmonths[]=$dt->format("d-m-Y");
      }
      return $yearmonths;
  }  

  public function getMonthYearById($academic_year_id)
  {     
      $AcademicYear=AcademicYear::where('id',$academic_year_id)->first(); 
      $start    = (new DateTime($AcademicYear->start_date))->modify('first day of this month');
      $end      = (new DateTime($AcademicYear->end_date))->modify('first day of next month');
      $interval = DateInterval::createFromDateString('1 month');
      $period   = new DatePeriod($start, $interval, $end);
      $yearmonths = array();
      foreach ($period as $dt) {
          $yearmonths[]=$dt->format("d-m-Y");
      }
      return $yearmonths;
  } 
   public function getSiblingById()
  { 
      $student = Auth::guard('admin')->user();  
      $userIdBySibling =new StudentUserMap();
      return $userIdBySibling->userIdBySibling($student->id);
  }

  public static function getStudent(){
    try {
        $admin = Auth::guard('admin')->user();  
        $StudentUserMap =new StudentUserMap();
        return $StudentUserMap->userIdByStudetnDetails($admin->id);
    } catch (Exception $e) {
        return $e;
    }
    
  }

  // notification save send function
  public static function notification($to_user_id,$from_user_id,$class_id,$reference_id,$message,$notification_type_id=NULL){
      try {
          $notifications = new Notification();
           $insArray = array();   
              
               $insArray['user_id'] = $to_user_id;    
               $insArray['from_user_id'] = $from_user_id;
               $insArray['role_id'] = $role_id;
               $insArray['reference_id'] = $reference_id;
               $insArray['message'] = $message;
               $insArray['notification_type_id'] = $legal_type_id; 
               $insArray['status'] = 1;   
               $insArray['read_status'] = 1;  
               $notifications->insNotification($insArray); 
           
          
      } catch (Exception $e) {
          Log::error('Gereral-Helper-notificationCenter: '.$e->getMessage()); // making log in file
          return $e;  
      }
      
       
  } 

 public static function countNotification(){  
      try {
          $NotificationCenter = new Notification(); 
          $id =MyFuncs::getUser()->id; 
          return $notifications = $NotificationCenter->countNotification($id); 
      } catch (Exception $e) {
          Log::error('Gereral-Helper-countNotificationCenter: '.$e->getMessage()); // making log in file
          return $e;  
      }
      
  }
  public static function UserWiseStudentDefaultValue(){
        $user = MyFuncs::getUser();
       return $StudentDefaultValue = StudentDefaultValue::where('user_id',$user->id)->first();
          
    }
   


}