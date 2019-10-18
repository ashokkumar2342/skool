@extends('admin.layout.base')
@section('body')
<section class="content-header">
    <h1>Transport </h1>
      
        @includeIf('admin.include.hot_menu', ['menu_type_id' => 14])
      
</section>
    <section class="content">
        <div class="box">             
            <!-- /.box-header -->
            <div class="box-body">             
                <div class="col-md-12"> 
	                <form class="add_form" content-refresh="transport_table" action="{{ route('admin.transport.post') }}" method="post">              
                  {{ csrf_field() }}                                       
	                   <div class="col-lg-2">                                             
	                       <div class="form-group">
                          <label>Name</label>
                          <span class="fa fa-asterisk"></span>
	                         {{ Form::text('name','',['class'=>'form-control','id'=>'name', 'placeholder'=>' Enter Name','maxlength'=>'50']) }}
	                         <p class="errorCode text-center alert alert-danger hidden"></p>
	                       </div>                                         
	                    </div>
	                     <div class="col-lg-2">                                             
                         <div class="form-group">
                          <label>Mobile Number</label>
                          <span class="fa fa-asterisk"></span>
                           {{ Form::text('mobile','',['class'=>'form-control','id'=>'mobile','rows'=>4, 'placeholder'=>' Enter mobile No','maxlength'=>'10','onkeypress'=>'return event.charCode >= 48 && event.charCode <= 57']) }}
                           <p class="errorName text-center alert alert-danger hidden"></p>
                         </div>                                         
                      </div> 
                      <div class="col-lg-2">                 
                         <div class="form-group">
                          <label>Contact Number</label>
                          <span class="fa fa-asterisk"></span> 
                           {{ Form::text('contact_no','',['class'=>'form-control','id'=>'contact_no','rows'=>4, 'placeholder'=>'Enter Contact No','maxlength'=>'10','onkeypress'=>'return event.charCode >= 48 && event.charCode <= 57']) }}
                           <p class="errorName text-center alert alert-danger hidden"></p>
                         </div>                                         
                      </div> 
                      <div class="col-lg-2">                                             
                         <div class="form-group">
                          <label>Email</label>
                          <span class="fa fa-asterisk"></span>
                           {{ Form::email('email','',['class'=>'form-control','id'=>'email','rows'=>4, 'placeholder'=>'Enter Email','maxlength'=>'50']) }}
                           <p class="errorName text-center alert alert-danger hidden"></p>
                         </div>                                         
                      </div> 
                      <div class="col-lg-2">                                             
                         <div class="form-group">
                          <label>GST Number</label>
                          <span class="fa fa-asterisk"></span>
                           {{ Form::text('gst_no','',['class'=>'form-control','id'=>'gst_no','rows'=>4, 'placeholder'=>'Enter GST No','maxlength'=>'50']) }}
                           <p class="errorName text-center alert alert-danger hidden"></p>
                         </div>                                         
                      </div>
                      <div class="col-lg-2">
                      <label>IFSC Code</label>
                      <span class="fa fa-asterisk"></span>                                             
                         <div class="form-group">
                           {{ Form::text('ifsc_code','',['class'=>'form-control','id'=>'ifsc_code','rows'=>4, 'placeholder'=>'Enter IFSC Code','maxlength'=>'50']) }}
                           <p class="errorName text-center alert alert-danger hidden"></p>
                         </div>                                         
                      </div>
                      <div class="col-lg-2">                                             
                         <div class="form-group">
                          <label>Account number</label>
                          <span class="fa fa-asterisk"></span>
                           {{ Form::text('account_no','',['class'=>'form-control','id'=>'account_no','rows'=>4, 'placeholder'=>'Enter Account No','maxlength'=>'50']) }}
                           <p class="errorName text-center alert alert-danger hidden"></p>
                         </div>                                         
                      </div> 
                      <div class="col-lg-2">                                             
                         <div class="form-group">
                          <label>Branch Code</label>
                          <span class="fa fa-asterisk"></span>
                           {{ Form::text('branch_code','',['class'=>'form-control','id'=>'branch_code','rows'=>4, 'placeholder'=>'Enter Branch Code','maxlength'=>'50']) }}
                           <p class="errorName text-center alert alert-danger hidden"></p>
                         </div>                                         
                      </div>
                      <div class="col-lg-2">                                             
                         <div class="form-group">
                          <label>Branch Name</label>
                          <span class="fa fa-asterisk"></span>
                           {{ Form::text('branch_name','',['class'=>'form-control','id'=>'branch_name','rows'=>4, 'placeholder'=>'Enter Branch Name','maxlength'=>'50']) }}
                           <p class="errorName text-center alert alert-danger hidden"></p>
                         </div>                                         
                      </div>
                      <div class="col-lg-4">                                             
                         <div class="form-group">
                          <label>Account Holder Name</label>
                          <span class="fa fa-asterisk"></span>
                           {{ Form::text('account_holder_name','',['class'=>'form-control','id'=>'account_holder_name','rows'=>4, 'placeholder'=>'Enter Account Holder Name','maxlength'=>'50']) }}
                           <p class="errorName text-center alert alert-danger hidden"></p>
                         </div>                                         
                      </div>
                      <div class="col-lg-2">                                             
	                       <div class="form-group">
                          <label>Pincode</label>
                          <span class="fa fa-asterisk"></span>
	                         {{ Form::text('pincode','',['class'=>'form-control','id'=>'pincode','rows'=>4, 'placeholder'=>'Enter Pincode','maxlength'=>'6','onkeypress'=>'return event.charCode >= 48 && event.charCode <= 57']) }}
	                         <p class="errorName text-center alert alert-danger hidden"></p>
	                       </div>                                         
	                    </div>                     
	                    <div class="col-lg-5">                         
                          <div class="form-group">
                            <label>Permanent Address</label>
                            <span class="fa fa-asterisk"></span>
                            {{ Form::textarea('address','',['class'=>'form-control','id'=>'p_address','rows'=>1, 'placeholder'=>'Enter Permanent Address','maxlength'=>'250']) }}
                            <p class="errorDescription text-center alert alert-danger hidden"></p>
                          </div>
                      </div>
                       <div class="form-group col-lg-1">
                         <input type="checkbox" id="addressCheck" name="addressCheck" style="margin-top: 30px">
                         <label>Same As</label> 
                       </div>
                    <div class="col-lg-6">                         
	                        <div class="form-group">
                            <label>Correspondence Address</label>

	                          {{ Form::textarea('address','',['class'=>'form-control','id'=>'c_address','rows'=>1, 'placeholder'=>'Enter Correspondence Address','maxlength'=>'250']) }}
	                          <p class="errorDescription text-center alert alert-danger hidden"></p>
	                        </div>
	                    </div>
	                     <div class="col-lg-12 text-center">                                             
	                     <button class="btn btn-success" type="submit" id="btn_fee_account_create">Create</button> 
	                    </div>                     
	                </form> 
                </div> 
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

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
                              <button onclick="callPopupLarge(this,'{{ route('admin.transport.edit',Crypt::encrypt($transport->id)) }}')" class="btn_edit btn btn-warning btn-xs"><i class="fa fa-edit"></i></button>
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