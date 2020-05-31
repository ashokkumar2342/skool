 @php
     $notifications=App\Model\Notification::orderBy('id','DESC')->get(); 
     $academicYear=App\Model\AcademicYear::where('status',1)->first(); 
      
 @endphp
  <header class="main-header">
            <!-- Logo -->
            <a href="{{ route('admin.dashboard') }}" class="logo">
                <!-- mini logo for sidebar mini 50x50 pixels -->
                <span class="logo-mini"><b>{{ date('d-m-Y') }}</b></span>
                <!-- logo for regular state and mobile devices -->
                <span class="logo-lg">{{ $academicYear->name }}</span>
            </a>
            <!-- Header Navbar: style can be found in header.less -->
            <nav class="navbar navbar-static-top">
                <!-- Sidebar toggle button-->
                <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </a>
                @includeIf('admin.include.hot_menu_top', ['menu_type_id' =>1])
                <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <li><a href="#" title="">{{ date('d-M-Y') }}</a></li>
 
            <li class="dropdown messages-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-envelope-o"></i>
              
               
                 <span class="label label-success">{{ App\Helper\MyFuncs::countNotificationCenter() }}</span> 
               
            </a>
            <ul class="dropdown-menu">
              <li class="header">You have 4 messages</li>
              <li>
                <!-- inner menu: contains the actual data -->
                <ul class="menu">
                   
                  @foreach ($notifications as $notification)
                    @php
                    $admin=App\Admin::where('id',$notification->user_id)->first();
                     $profile = route('admin.profile.photo.show',$admin->profile_pic); 
                   @endphp
                  <li><!-- start message -->
                    <a href="{{ $notification->link }}a"><p>{{ $notification->message }}</p>
                      
                      <h4>
                        
                        <small><i class="fa fa-clock-o"></i> 5 mins</small>
                      </h4>
                      
                    </a>
                  </li>
                  @endforeach
                </ul>
              </li>
              <li class="footer"><a href="#">See All Messages</a></li>
            </ul>
          </li>
 
            
          @php
            $userIdBySibling=new App\Helper\MyFuncs();    
           $siblings= $userIdBySibling->getSiblingById(); 
           $students=App\Student::whereIn('id',$siblings)->get();
          @endphp
         {{--  <li class="dropdown messages-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Sibling <i class="fa fa-users"></i>
            </a>
            <ul class="dropdown-menu">
              <li class="header">You have 4 Student</li>
              <li>
                <!-- inner menu: contains the actual data -->
                <ul class="menu">
                   
                  @foreach ($students as $student)
                    @php
                    $admin=App\Admin::where('id',$notification->user_id)->first();
                     $profile = route('admin.profile.photo.show',$admin->profile_pic); 
                   @endphp
                  <li>start message
                    <a href="{{ $student->link }}">
                      <div class="pull-left">
                        <img src="{{ $profile }}" class="img-circle" alt="User Image">
                      </div>
                      <h4>
                        {{ $student->name}}
                        <small><i class="fa fa-clock-o"></i> 5 mins</small>
                      </h4>
                      <p>{{ $student->message }}</p>
                    </a>
                  </li>
                  @endforeach
                </ul>
              </li>
              <li class="footer"><a href="#">See All Messages</a></li>
            </ul>
          </li> --}}
            <button type="hidden" class="hidden" id="admin_photo_refrash" onclick="callAjax(this,'{{ route('admin.profile.photo.refrash') }}','photo_refrash')">img Shoe</button>
            <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown"> 
              @php
              $admins=Auth::guard('admin')->user();
              $profile = route('admin.profile.photo.show',$admins->profile_pic);
              @endphp
               
              <img  src="{{ ($admins->profile_pic)? $profile : asset('profile-img/user.png') }}" class="user-image">
              <span class="hidden-xs">{{ Auth::guard('admin')->user()->first_name }}</span>
             
            </a>
            <ul class="dropdown-menu">
              <li class="user-header">
                 <img  src="{{ ($admins->profile_pic)? $profile : asset('profile-img/user.png') }}" class="profile-user-img img-responsive img-circle">
                <p>
                  {{ Auth::guard('admin')->user()->first_name }}
                </p>
              </li>
             
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="{{ route('admin.profile') }}" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                  <a href="{{ route('admin.logout.get') }}" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
          
        </ul>
      </div>
            </nav>
        </header>
