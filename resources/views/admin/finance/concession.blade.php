 @extends('admin.layout.base')
@push('links')
   <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
   <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.5.1/css/buttons.dataTables.min.css">
    
@endpush
@section('body')

<section class="content-header">
     <button type="button" class="pull-right btn btn-info btn-sm" onclick="callPopupLarge(this,'{{ route('admin.concession.add.form') }}')">Add Concession</button>
    <h1>Concessions List </h1>
</section>
    <section class="content">
        <div class="box">             
            <!-- /.box-header -->
            <div class="box-body">             
             <table id="concession_table" class="display table">                     
                        <thead>
                            <tr>
                                <th>SR.No.</th>                                 
                                <th>Concession Name</th>
                                <th>Amount</th>
                                <th>Percentage</th>
                                <th>Action</th>                                                            
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($concessions as $concession)
                          <tr>
                            <td>{{ ++$loop->index }}</td>                            
                            <td>{{ $concession->name }}</td>
                            <td>{{ $concession->amount }}</td>
                            <td>{{ $concession->percentage?$concession->percentage.'%':'' }}</td>
                            <td>
                             @if(App\Helper\MyFuncs::menuPermission()->w_status == 1) 
                              <button type="button" class="btn btn-info btn-xs" onclick="callPopupLarge(this,'{{ route('admin.concession.add.form',$concession->id) }}')"><i class="fa fa-edit"></i> </button>
                               @endif
                               @if(App\Helper\MyFuncs::menuPermission()->d_status == 1) 
                              <a href="{{ route('admin.concession.delete',$concession->id) }}" class="btn btn-danger btn-xs" title="Delete"><i class="fa fa-trash"></i></a>
                              @endif
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
        $('#concession_table').DataTable();
    });

     $('#btn_event_type_table_show').click();
  </script>
  @endpush 