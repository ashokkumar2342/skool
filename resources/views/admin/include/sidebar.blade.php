<!-- =============================================== -->

<!-- Left side column. contains the sidebar -->
<aside class="main-sidebar">
<!-- sidebar: style can be found in sidebar.less -->
<section class="sidebar">
 
    <!-- sidebar menu: : style can be found in sidebar.less -->
    <!-- Sidebar user panel -->
                            <!-- search form -->
    {{--     <form action="#" method="get" class="sidebar-form">
          <div class="input-group">
            <input type="text" name="q" class="form-control" placeholder="Search...">
                <span class="input-group-btn">
                  <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                  </button>
                </span>
          </div>
        </form> --}}
        <!-- /.search form -->
    <ul class="sidebar-menu" style="height:1030px;overflow: auto">
       
        {{-- <li class="header">MAIN NAVIGATION</li> --}}
        <li ><a href="{{ route('admin.dashboard') }}"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
        
         {{-- {{  App\Helper\MyFuncs::menus() }} --}}
         
         
         {{-- <a href="{{ route(''.App\Helper\MyFuncs::hotMenu()) }}" title="">aa</a> --}}

        
         @php
            $accountSubMenuUrls = App\Helper\MyFuncs::mainMenu(1);
            $configrations = App\Helper\MyFuncs::mainMenu(2);
            $students = App\Helper\MyFuncs::mainMenu(3);
            $Finances = App\Helper\MyFuncs::mainMenu(4);
            $Homeworks = App\Helper\MyFuncs::mainMenu(8);
            $Attendances = App\Helper\MyFuncs::mainMenu(9);
            $Certificates = App\Helper\MyFuncs::mainMenu(10);
            $FeeCertificates = App\Helper\MyFuncs::mainMenu(11);
            $UserActivitys = App\Helper\MyFuncs::mainMenu(12);
            $RegistrationForms = App\Helper\MyFuncs::mainMenu(13);
            $Transports = App\Helper\MyFuncs::mainMenu(14);
            $Exams = App\Helper\MyFuncs::mainMenu(15);
            $SMSs = App\Helper\MyFuncs::mainMenu(16);
            $menus=App\Helper\MyFuncs::showMenu();
            $userHasMenus=App\Helper\MyFuncs::userHasMinu();
            $menuTypes = App\Model\MinuType::whereIn('id',$userHasMenus)->orderBy('id','asc')->get();
           
         @endphp

         @foreach ($menuTypes as $menuType)
         @php
           $subMenus = App\Helper\MyFuncs::mainMenu($menuType->id);
         @endphp
        
           <li class="treeview">
             <a href="#">
                 <i class="fa {{ $menuType->icon }}"></i>
                 <span>{{ $menuType->name }}</span>
                 <span class="pull-right-container">
                   <i class="fa fa-angle-left pull-right"></i>
                 </span>
             </a>
             <ul class="treeview-menu">
              @foreach ($subMenus as $subMenu)
                 <li><a href="{{ route(''.$subMenu->url) }}"><i class="fa fa-circle-o"></i>{{ $subMenu->name }} </a></li>               
              @endforeach               
             </ul> 
         </li>     
         @endforeach
 {{--         <li class="treeview">
             <a href="#">
                 <i class="fa fa-user text-danger"></i>
                 <span>User Access</span>
                 <span class="pull-right-container">
                   <i class="fa fa-angle-left pull-right"></i>
                 </span>
             </a>
             <ul class="treeview-menu">
              @foreach ($accountSubMenuUrls as $accountSubMenuUrl)
                 <li><a href="{{ route(''.$accountSubMenuUrl->url) }}"><i class="fa fa-circle-o"></i> {{ $accountSubMenuUrl->name }}</a></li>               
              @endforeach               
             </ul>
         </li>         
         <li class="treeview">
             <a href="#">
                 <i class="fa fa-gear text-info"></i>
                 <span>Configration</span>
                 <span class="pull-right-container">
                   <i class="fa fa-angle-left pull-right"></i>
                 </span>
             </a>
             <ul class="treeview-menu">
              @foreach ($configrations as $configration)
                 <li><a href="{{ route(''.$configration->url) }}"><i class="fa fa-circle-o"></i> {{ $configration->name }}</a></li>               
              @endforeach               
             </ul>
         </li>
          <li class="treeview">
             <a href="#">
                 <i class="fa fa-user text-warning"></i>
                 <span>Student</span>
                 <span class="pull-right-container">
                   <i class="fa fa-angle-left pull-right"></i>
                 </span>
             </a>
             <ul class="treeview-menu">
              @foreach ($students as $student)
                 <li><a href="{{ route(''.$student->url) }}"><i class="fa fa-circle-o"></i> {{ $student->name }}</a></li>               
              @endforeach               
             </ul>
         </li>
          <li class="treeview">
             <a href="#">
                 <i class="fa fa-rupee text-danger"></i>
                 <span>Finance</span>
                 <span class="pull-right-container">
                   <i class="fa fa-angle-left pull-right"></i>
                 </span>
             </a>
             <ul class="treeview-menu">
              @foreach ($Finances as $Finance)
                 <li><a href="{{ route(''.$Finance->url) }}"><i class="fa fa-circle-o"></i> {{ $Finance->name }}</a></li>               
              @endforeach               
             </ul>
         </li>  
         <li class="treeview">
             <a href="#">
                 <i class="fa fa-sticky-note text-primary"></i>
                 <span>Homework</span>
                 <span class="pull-right-container">
                   <i class="fa fa-angle-left pull-right"></i>
                 </span>
             </a>
             <ul class="treeview-menu">
              @foreach ($Homeworks as $Homework)
                 <li><a href="{{ route(''.$Homework->url) }}"><i class="fa fa-circle-o"></i> {{ $Homework->name }}</a></li>               
              @endforeach               
             </ul>
         </li>
          <li class="treeview">
             <a href="#">
                 <i class="fa fa-clock-o text-success"></i>
                 <span>Attendance</span>
                 <span class="pull-right-container">
                   <i class="fa fa-angle-left pull-right"></i>
                 </span>
             </a>
             <ul class="treeview-menu">
              @foreach ($Attendances as $Attendance)
                 <li><a href="{{ route(''.$Attendance->url) }}"><i class="fa fa-circle-o"></i> {{ $Attendance->name }}</a></li>               
              @endforeach               
             </ul>
         </li>
          <li class="treeview">
             <a href="#">
                 <i class="fa fa-sticky-note text-danger"></i>
                 <span>Certificate Issue</span>
                 <span class="pull-right-container">
                   <i class="fa fa-angle-left pull-right"></i>
                 </span>
             </a>
             <ul class="treeview-menu">
              @foreach ($Certificates as $Certificate)
                 <li><a href="{{ route(''.$Certificate->url) }}"><i class="fa fa-circle-o"></i> {{ $Certificate->name }}</a></li>               
              @endforeach               
             </ul>
         </li> 
          <li class="treeview">
             <a href="#">
                 <i class="fa fa-users text-warning"></i>
                 <span>User Activity</span>
                 <span class="pull-right-container">
                   <i class="fa fa-angle-left pull-right"></i>
                 </span>
             </a>
             <ul class="treeview-menu">
              @foreach ($UserActivitys as $UserActivity)
                 <li><a href="{{ route(''.$UserActivity->url) }}"><i class="fa fa-circle-o"></i> {{ $UserActivity->name }}</a></li>               
              @endforeach               
             </ul>
         </li> 
         <li class="treeview">
             <a href="#">
                 <i class="fa fa-users text-warning"></i>
                 <span>Registration Form</span>
                 <span class="pull-right-container">
                   <i class="fa fa-angle-left pull-right"></i>
                 </span>
             </a>
             <ul class="treeview-menu">
              @foreach ($RegistrationForms as $Registration)
                 <li><a href="{{ route(''.$Registration->url) }}"><i class="fa fa-circle-o"></i> {{ $Registration->name }}</a></li>               
              @endforeach               
             </ul>
         </li> 
         <li class="treeview">
             <a href="#">
                 <i class="fa fa-bus text-info"></i>
                 <span>Transport</span>
                 <span class="pull-right-container">
                   <i class="fa fa-angle-left pull-right"></i>
                 </span>
             </a>
             <ul class="treeview-menu">
              @foreach ($Transports as $Transport)
                 <li><a href="{{ route(''.$Transport->url) }}"><i class="fa fa-circle-o"></i> {{ $Transport->name }}</a></li>               
              @endforeach               
             </ul>
         </li>
          <li class="treeview">
             <a href="#">
                 <i class="fa fa-sticky-note text-warning"></i>
                 <span>Exam</span>
                 <span class="pull-right-container">
                   <i class="fa fa-angle-left pull-right"></i>
                 </span>
             </a>
             <ul class="treeview-menu">
              @foreach ($Exams as $Exam)
                 <li><a href="{{ route(''.$Exam->url) }}"><i class="fa fa-circle-o"></i> {{ $Exam->name }}</a></li>               
              @endforeach               
             </ul>
         </li> 
         <li class="treeview">
             <a href="#">
                 <i class="fa fa-envelope text-success"></i>
                 <span>SMS</span>
                 <span class="pull-right-container">
                   <i class="fa fa-angle-left pull-right"></i>
                 </span>
             </a>
             <ul class="treeview-menu">
              @foreach ($SMSs as $SMS)
                 <li><a href="{{ route(''.$SMS->url) }}"><i class="fa fa-circle-o"></i> {{ $SMS->name }}</a></li>               
              @endforeach               
             </ul>
         </li> --}}

   

         
         
        
        
   
        
        
     
</section>
<!-- /.sidebar -->
</aside>

<!-- =============================================== -->
