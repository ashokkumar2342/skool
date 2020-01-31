   @extends('admin.layout.base')
 @push('links')
 <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
 @endpush
@section('body')
   <section class="content-header">
         <h1>
           Dashboard <h2>3</h2>
           <small>Control panel</small>
         </h1>
         <ol class="breadcrumb">
           <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
           <li class="active">Dashboard</li>
         </ol>
       </section>

     <!-- Main content -->
     <section class="content">
       <!-- Small boxes (Stat box) -->
     
 </section>
  
@endsection
@push('scripts')
{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.bundle.js"></script> --}}
<script src="{{ asset('admin_asset/plugins/chartjs/Chart.js') }}"></script>
<script src="{{ asset('admin_asset/dist/js/adminlte.min.js') }}"></script>
{{-- <script src="../../dist/js/adminlte.min.js"></script> --}}

</body>


@endpush
