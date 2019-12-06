 @extends('admin.layout.base')
@push('links')
   <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
   <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.5.1/css/buttons.dataTables.min.css">
    
@endpush
@section('body')

<section class="content-header">
     <button type="button" class="pull-right btn btn-info btn-sm" onclick="callPopupLarge(this,'{{ route('admin.feeStructure.add.form') }}')">Add Fee Structure</button>
    <h1>Fee Structures <small>List</small> </h1>
</section>
    <section class="content">
        <div class="box">             
            <!-- /.box-header -->
            <div class="box-body">             
             <table id="fee_structure_table" class="display table">                     
                        <thead>
                            <tr>
                                <th>SR.No.</th>
                                <th>Fee Structure Code</th>
                                <th>Fee Structure Name</th>
                                <th>Fee Account Name</th>
                                <th>Fine Scheme</th>
                                <th>Refundable</th>                                                            
                                <th>Action</th>                                                            
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($feeStructures as $feeStructure)
                          <tr>
                            <td>{{ ++$loop->index }}</td>
                            <td>{{ $feeStructure->code }}</td>
                            <td>{{ $feeStructure->name }}</td>
                                <td>{{ $feeStructure->feeAccounts->name or '' }}</td>
                                <td>{{ $feeStructure->fineSchemes->name or '' }}</td>
                            <td>{{ $feeStructure->is_refundable == 1 ?'yes':'No' }}</td>
                            <td>
                             @if(App\Helper\MyFuncs::menuPermission()->w_status == 1) 
                              <button type="button" class=" btn btn-info btn-xs" onclick="callPopupLarge(this,'{{ route('admin.feeStructure.add.form',$feeStructure->id) }}')"><i class="fa fa-edit"></i> </button>
                              @endif 
                               @if(App\Helper\MyFuncs::menuPermission()->d_status == 1)
                              <a href="{{ route('admin.feeStructure.delete',$feeStructure->id) }}"  class=" btn btn-danger btn-xs" title="Delete"> <i class="fa fa-trash"></i></button></a>
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
        $('#fee_structure_table').DataTable();
    });

     $('#btn_event_type_table_show').click();
  </script>
  @endpush 