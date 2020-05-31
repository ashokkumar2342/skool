 @extends('admin.layout.base')
@push('links')
   <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
   <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.5.1/css/buttons.dataTables.min.css">
    
@endpush
@section('body')

<section class="content-header">
     <button type="button" class="pull-right btn btn-info btn-sm" onclick="callPopupLarge(this,'{{ route('admin.feeGroup.add.form') }}')">Add Fee Group</button>
     <button type="button" class="pull-right btn btn-primary btn-sm" style="margin-right: 10px" onclick="callPopupLarge(this,'{{ route('admin.finance.class.fee.structure.report','fee_group') }}')">PDF Report</button>
    <h1>Fee Groups <small> List </small></h1>
</section>
    <section class="content">
        <div class="box">             
            <!-- /.box-header -->
            <div class="box-body">             
            <div class="table-responsive">             
             <table id="fee_group_table" class="display table">                     
                        <thead>
                            <tr>
                                <th>Sr.No.</th>                                 
                                <th>Fee Group Name</th>
                                <th>Description</th>
                                <th>Action</th>                                                            
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($feeGroups as $feeGroup)
                          <tr>
                            <td>{{ ++$loop->index }}</td>                            
                            <td>{{ $feeGroup->name }}</td>
                            <td>{{ $feeGroup->description }}</td>
                            <td>
                             
                              <button type="button" class="btn btn-warning btn-xs" onclick="callPopupLarge(this,'{{ route('admin.feeGroup.group',$feeGroup->id) }}')" title="Group"><i class="fa fa-group" style="color:yellow"></i></i> </button>
                              
                               @if(App\Helper\MyFuncs::menuPermission()->w_status == 1) 
                              <button type="button" class="btn btn-info btn-xs" onclick="callPopupLarge(this,'{{ route('admin.feeGroup.add.form',Crypt::encrypt($feeGroup->id)) }}')"><i class="fa fa-edit"></i> </button>
                              @endif

                               @if(App\Helper\MyFuncs::menuPermission()->d_status == 1) 
                              <a href="{{ route('admin.feeGroup.delete',Crypt::encrypt($feeGroup->id)) }}" class="btn btn-danger btn-xs" title="Delete" onclick="return confirm('Are you sure you want to delete this item?');"><i class="fa fa-trash"></i></a>
                              @endif
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
        $('#fee_group_table').DataTable( {
        paging: false,
        dom: 'Bfrtip',
            buttons: [
              'copy', 'csv', 'excel', 'pdf', 'print'
            ]
    });
      }); 
  </script>
  </script>
 <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>  
 <script type="text/javascript" src="//cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/1.5.1/js/dataTables.buttons.min.js"></script>
 <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.flash.min.js"></script>
 <script type="text/javascript" language="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
 <script type="text/javascript" language="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/pdfmake.min.js"></script>
 <script type="text/javascript" language="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/vfs_fonts.js"></script>
 <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.html5.min.js"></script>
 <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.print.min.js"></script>
  @endpush 