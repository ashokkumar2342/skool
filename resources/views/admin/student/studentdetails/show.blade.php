@extends('admin.layout.base')
@section('body')
<section class="content-header">
    <h1> Student  <small>List</small> </h1>
       @includeIf('admin.include.hot_menu', ['menu_type_id' => 3])
</section>

    <section class="content">
        <div class="box">             
            <!-- /.box-header -->
            <div class="box-body">
              <table id="dataTable" class="table table-bordered table-striped table-hover">
                <thead>
                <tr>               
                  <th>id</th>
                  <th>User Name</th>
                  <th>Password</th>
                  <th>Class</th>
                  <th>Section</th>
                  <th>Name</th>
                  <th>Father Name</th> 
                  <th width="80px">Action</th>                  
                </tr>
                </thead>
                <tbody>
                @foreach($students as $student)
                <tr>
                  <td>{{ $student->id }}</td>
                  <td>{{ $student->username }}</td>
                  <td>{{ $student->tem_pass }}</td>
                  <td>{{ $student->classes->alias or '' }}</td>
                  <td>{{ $student->sectionTypes->name or '' }}</td>
                  <td>{{ $student->name }}</td>
                  <td>{{ $student->father_name }}</td>
                   
                  <td align="center">
                     @if(App\Helper\MyFuncs::menuPermission()->r_status == 1)
                   <a class="btn btn-primary btn-xs" title="View Student" href="{{ route('admin.student.view',$student->id) }}"><i class="fa fa-eye"></i></a>
                   @endif
                    @if(App\Helper\MyFuncs::menuPermission()->w_status == 1)
                    <a class="btn btn-warning btn-xs" title="Edit Student" href="{{ route('admin.student.edit',$student->id) }}"><i class="fas fa-edit"></i></a>
                    @endif 
                    {{-- <a onclick="return confirm('Are you sure to reset this student password.')" class="btn btn-danger btn-xs" title="Password Reset" href="{{ route('admin.student.passwordreset',$student->id) }}"><i class="fa fa-key"></i></a> --}}
                    
                    @if (App\Helper\MyFuncs::menuPermission()->w_status== 1)
                    <a onclick="return confirm('Are you sure to delete Student.')" class="btn btn-danger btn-xs" title="delete student" href="{{ route('admin.student.delete',$student->id) }}"><i class="fas fa-trash-alt"></i></a> 
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