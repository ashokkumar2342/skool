@extends('admin.layout.base')
@section('body')
  <!-- Main content -->
  <section class="content-header">
    <button type="button" class="btn-sm btn-info pull-right" onclick="callPopupLarge(this,'{{ route('admin.hr.master.designation.add')}}')">Add Designations</button>
    <h1>Designations<small>List</small> </h1>
       
    </section>  
    <section class="content"> 
          <div class="box"> 
            <div class="box-body">
              <table class="table" id="designation_table">
                <thead>
                  <tr>
                    <th>Sr.No.</th>
                    <th>Designation Name</th>
                    <th>Designation Code</th> 
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  @php
                    $arrayId=1;
                  @endphp
                  @foreach ($designations as $designation)
                        <tr>
                          <td>{{ $arrayId++ }}</td>
                          <td>{{ $designation->name }}</td>
                          <td>{{ $designation->code }}</td> 
                          <td>
                            <a href="#" title="Edit" class="btn btn-info btn-xs" onclick="callPopupLarge(this,'{{ route('admin.hr.master.designation.add',Crypt::encrypt($designation->id))}}')"><i class="fa fa-edit"></i></a>
                            <a href="{{ route('admin.hr.master.designation.delete',Crypt::encrypt($designation->id)) }}" title="Delete" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></a></td>
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
        $('#designation_table').DataTable();
    });

     
  </script>
  @endpush
     
 
 