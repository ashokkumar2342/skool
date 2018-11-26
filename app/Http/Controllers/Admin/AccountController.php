<?php

namespace App\Http\Controllers\Admin;

use App\Admin;
use App\Helpers\MailHelper;
use Mail;
use App\Http\Controllers\Controller;
use App\Model\ClassType;
use App\Model\Minu;
use App\Model\MinuType;
use App\Model\Role;
use App\Model\SubMenu;
use App\Model\UserClass;
use App\Model\UserClassType;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpKernel\DataCollector\collect;
class AccountController extends Controller
{
    Public function index(){
    	
    	$accounts = Admin::all();
    	return view('admin.account.list',compact('accounts'));
    }

    Public function form(Request $request){
           
    	$roles = Role::all();
    	return view('admin.account.form',compact('roles'));
    } 

    Public function store(Request $request){
        $rules=[
        'first_name' => 'required|string|min:3|max:20',
            'last_name' => 'nullable|string|min:3|max:20',
            'email' => 'required|email|unique:admins',
            "mobile" => 'required|numeric|digits:10',
            "role_id" => 'required',
            "password" => 'required|min:5|max:15', 
              
          
        ];

        $validator = Validator::make($request->all(),$rules);
        if ($validator->fails()) {
            $errors = $validator->errors()->all();
            $response=array();
            $response["status"]=0;
            $response["msg"]=$errors[0];
            return response()->json($response);// response as json
        }
       
    	   	 
    	$accounts = new Admin();
    	$accounts->first_name = $request->first_name;
    	$accounts->last_name = $request->last_name;
    	$accounts->role_id = $request->role_id;
    	$accounts->email = $request->email;
    	$accounts->password = bcrypt($request['password']);
    	$accounts->mobile = $request->mobile;
    	$accounts->dob = $request->dob == null ? $request->dob : date('Y-m-d',strtotime($request->dob));
    	 $accounts->save(); 
         $this->defaultMenuAccess($accounts->role_id,$accounts->id);
         $MailHelper = new MailHelper();
        $MailHelper->activationmail($accounts->id);
        $response['msg'] = 'Account created Successfully';
        $response['status'] = 1;
        return response()->json($response);    
    }

    public function defaultMenuAccess($roleId,$userId){
        $role =Role::find($roleId); 
        $subMenus = explode(',',$role->sub_menu_id);

        foreach ($subMenus as $key => $value) {
          $menu =  new Minu();
          $menu->admin_id = $userId;   
          $menuData= SubMenu::find($value); 
          $menu->minu_id = $menuData->menu_type_id; 
          $menu->sub_menu_id = $value;
          $menu->save();
        }

        

    } 

    Public function edit(Request $request, Admin $account){
        $roles = Role::all();
        
        
      
        return view('admin.account.edit',compact('account','roles')); 
    }

    Public function update(Request $request, Admin $account){

       $this->validate($request,[
           'first_name' => 'required|string|min:3|max:20',
               'last_name' => 'nullable|string|min:3|max:20',
               
               "mobile" => 'required|numeric|digits:10',
               "role_id" => 'required',
               "password" => 'nullable|min:5|max:15',             
           ]);          
        
        
        $account->first_name = $request->first_name;
        $account->last_name = $request->last_name;
        $account->role_id = $request->role_id; 
        if ($request['password']!=null) {
            $account->password = bcrypt($request['password']);
        } 
        $account->mobile = $request->mobile;
        $account->dob = $request->dob == null ? $request->dob : date('Y-m-d',strtotime($request->dob));
        if ($account->save())
         {
          return redirect()->route('admin.account.list')->with(['message'=>'Account Updated Successfully.','class'=>'success']);        
        }
        else{
            return redirect()->back()->with(['class'=>'error','message'=>'Whoops ! Look like somthing went wrong ..']);
            }
    }

    Public function destroy(Admin $account){
        if ($account->delete()) {
           return redirect()->back()->with(['message'=>'accoount deleted','class'=>'success']);
        }
    }

    Public function status(Admin $account){

        $data = ($account->status == 1)?['status' => 0]:['status' => 1 ]; 
        $account->status = $data['status'];
        if( $account->save()){
            return redirect()->back()->with(['class'=>'success','message'=>'status change  successfully ...']);   
        }
        else{
            return response()->json(['status'=>'error','message'=>'Whoops, looks like something went wrong ! Try again ...']);
        }
    }
     Public function rstatus(Admin $account){
        
        $data = ($account->r_status == 1)?['r_status' => 0]:['r_status' => 1 ]; 
        $account->r_status = $data['r_status'];
        if( $account->save()){
            return redirect()->back()->with(['class'=>'success','message'=>'status change  successfully ...']);   
        }
        else{
            return response()->json(['status'=>'error','message'=>'Whoops, looks like something went wrong ! Try again ...']);
        }
    }

