
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Iskool</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
 <link rel="stylesheet" href="{{ asset('student_assets/plugins/font-awesome/css/font-awesome.min.css')}}">
   <!-- Ionicons -->
   <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
   <!-- Theme style -->
   <link rel="stylesheet" href="{{ asset('student_assets/dist/css/adminlte.min.css')}}">
   <link rel="stylesheet" href="{{ asset('student_assets/dist/css/toastr.min.css')}}">
   <!-- iCheck --> 
   <!-- Date Picker -->
   <link rel="stylesheet" href="{{ asset('student_assets/plugins/datepicker/datepicker3.css')}}">
   <link rel="stylesheet" href="{{ asset('student_assets/plugins/datatables/dataTables.bootstrap4.css')}}"> 

   <!-- Daterange picker -->
   <link rel="stylesheet" href="{{ asset('student_assets/plugins/daterangepicker/daterangepicker-bs3.css')}}">
   <!-- bootstrap wysihtml5 - text editor -->
 
   <!-- Google Font: Source Sans Pro -->
   <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet)}}">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
   @stack('links')
</head>
<body class="hold-transition sidebar-mini" id="body_id">
<!-- Site wrapper -->
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand bg-info navbar-light border-bottom">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fa fa-bars"></i></a>
      </li>
      
    </ul> 
    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
       
      <li class="nav-item">
        <a class="nav-link"  href="{{ route('admin.logout.get') }}">
          <i class="fa fa fa-sign-out"></i>
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
      @php
        $admin=Auth::guard('admin')->user();
        $student=App\Model\StudentUserMap::where('userid',$admin->id)->first();
        $picture=App\Student::where('id',$student->student_id)->first();
      @endphp
      <img src="{{ route('student.image',@$picture->picture) }}"
           
           class="brand-image img-circle elevation-3"
           style="opacity: .8;width:34px">
      <span class="brand-text font-weight-light">{{ @$picture->first_name }}</span>
    </a>

   @include('student.sidebar.sidebar')   
  </aside>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    @yield('contant')
  </div>
  <!-- /.content-wrapper -->

  <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      <b>Version</b> 3.0.0-alpha
    </div>
    <strong>Copyright &copy; {{ date('d-m-Y') }} <a href="#">Iskool.com</a>.</strong> All rights
    reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="{{ asset('student_assets/plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('student_assets/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script> 
<script src="{{ asset('student_assets/plugins/datatables/jquery.dataTables.js') }}"></script>
<script src="{{ asset('student_assets/plugins/datatables/dataTables.bootstrap4.js') }}"></script>
<!-- SlimScroll -->
<script src="{{ asset('student_assets/plugins/slimScroll/jquery.slimscroll.min.js') }}"></script>


<!-- FastClick -->
<script src="{{ asset('student_assets/plugins/fastclick/fastclick.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('student_assets/dist/js/adminlte.min.js') }}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('student_assets/dist/js/demo.js') }}"></script>
 <script src="{{ asset('student_assets/dist/js/common.js?ver=1') }}"></script>
  <script src="{{ asset('student_assets/dist/js/customscript.js?ver=1') }}"></script>
  <script src="{{ asset('student_assets/dist/js/toastr.min.js?ver=1') }}"></script>
  @stack('scripts')

 <script>
  $(function () {
    $('#dataTables').DataTable()
     
  })
</script>
@include('student.include.model')
</body>
</html>
