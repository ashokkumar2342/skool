@extends('admin.layout.base')
@section('body')
  <!-- Main content -->
  <section class="content-header">
    
    <h1>Guardian Type<small>List</small> </h1> 
    </section>  
    <section class="content"> 
          
          <div class="box"> 
            <div class="box-body">
              <form action="{{ route('admin.guardian.store') }}" method="post" class="add_form" content-refresh="guardianRelationTypes">
              {{ csrf_field() }} 
                 <div class="row">
                     <div class="col-xs-4">
                     <label>Guardian Type</label>
                     <input type="text" name="guardian" class="form-control">        
                    </div>
                    <div class="col-xs-4" style="margin-top: 24px"> 
                     <input type="submit"  class="btn btn-success">        
                    </div>
                 </div>
              </form>
              <table class="table table-bordered table-condensed" id="guardianRelationTypes">
                  <thead>
                    <tr>
                      <th>Name</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($guardianRelationTypes as $guardianRelationType)
                            <tr>
                              <td>{{ $guardianRelationType->name }}</td>
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
        $('#event_type_data_table').DataTable();
    });

     $('#btn_event_type_table_show').click();
  </script>
  @endpush
     
 
 