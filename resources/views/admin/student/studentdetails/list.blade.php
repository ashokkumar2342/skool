@extends('admin.layout.base')
@section('body')
<section class="content-header">
    <h1> Student  <small>List</small> </h1>
      <ol class="breadcrumb">
       <li><span ><a href="{{ route('admin.student.form') }}" class="btn btn-info btn-sm" >Add Student</a></span></li>        
      </ol>
</section>

    <section class="content">
        <div class="box">             
            <!-- /.box-header -->
            <div class="box-body">
              <table id="dataTable" class="table table-bordered table-striped table-hover">
                <thead>
                <tr>               
                  <th>Registration No</th>
                  
                  <th>Name</th>
                  <th>Father Name</th> 
                  <th>Father Mobile</th> 
                  <th>Mother Mobile</th> 
                  <th width="80px">Action</th>                  
                </tr>
                </thead>
                <tbody>
                @foreach($students as $student)
                <tr>
                  <td>{{ $student->registration_no }}</td>
               
                  <td>{{ $student->name }}</td>
                  <td>{{ $student->father_name }}</td>
                  <td>{{ $student->father_mobile }}</td>
                  <td>{{ $student->mother_mobile }}</td>
                   
                  <td align="center">
                   <a class="btn btn-primary btn-xs" title="View Student" href="{{ route('admin.student.view',$student->id) }}"><i class="fa fa-eye"></i></a> 
                    <a class="btn btn-warning btn-xs"  title="Edit Student" href="{{ route('admin.student.edit',$student->id) }}"><i class="fa fa-edit"></i> 
                    {{-- <a onclick="return confirm('Are you sure to reset this student password.')" class="btn btn-danger btn-xs" title="Password Reset" href="{{ route('admin.student.passwordreset',$student->id) }}"><i class="fa fa-key"></i></a> --}}
                    @if (Auth::guard('admin')->user()->id == 1)
                    <a style="margin-left: 3px;" onclick="return confirm('Are you sure to delete Student.')" class="btn btn-danger btn-xs" title="delete student" href="{{ route('admin.student.delete',$student->id) }}"><i class="fa fa-trash"></i></a> 
                    @endif
                    
                  </td>
                 
                </tr>
                @endforeach
                </tbody>
                 
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

          <!-- Trigger the modal with a button -->



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
        $('#dataTable').DataTable();
    });
     
 </script>
@endpush