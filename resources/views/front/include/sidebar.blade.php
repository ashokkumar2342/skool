<!-- =============================================== -->

<!-- Left side column. contains the sidebar -->
<aside class="main-sidebar">
<!-- sidebar: style can be found in sidebar.less -->
<section class="sidebar">
 
    <!-- sidebar menu: : style can be found in sidebar.less -->
    <!-- Sidebar user panel -->
                            <!-- search form -->
        <form action="#" method="get" class="sidebar-form">
          <div class="input-group">
            <input type="text" name="q" class="form-control" placeholder="Search...">
                <span class="input-group-btn">
                  <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                  </button>
                </span>
          </div>
        </form>
        <!-- /.search form -->
    <ul class="sidebar-menu">
        <li class="header">MAIN NAVIGATION</li>
        <li ><a href="{{ route('home') }}"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li> 
        <li class="treeview">
            <a href="#">
                <i class="fa fa-user text-warning"></i>
                <span>Form</span>
                <span class="pull-right-container">
                  {{-- <i class="fa fa-angle-left pull-right"></i> --}}
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
            </a>
            <ul class="treeview-menu">
                <li><a href="#{{-- {{ route('admin.student.form') }} --}}"><i class="fa fa-circle-o"></i> Add Other Child</a></li>
                {{-- <li><a href="{{ route('admin.student.list') }}"><i class="fa fa-circle-o"></i> List</a></li> --}}
              {{--   <li><a href="{{ route('admin.student.show') }}"><i class="fa fa-circle-o"></i> Show</a></li>
                <li><a href="{{ route('admin.student.excel.import') }}"><i class="fa fa-circle-o"></i> Excel Import</a></li> --}}
            </ul>
        </li>
        <li class="treeview">
            <a href="#">
                <i class="fa fa-user text-warning"></i>
                <span>Online Payment</span>
                <span class="pull-right-container"> 
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
            </a>
            <ul class="treeview-menu">
                <li><a href="{{ route('payment.form') }}"><i class="fa fa-circle-o"></i> Payment Form</a></li>
           
            </ul>
        </li>
        
   
        
        
     
</section>
<!-- /.sidebar -->
</aside>

<!-- =============================================== -->
