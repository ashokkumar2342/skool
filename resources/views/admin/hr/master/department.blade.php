@extends('admin.layout.base')
@section('body')
  <!-- Main content -->
  <section class="content-header">
    <button type="button" class="btn-sm btn-info pull-right" onclick="callPopupLarge(this,'{{ route('admin.hr.master.department.add')}}')">Add Department</button>
    <h1>Departments<small>List</small> </h1>
       
    </section>  
    <section class="content"> 
          <div class="box"> 
            <div class="box-body">
              <table class="table" id="departments_table">
                <thead>
                  <tr>
                    <th>Sr.No.</th>
                    <th>Department Name</th>
                    <th>Department Code</th>
                    <th>Description</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  @php
                    $arrayId=1;
                  @endphp
                  @foreach ($departments as $department)
                        <tr>
                          <td>{{ $arrayId++ }}</td>
                          <td>{{ $department->name }}</td>
                          <td>{{ $department->code }}</td>
                          <td>{{ $department->description }}</td>
                          <td>
                            
                            @if(App\Helper\MyFuncs::menuPermission()->w_status == 1) 
                              <a href="#" title="Edit" class="btn btn-info btn-xs" onclick="callPopupLarge(this,'{{ route('admin.hr.master.department.add',Crypt::encrypt($department->id))}}')"><i class="fa fa-edit"></i></a>
                              @endif
                              @if(App\Helper\MyFuncs::menuPermission()->d_status == 1) 
                              <a href="{{ route('admin.hr.master.department.delete',Crypt::encrypt($department->id)) }}" class="btn btn-danger btn-xs" title="Delete" onclick="return confirm('Are you sure you want to delete this item?');"><i class="fa fa-trash"></i></a>
                              @endif


                            
                        </tr> 
                  @endforeach
                </tbody>
              </table>
           
            </div>
          </div>
        </div>
      </div>
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
        $('#departments_table').DataTable();
    });

     
  </script>
  @endpush
     
 
 