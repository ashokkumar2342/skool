 @extends('admin.layout.base')
@push('links')
   <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
   <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.5.1/css/buttons.dataTables.min.css">
    
@endpush
@section('body')

<section class="content-header">
     <button type="button" class="pull-right btn btn-info btn-sm" onclick="callPopupLarge(this,'{{ route('admin.fineScheme.add.form') }}')">Add Fine Scheme</button>
    <h1>Fine Schemes <small>List</small></h1>
</section>
    <section class="content">
        <div class="box">             
            <!-- /.box-header -->
            <div class="box-body">             
             <table id="fine_scheme_table" class="display table table-bordered">                     
                        <thead>
                            <tr>
                                <th>Sr.No.</th>
                                <th>Code</th>
                                <th>Name</th>
                                <th>Amount 1</th>
                                <th>Amount 2</th>
                                <th>Amount 3</th>
                                <th>Days After 1</th>
                                <th>Days After 2</th>
                                <th>Fine Period</th> 
                                <th>Action</th>                                                            
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($fineSchemes as $fineScheme)
                          <tr>
                            <td>{{ ++$loop->index }}</td>
                            <td>{{ $fineScheme->code }}</td>
                            <td>{{ $fineScheme->name }}</td>
                                <td>{{ $fineScheme->fine_amount1 }}</td>
                                <td>{{ $fineScheme->fine_amount2 }}</td>
                                <td>{{ $fineScheme->fine_amount2 }}</td>
                                <td>{{ $fineScheme->day_after1 }}</td>
                                <td>{{ $fineScheme->day_after2 }}</td>
                            <td>{{ $fineScheme->finePeriods->name }}</td>
                            <td>
                             @if(App\Helper\MyFuncs::menuPermission()->w_status == 1) 
                              <button type="button" class="btn btn-info btn-xs" onclick="callPopupLarge(this,'{{ route('admin.fineScheme.add.form',Crypt::encrypt($fineScheme->id)) }}')"><i class="fa fa-edit"></i> </button>
                              @endif
                               @if(App\Helper\MyFuncs::menuPermission()->d_status == 1)
                              <a href="{{ route('admin.fineScheme.delete',Crypt::encrypt($fineScheme->id)) }}" class="btn_delete btn btn-danger btn-xs" onclick="return confirm('Are you sure you want to delete this item?');"><i class="fa fa-trash"></i></a>
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
        $('#fine_scheme_table').DataTable();
    });

     $('#btn_event_type_table_show').click();
  </script>
  @endpush 