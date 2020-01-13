@extends('admin.layout.base')
@section('body')
<section class="content-header">
  <button onclick="callPopupLarge(this,'{{ route('admin.transport.edit') }}')" class="btn_edit btn btn-info btn-sm pull-right">Add Transport</button>
    <h1>Transport </h1> 
</section>
    <section class="content"> 
             <div class="box">             
              <!-- /.box-header -->
                <div class="box-body">
                  <div class="row">
                   
                    <div class="col-lg-12 table-responsive">
                      <table id="transport_table">                     
                        <thead>
                            <tr>
                                <th>Sr.No.</th>
                               
                                <th class="text-nowrap">Name</th>
                                <th class="text-nowrap">Mobile</th>
                                <th class="text-nowrap">contact no</th>
                                <th class="text-nowrap">email</th>
                                <th class="text-nowrap">gst no</th>
                                <th class="text-nowrap">ifsc code</th>
                                <th class="text-nowrap">account no</th>
                                <th class="text-nowrap">branch code</th>
                                <th class="text-nowrap">branch name</th>
                                <th class="text-nowrap">account holder name</th>
                                <th>address</th> 
                                <th>pincode</th> 
                                <th class="text-nowrap">Action</th>                                                            
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($transports as $transport)
                          <tr>
                            <td>{{ ++$loop->index }}</td>
                           
                            <td>{{ $transport->name }}</td>
                            <td>{{ $transport->mobile }}</td>
                            <td>{{ $transport->contact_no }}</td>
                            <td>{{ $transport->email }}</td>
                            <td>{{ $transport->gst_no }}</td>
                            <td>{{ $transport->ifsc_code }}</td>
                            <td>{{ $transport->account_no }}</td>
                            <td>{{ $transport->branch_code }}</td>
                            <td>{{ $transport->branch_name }}</td>
                            <td>{{ $transport->account_holder_name }}</td>
                            <td>{{ $transport->address }}</td>
                            <td>{{ $transport->pincode }}</td>
                            <td class="text-nowrap"> 
                                @if(App\Helper\MyFuncs::menuPermission()->w_status == 1)
                              <button onclick="callPopupLarge(this,'{{ route('admin.transport.edit',Crypt::encrypt($transport->id)) }}')" class="btn_edit btn btn-info btn-xs"><i class="fa fa-edit"></i></button>
                              @endif

                               @if(App\Helper\MyFuncs::menuPermission()->d_status == 1) 
                              <a href="{{ route('admin.transport.delete',Crypt::encrypt($transport->id)) }}" onclick="return confirm('Are you sure you want to delete this item?');" class="btn_delete btn btn-danger btn-xs"    ><i class="fa fa-trash"></i></a>
                              @endif
                            </td>
                          </tr>    
                        @endforeach 
                           
                        </tbody>
                             

                    </table>
                    </div>

                  </div>
                </div>
            </div>    

          <!-- Trigger the modal with a button --> 
          <!--- Model parents      -->     
              <!-- Modal -->
            
 
    </section>
    <!-- /.content -->
@endsection
@push('links')
<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css"> 
<link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery-ui.css" rel="Stylesheet" type="text/css" />
<meta name="csrf-token" content="{{ csrf_token() }}"> 
@endpush
@push('scripts')
 <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js" type="text/javascript"></script>
 <script type="text/javascript" src="//cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
    <script>
       $('#transport_table').DataTable();
    </script>
    <script>
     function setAddress(){
       if ($("#addressCheck").is(":checked")) {
         $('#c_address').val($('#p_address').val());
         $('#c_pincode').val($('#p_pincode').val());
         $('#c_address').attr('readonly', '');
         $('#c_pincode').attr('readonly', '');
       } else {
         $('#c_address').removeAttr('disabled');
         $('#c_pincode').removeAttr('disabled');
       }
     }

     $('#addressCheck').click(function(){
       setAddress();
     })
   </script>
@endpush