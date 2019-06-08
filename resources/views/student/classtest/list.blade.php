@extends('student.layouts.app')
@section('contant')
@push('links')
<style>
  .table td, .table th {
      padding: .0rem; 
      vertical-align: top;
      border-top: 1px solid #dee2e6;
  }
  .border_bottom{
    border-bottom: solid 1px #eee; 
  }  
  b{
    color:#275064;
    align-items: right;
  }
  .fs{
      float: right; font-weight:800;padding-right: 10px;
  }
</style>
@endpush

 <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Class Test</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right"> 
              <li class="breadcrumb-item"><a href="#">Home</a></li> 
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) --> 
           <div class="row">
              <div class="col-md-12">
                <!-- Profile Image -->
                <div class="card card-primary card-outline">
                 <div class="card-body">
                   <div class="table-responsive">
                      <table class="table" id="class_test_data_table"> 
                        <thead>
                         <tr>
                           <th>Subject</th>
                           <th>Maximum Marks</th>
                           <th>Test Date</th>
                           <th>Discriptoin</th>
                         </tr>
                       </thead>
                       <tbody>
                         <tr>
                           @foreach ($classTests as $classTest) 
                             <td>{{ $classTest->subjects->name or '' }}</td>
                             <td>{{ $classTest->max_marks }}</td>
                             <td>{{ date('d-m-Y',strtotime($classTest->test_date)) }}</td>
                             <td>{{ $classTest->discription or '' }}</td>
                           @endforeach
                         </tr>
                          
                        </tbody>
                      </table>
                   </div>
                 </div>
                 <!-- /.card-body --> 
                 <div class="card-footer"> 
                     
                 </div>
                </div>
              </div>
          </div>      
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->


@endsection
@push('links')
<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css">
@endpush
@push('scripts')
 <script type="text/javascript" src="//cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
 <script type="text/javascript">
     $(document).ready(function(){
        $('#class_test_data_table').DataTable();
    });

     
  </script>
  @endpush