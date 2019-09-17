  <header class="main-header">
            <!-- Logo -->
            <a href="{{ route('admin.dashboard') }}" class="logo">
                <!-- mini logo for sidebar mini 50x50 pixels -->
                <span class="logo-mini"><b>ISKOOL</b></span>
                <!-- logo for regular state and mobile devices -->
                <span class="logo-lg">ISKOOL</span>
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
                <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
            <li class="dropdown messages-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-envelope-o"></i>
              <span class="label label-success">4</span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">You have 4 messages</li>
              <li>
                <!-- inner menu: contains the actual data -->
                <ul class="menu">
                  @php
                   $notifications=App\Model\Notification::orderBy('id','DESC')->get(); 
                  @endphp
                  @foreach ($notifications as $notification)
                    @php
                    $admin=App\Admin::where('id',$notification->user_id)->first();
                     $profile = route('admin.profile.photo.show',$admin->profile_pic); 
                   @endphp
                  <li><!-- start message -->
                    <a href="{{ $notification->link }}">
                      <div class="pull-left">
                        <img src="{{ $profile }}" class="img-circle" alt="User Image">
                      </div>
                      <h4>
                        {{ $notification->admins->first_name or ''}}
                        <small><i class="fa fa-clock-o"></i> 5 mins</small>
                      </h4>
                      <p>{{ $notification->message }}</p>
                    </a>
                  </li>
                  @endforeach
                </ul>
              </li>
              <li class="footer"><a href="#">See All Messages</a></li>
            </ul>
          </li>
            <!-- User Account: style can be found in dropdown.less -->
            <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">

             @php
                $admins=Auth::guard('admin')->user();
                $profile = route('admin.profile.photo.show',$admins->profile_pic);
             @endphp
             <img src="{{ $profile }}" class="user-image" alt="User Image">
              <span class="hidden-xs">{{ Auth::guard('admin')->user()->first_name }}</span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                 <img src="{{ $profile }}" class="img-circle" alt="User Image">
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