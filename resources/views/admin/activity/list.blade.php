@extends('admin.layout.base')
@section('body')
    <section class="content">
      	<div class="box">
            <div class="box-header">
              <h3 class="box-title">Activity List</h3>
               


            </div>
            <!-- /.box-header -->
            <div class="box-body">
              
              
              </form>

              </body>
              </html>
              <table id="dataTable" class="table table-bordered table-striped table-hover">
                <thead>
                <tr>
                  <th>Sn</th>                
                  <th>User Name</th>
                  <th>Message</th>
                  <th>Date And Time</th>
                  <th width="80px">Action</th>                  
                </tr>
                </thead>
                <tbody>
                @foreach($activities as $activity)
                <tr>
                  <td>{{ $activity->id }}</td>
                  <td>{{ $activity->admins->first_name}}</td>
                  <td>{{ $activity->message }}</td>
                  <td>{{ $activity->created_at->diffForHumans() }}</td>
                  <td align="center"> 
                   @if(App\Helper\MyFuncs::menuPermission()->d_status == 1) 
                    <a class="btn btn-danger btn-xs" onclick="return confirm('Are you sure to delete this data ?')" href="{{ route('admin.activity.delete',$activity->id) }}"><i class="fa fa-trash"></i></a>
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
        $('#dataTable').DataTable();
    });
     
 </script>
@endpush