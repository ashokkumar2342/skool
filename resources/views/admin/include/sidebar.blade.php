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
    <ul class="sidebar-menu" style="height:730px;overflow: auto">
       
        {{-- <li class="header">MAIN NAVIGATION</li> --}}
        <li ><a href="{{ route('admin.dashboard') }}"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
        
         {{  App\Helper\MyFuncs::menus() }}
         
         
         {{-- <a href="{{ route(''.App\Helper\MyFuncs::hotMenu()) }}" title="">aa</a> --}}
         
        
        
   
        
        
     
</section>
<!-- /.sidebar -->
</aside>

<!-- =============================================== -->
