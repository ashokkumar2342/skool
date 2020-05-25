@extends('admin.layout.base')
@section('body')
  <!-- Main content -->
  <section class="content-header">
    <button class="btn btn-info btn-sm pull-right" onclick="callPopupLarge(this,'{{ route('admin.guardian.edit') }}')">Add Guardian</button>
    <a href="{{ route('admin.guardian.report') }}" title="" target="blank" class="btn btn-sm btn-primary pull-right" style="margin-right: 5px">PDF</a>
    <h1>Guardians<small>List</small> </h1> 
    </section>  
    <section class="content"> 
          
          <div class="box"> 
            <div class="box-body"> 
            <div class="table-responsive"> 
              <table class="table table-bordered table-condensed" id="guardianRelationTypes">
                  <thead>
                    <tr>
                      <th>Sr.No.</th>
                      <th>Name</th>
                      <th>Code</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @php
                      $arrayId=1;
                    @endphp
                    @foreach ($guardianRelationTypes as $guardianRelationType)
                            <tr>
                              <td>{{ $arrayId++ }}</td>
                              <td>{{ $guardianRelationType->name }}</td>
                              <td>{{ $guardianRelationType->code }}</td>
                              <td>
                                <button class="btn btn-info btn-xs" onclick="callPopupLarge(this,'{{ route('admin.guardian.edit',$guardianRelationType->id) }}')"><i class="fa fa-edit"></i></button>
                                <a href="{{ route('admin.guardian.delete',$guardianRelationType->id) }}" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></a>
                              </td>
                            </tr> 
                    @endforeach
                  </tbody>
                </table>
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
        $('#guardianRelationTypes').DataTable();
    });

     $('#btn_event_type_table_show').click();
  </script>
  @endpush
     
 
 