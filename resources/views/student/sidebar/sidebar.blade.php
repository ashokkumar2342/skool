<!-- Sidebar -->
    <div class="sidebar">
          <!-- Sidebar user panel (optional) -->
        

          <!-- Sidebar Menu -->
          <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
              <!-- Add icons to the links using the .nav-icon class
                   with font-awesome or any other icon font library -->
              <li class="nav-item has-treeview ">
                <a href="{{ route('student.dashboard') }}" class="nav-link">
                  <i class="nav-icon fa fa-dashboard text-success"></i>
                  <p>
                    Dashboard
                     
                  </p>
                </a>
              
             
              <li class="nav-item">
                <a href="{{ route('student.profile') }}" class="nav-link">
                  <i class="nav-icon fa fa-user text-danger"></i>
                  <p>
                    Profile
                    <span class="right badge badge-danger"></span>
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('student.homewok.list') }}" class="nav-link">
                  <i class="nav-icon fa fa-sticky-note-o text-primary"></i>
                  <p>
                    Homewok
                    <span class="right badge badge-danger"></span>
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('student.attendance') }}" class="nav-link">
                  <i class="nav-icon fa fa-clock-o text-warning"></i>
                  <p>
                    Attendance
                    <span class="right badge badge-danger"></span>
                  </p>
                </a>
              </li>
                <li class="nav-item">
                <a href="{{ route('student.fee.details') }}" class="nav-link">
                  <i class="nav-icon fa fa-inr text-success"></i>
                  <p>
                    Fee Details
                    <span class="right badge badge-danger "></span>
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('student.class.test') }}" class="nav-link">
                  <i class="nav-icon fa fa-file-text-o text-primary"></i>
                  <p>
                    Class Test
                    <span class="right badge badge-danger "></span>
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('student.event') }}" class="nav-link">
                  <i class="nav-icon fa fa-star text-white"></i>
                  <p>
                    Event
                    <span class="right badge badge-danger "></span>
                  </p>
                </a>
              </li>
              <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-book text-danger"></i>
              <p>
                Library
                <i class="right fa fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('student.library') }}" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Book Reserve</p>
                </a>
              </li>
            </ul>
          </li>

                {{--  <li class="nav-item">
                <a href="" class="nav-link">
                  <i class="nav-icon fa fa-book text-whit"></i>
                  <p>
                    Library
                    <span class="right badge badge-danger "></span>
                  </p>
                </a>
              </li> --}}
               
               
            
              

            </ul>
          </nav>
          <!-- /.sidebar-menu -->
        </div>