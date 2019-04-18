@extends('admin.layout.base')
@section('body')
<section class="content-header">
    <h1>Driver </h1>
      <ol class="breadcrumb">
      </ol>
</section>
    <section class="content">
        <div class="box">             
            <!-- /.box-header -->
            <div class="box-body">             
                <div class="col-md-12"> 
	                <form class="add_form" content-refresh="driver_table" action="{{ route('admin.driver.post') }}" method="post">              
                  {{ csrf_field() }}                                       
	                   <div class="col-lg-3">                                             
	                       <div class="form-group">
                          <label>Name</label>
	                         {{ Form::text('name','',['class'=>'form-control','id'=>'name', 'placeholder'=>'Name','maxlength'=>'50']) }} 
	                       </div>                                         
	                    </div>
	                     
                      <div class="col-lg-3">                                             
                         <div class="form-group">
                          <label>Mobile Number</label>
                           {{ Form::text('mobile','',['class'=>'form-control','id'=>'mobile','rows'=>4, 'placeholder'=>' Mobile','maxlength'=>'10','onkeypress'=>'return event.charCode >= 48 && event.charCode <= 57']) }} 
                         </div>                                         
                      </div>
                      <div class="col-lg-3">                                             
                         <div class="form-group">
                          <label>Contact Number</label>
                           {{ Form::text('contact_no','',['class'=>'form-control','id'=>'contact_no','rows'=>4, 'placeholder'=>' Contact No','maxlength'=>'10','onkeypress'=>'return event.charCode >= 48 && event.charCode <= 57']) }} 
                         </div>                                         
                      </div>
                       
                      <div class="col-lg-3">                                             
                         <div class="form-group">
                          <label>License Number</label>
                           {{ Form::text('license_number','',['class'=>'form-control','id'=>'licensenumber','rows'=>4, 'placeholder'=>' License Number','maxlength'=>'20']) }} 
                         </div>                                         
                      </div> 
                      <div class="col-lg-3">                                             
                         <div class="form-group">
                          <label>Permanent Address</label>
                           {{ Form::text('address','',['class'=>'form-control','id'=>'address','rows'=>4, 'placeholder'=>'Permanent Address','maxlength'=>'200']) }} 
                         </div>                                         
                      </div>
                      <div class="col-lg-3">                                             
                         <div class="form-group">
                          <label>Correspondence Address</label>
                           {{ Form::text('p_address','',['class'=>'form-control','id'=>'p_address','rows'=>4, 'placeholder'=>' Correspondence Address','maxlength'=>'200']) }} 
                         </div>                                         
                      </div><div class="col-lg-3">                                             
                         <div class="form-group">
                          <label>Date of Birth</label>
                           {{ Form::date('dob','',['class'=>'form-control','id'=>'dob','rows'=>4, 'placeholder'=>' Date of Birth']) }} 
                         </div>                                         
                      </div>
                       <div class="col-lg-3">                                             
                         <div class="form-group">
                          <label>Select Vehicle</label>
                              {!! Form::select('vehicle_id',$vehicles, null, ['class'=>'form-control','placeholder'=>'Select Vehicle','required']) !!}
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
                    <table id="driver_table" class="display table">                     
                        <thead>
                            <tr>
                                <th>Sn</th>                               
                                <th>Name</th> 
                                <th>mobile</th> 
                                <th>contact_no</th> 
                                <th>license_number</th> 
                                <th>address</th> 
                                <th>Corresponding Address</th> 
                                <th>Date of Birth</th> 
                                <th>Vehicle</th> 
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
                            <td>{{ $driver->address }}</td>
                            <td>{{ $driver->p_address }}</td>
                            <td>
                            @if ($driver->dob!=null)
                               {{ date('d-m-Y',strtotime($driver->dob))}} 
                            @endif
                           </td>
                            <td>{{ $driver->vehicles->registration_no or '' }}</td>
                        		 
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
    </script>
    
@endpush