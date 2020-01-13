@extends('admin.layout.base')
@section('body')
<section class="content-header">
    <button onclick="callPopupLarge(this,'{{ route('admin.helper.edit') }}')" class="btn_edit btn btn-info btn-sm pull-right">Add Helper</button>
    <h1>Helpers <small>List</small> </h1>

</section>
<section class="content">
    <div class="box">             
      <!-- /.box-header -->
      <div class="box-body">
          <div class="row">

            <div class="col-lg-12 table-responsive">
                <table id="helpers_table" class="display table">                     
                    <thead>
                        <tr>
                            <th>Sr.no.</th>                               
                            <th>Name</th> 
                            <th>mobile</th> 
                            <th class="text-nowrap">contact no</th> 
                            <th class="text-nowrap">license number</th> 
                            <th class="text-nowrap">Date OF Birth</th> 
                            <th class="text-nowrap">Vehicle</th> 
                            <th class="text-nowrap">Permanent Address</th> 
                            <th class="text-nowrap">Correspondence Address</th> 
                            <th>Action</th>                                                            
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($helpers as $helper)
                        <tr>
                          <td>{{ ++$loop->index }}</td>                        	 
                          <td>{{ $helper->name }}</td>                             
                          <td>{{ $helper->mobile }}</td>
                          <td>{{ $helper->contact_no }}</td>
                          <td>{{ $helper->license_number }}</td>
                          <td>
                              @if ($helper->dob!=null)
                              {{ date('d-m-Y',strtotime($helper->dob))  }} 
                              @endif

                          </td>
                          <td>{{ $helper->vehicles->registration_no or '' }}</td>
                          <td>{{ $helper->address }}</td>
                          <td>{{ $helper->p_address }}</td>

                          <td>
                           @if(App\Helper\MyFuncs::menuPermission()->w_status == 1) 
                           <button onclick="callPopupLarge(this,'{{ route('admin.helper.edit',Crypt::encrypt($helper->id)) }}')" class="btn_edit btn btn-info btn-xs"><i class="fa fa-edit"></i></button>
                           @endif

                           @if(App\Helper\MyFuncs::menuPermission()->d_status == 1) 
                           <a href="{{ route('admin.helper.delete',Crypt::encrypt($helper->id)) }}" onclick="return confirm('Are you sure you want to delete this item?');" class="btn_delete btn btn-danger btn-xs"    ><i class="fa fa-trash"></i></a>
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



</section>
<!-- /.content -->
@endsection
@push('links')
<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css"> 
<link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery-ui.css" rel="Stylesheet" type="text/css" />

@endpush
@push('scripts')
<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js" type="text/javascript"></script>
<script type="text/javascript" src="//cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
<script>
 $('#helpers_table').DataTable();


 function setAddress(){
     if ($("#addressCheck").is(":checked")) {
       $('#p_address').val($('#address').val());
       $('#c_pincode').val($('#p_pincode').val());
       $('#p_address').attr('readonly', '');
       $('#c_pincode').attr('readonly', '');
   } else {
       $('#p_address').removeAttr('disabled');
       $('#c_pincode').removeAttr('disabled');
   }
}

$('#addressCheck').click(function(){
 setAddress();
})
</script>

@endpush