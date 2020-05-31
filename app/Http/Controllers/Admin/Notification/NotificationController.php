<?php

namespace App\Http\Controllers\Admin\Notification;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class NotificationController extends Controller
{
     //show notification in head page 
    public function nextPage(Request $request) {
        try {
         $notification = new NotificationCenter();
         $notifications = $notification->getNotificationCenter(getUserId());
         return [
                 'notifications' => view('NotificationCenter::notification')->with(compact('notifications'))->render(),
                 'next_page' => $notifications->nextPageUrl()
                  
             ];    
        } catch (Exception $e) {
           Log::error('NotificationCenterController-nextPage: '.$e->getMessage());      // making log in file
           return view('error.home');  
        }

        
    }

    //notification show all
     public function showNotification(Request $request) {
        try {
           $notification = new NotificationCenter();
           $notifications = $notification->getAllNotificationCenter(getUserId());
           
           if($request->ajax()) {
               return [
                   'notifications' => view('NotificationCenter::notificationOnScroll')->with(compact('notifications'))->render(),
                   'next_page' => $notifications->nextPageUrl()
               ];
           }
           return view('NotificationCenter::notificationAll')->with(compact('notifications')); 
        } catch (Exception $e) {
          Log::error('NotificationCenterController-showNotification: '.$e->getMessage());      // making log in file
          return view('error.home');    
        } 
    }

    //notification Clear all
     public function markAll(Request $request) {
        try {
          $notification = new NotificationCenter();
          $notifications = $notification->readStatusChangeAll(getUserId());
          $response = array();
          $response['status'] = 1;
          $response['msg'] = 'Mark All as Read Successful';
          return $response;  
        } catch (Exception $e) {
           Log::error('NotificationCenterController-markAll: '.$e->getMessage());      // making log in file
           return view('error.home');  
        }
        
    }
    //notification Clear all
     public function noficationClear($id) {
        try {
            $id = Crypt::decrypt($id);
              $notification = new NotificationCenter();
              $notifications = $notification->noficationRemove($id);
              $response = array();
              $response['status'] = 1;        
              $response['msg'] = 'Remove Successful';        
              return $response; 
        } catch (Exception $e) {
          Log::error('NotificationCenterController-noficationClear: '.$e->getMessage());      // making log in file
          return view('error.home');    
        }
     	
    }
    //notification Clear all
     public function readStatus($id) {
        try {
               $id = Crypt::decrypt($id);
               $notification = new NotificationCenter();
               $notifications = $notification->readStatusChange($id);
               $response = array();
               $response['status'] = 1; 
               return $response;
        } catch (Exception $e) {
           Log::error('NotificationCenterController-readStatus: '.$e->getMessage());      // making log in file
           return view('error.home');     
        }
     	
    }
}
