@extends('admin.layout.base')
@section('body')
<section class="content-header">
    <h1>Driver </h1>
     @includeIf('admin.include.hot_menu', ['menu_type_id' => 14])
</section>
    <section class="content">
        <div class="box">             
            <!-- /.box-header -->
            <div class="box-body">             
                <div class="col-md-12"> 
	                <form class="add_form" content-refresh="driver_table" action="{{ route('admin.driver.post') }}" method="post">              
                  {{ csrf_field() }}                                       
	                   <div class="col-lg-4">                                             
	                       <div class="form-group">
                          <label>Name</label>
                          <span class="fa fa-asterisk"></span>
	                         {{ Form::text('name','',['class'=>'form-control','id'=>'name', 'placeholder'=>'Enter Name','maxlength'=>'50']) }} 
	                       </div>                                         
	                    </div>
	                     
                      <div class="col-lg-4">                                             
                         <div class="form-group">
                          <label>Mobile Number</label>
                          <span class="fa fa-asterisk"></span>
                           {{ Form::text('mobile','',['class'=>'form-control','id'=>'mobile','rows'=>4, 'placeholder'=>'Enter Mobile Number','maxlength'=>'10','onkeypress'=>'return event.charCode >= 48 && event.charCode <= 57']) }} 
                         </div>                                         
                      </div>
                      <div class="col-lg-4">                                             
                         <div class="form-group">
                          <label>Contact Number</label>
                          <span class="fa fa-asterisk"></span>
                           {{ Form::text('contact_no','',['class'=>'form-control','id'=>'contact_no','rows'=>4, 'placeholder'=>'Enter  Contact Number','maxlength'=>'10','onkeypress'=>'return event.charCode >= 48 && event.charCode <= 57']) }} 
                         </div>                                         
                      </div>
                       
                      <div class="col-lg-4">                                             
                         <div class="form-group">
                          <label>License Number</label>
                          <span class="fa fa-asterisk"></span>
                           {{ Form::text('license_number','',['class'=>'form-control','id'=>'licensenumber','rows'=>4, 'placeholder'=>'Enter  License Number','maxlength'=>'20']) }} 
                         </div>                                         
                      </div> 
                      <div class="col-lg-4">                                             
                         <div class="form-group">
                          <label>Date of Birth</label>
                          <span class="fa fa-asterisk"></span>
                           {{ Form::date('dob','',['class'=>'form-control','id'=>'dob','rows'=>4, 'placeholder'=>'Enter  Date of Birth']) }} 
                         </div>                                         
                      </div>
                       <div class="col-lg-4">                                             
                         <div class="form-group">
                          <label>Vehicle</label>
                          <span class="fa fa-asterisk"></span>
                              {!! Form::select('vehicle_id',$vehicles, null, ['class'=>'form-control','placeholder'=>' Select Vehicle','required']) !!}
                         </div>                                         
                      </div>
                      <div class="col-lg-5">                                             
                         <div class="form-group">
                          <label>Permanent Address</label>
                          <span class="fa fa-asterisk"></span>
                           {{ Form::text('address','',['class'=>'form-control','id'=>'address','rows'=>4, 'placeholder'=>'Enter Permanent Address','maxlength'=>'200']) }} 
                         </div>                                         
                      </div>
                      <div class="form-group col-lg-1">
                         <input type="checkbox" id="addressCheck" name="addressCheck" style="margin-top: 30px">
                         <label>Same As</label> 
                       </div>
                      <div class="col-lg-6">                                             
                         <div class="form-group">
                          <label>Correspondence Address</label>
                          <span class="fa fa-asterisk"></span>
                           {{ Form::text('p_address','',['class'=>'form-control','id'=>'p_address','rows'=>4, 'placeholder'=>'Enter  Correspondence Address','maxlength'=>'200']) }} 
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
                    <table id="driver_table" class="display table table-responsive">                     
                        <thead>
                            <tr>
                                <th>Sr.no</th>                               
                                <th>Name</th> 
                                <th>mobile</th> 
                                <th class="text-nowrap">contact no</th> 
                                <th class="text-nowrap">license number</th> 
                                <th class="text-nowrap">Date of Birth</th> 
                                <th class="text-nowrap">Vehicle</th> 
                                <th class="text-nowrap">Permanent Address</th> 
                                <th class="text-nowrap">Correspondence Address</th> 
                                <th>Action</th>                                                            
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($drivers as $driver)
                        	<tr>
                        		<td>{{ ++$loop->index }}</td>                        	 
                            <td>{{ $driver->name }}</td>                             
                            <td>{{ $driver->mobile }}</td>
                            <td>{{ $driver->contact_no }}</td>
                            <td>{{ $driver->license_number }}</td>
                            <td>
                            @if ($driver->dob!=null)
                               {{ date('d-m-Y',strtotime($driver->dob))}} 
                            @endif
                           </td>
                            <td>{{ $driver->vehicles->registration_no or '' }}</td>
                            <td>{{ $driver->address }}</td>
                            <td>{{ $driver->p_address }}</td>
                        		 
                        		<td>
                             @if(App\Helper\MyFuncs::menuPermission()->w_status == 1) 
                        			<button onclick="callPopupLarge(this,'{{ route('admin.driver.edit',Crypt::encrypt($driver->id)) }}')" class="btn_edit btn btn-warning btn-xs"><i class="fa fa-edit"></i></button>
                              @endif

                               @if(App\Helper\MyFuncs::menuPermission()->d_status == 1) 
                        			<a href="{{ route('admin.driver.delete',Crypt::encrypt($driver->id)) }}" onclick="return confirm('Are you sure you want to delete this item?');" class="btn_delete btn btn-danger btn-xs"    ><i class="fa fa-trash"></i></a>
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
       $('#driver_table').DataTable();
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