    Public function wstatus(Admin $account){
        
        $data = ($account->w_status == 1)?['r_status' => 0]:['r_status' => 1 ]; 
        $account->w_status = $data['r_status'];
        if( $account->save()){
            return redirect()->back()->with(['class'=>'success','message'=>'status change  successfully ...']);   
        }
        else{
            return response()->json(['status'=>'error','message'=>'Whoops, looks like something went wrong ! Try again ...']);
        }
    }

    Public function dstatus(Admin $account){
        
        $data = ($account->d_status == 1)?['r_status' => 0]:['r_status' => 1 ]; 
        $account->d_status = $data['r_status'];
        if( $account->save()){
            return redirect()->back()->with(['class'=>'success','message'=>'status change  successfully ...']);   
        }
        else{
            return response()->json(['status'=>'error','message'=>'Whoops, looks like something went wrong ! Try again ...']);
        }
    }

    Public function minu(Request $request, Admin $account){
        $roles = Role::all();
        $minus = Admin::find($account->id)->minus;  
        return view('admin.account.minu',compact('account','roles','minus')); 
    }

    Public function access(Request $request, Admin $account){
            $menus = MinuType::all();
             
            $users = Admin::all();   
        return view('admin.account.access',compact('menus','users')); 
    } 
    Public function menuTable(Request $request){

                $id = $request->id;
            $menus = MinuType::all();
            $subMenus = SubMenu::all();
           $usersmenus = array_pluck(Minu::where('admin_id',$id)->get(['sub_menu_id'])->toArray(), 'sub_menu_id'); 
        $data= view('admin.account.menuTable',compact('menus','subMenus','usersmenus','id'))->render(); 
        return response($data);
    }


    Public function userClass(){
        $classes = ClassType::all();
        $userClass = UserClassType::all();
        $users = Admin::get(['id','first_name','email']);     

        return view('admin.account.userClass',compact('users','classes','userClass'));
       
    }

    Public function userClassStore(Request $request){
        $this->validate($request,[
            'class_id' => 'required|max:199',             
            'user' => 'required|max:199',             
            ]);
        $data = $request->except('_token');        
        $class_count = count($data['class_id']);
        for ($i=0; $i < $class_count; $i++) { 
            $classUser =  new UserClassType();
            $classUser->class_id = $data['class_id'] [$i];
            $classUser->admin_id = $data['user'];

            $classUser->save();             
        }

        return redirect()->back()->with(['class'=>'success','message'=>'User Class Successfully']);  
    }

    // User access Store
    Public function accessStore(Request $request){

            $rules=[
            'sub_menu' => 'required|max:199',             
            'user' => 'required|max:199',  
            ]; 
            $validator = Validator::make($request->all(),$rules);
            if ($validator->fails()) {
                $errors = $validator->errors()->all();
                $response=array();
                $response["status"]=0;
                $response["msg"]=$errors[0];
                return response()->json($response);// response as json
            }     
            // $menu =  new Minu();
            //  $menu->sub_minu_id = implode(",", $request->sub_menu);
            //  $menu->admin_id = $request->user; 
            //  $menu->save(); 
            // $response['msg'] = 'Access Save Successfully';
            // $response['status'] = 1;
            // return response()->json($response); 
      
         
        $data = $request->except('_token');        
        $user_count = count($data['sub_menu']);
        for ($i=0; $i < $user_count; $i++) { 
            $menu =  Minu::updateOrCreate(['admin_id'=>$request->user,'sub_menu_id'=>$data['sub_menu'][$i]]);
            $menu->sub_menu_id = $data['sub_menu'] [$i];
             $menuData =SubMenu::find($data['sub_menu'] [$i]);
            $menu->minu_id = $menuData->menu_type_id;
            $menu->admin_id = $data['user'];

            $menu->save();             
        }

        $response['msg'] = 'Access Save Successfully';
         $response['status'] = 1;
         return response()->json($response);  

        
        
    }

    public function role(){
        $roles = Role::all();
        return view('admin.account.roleList',compact('roles'));
    }

    Public function roleMenuTable(Request $request){

                $id = $request->id;
            $menus = MinuType::all();
            $subMenus = SubMenu::all();
           $roles = Role::find($id); 
        $data= view('admin.account.roleMenuTable',compact('menus','subMenus','roles','id'))->render(); 
        return response($data);
    }

    public function roleMenuStore(Request $request){  
           $rules=[
           'sub_menu' => 'required|max:199',             
           'role' => 'required|max:199',  
           ]; 
           $validator = Validator::make($request->all(),$rules);
           if ($validator->fails()) {
               $errors = $validator->errors()->all();
               $response=array();
               $response["status"]=0;
               $response["msg"]=$errors[0];
               return response()->json($response);// response as json
           }     
        $role =Role::find($request->role); 
        $role->sub_menu_id = implode($request->sub_menu, ',');   
        $role->save(); 
        $response['msg'] = 'Save Successfully';
        $response['status'] = 1;
        return response()->json($response);  
         
    }





}
