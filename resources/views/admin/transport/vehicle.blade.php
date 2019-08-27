@extends('admin.layout.base')
@section('body')
<section class="content-header">
    <h1>Vehicle </h1>
     @includeIf('admin.include.hot_menu', ['menu_type_id' => 14])
</section>
    <section class="content">
        <div class="box">             
            <!-- /.box-header -->
            <div class="box-body">             
                <div class="col-md-12"> 
	                <form class="add_form" content-refresh="vehicle_table" action="{{ route('admin.vehicle.post') }}" method="post">              
                  {{ csrf_field() }}                                       
	                   <div class="col-lg-3">                                             
	                       <div class="form-group">
                          <label>Registration Number</label>
	                         {{ Form::text('registration_no','',['class'=>'form-control','id'=>'registration_no', 'placeholder'=>'  Registration No','maxlength'=>'20','required']) }}
	                        
	                       </div>                                         
	                    </div>
	                     <div class="col-lg-3">                                             
                         <div class="form-group">
                          <label>Chassis Number</label>
                           {{ Form::text('chassis_no','',['class'=>'form-control','id'=>'chassis_no','rows'=>4, 'placeholder'=>'Chassis No','maxlength'=>'50','required']) }}
              
                         </div>                                         
                      </div> 
                      <div class="col-lg-3">                                             
                         <div class="form-group">
                          <label>Model Number</label>
                           {{ Form::text('model_no','',['class'=>'form-control','id'=>'model_no','rows'=>4, 'placeholder'=>' Model No','maxlength'=>'50','required']) }}
                  
                         </div>                                         
                      </div> 
                      <div class="col-lg-3">                                             
                         <div class="form-group">
                          <label>Engine Number</label>
                           {{ Form::text('engine_no','',['class'=>'form-control','id'=>'engine_no','rows'=>4, 'placeholder'=>' Engine No','maxlength'=>'50','required']) }}
                         
                         </div>                                         
                      </div> 
                      <div class="col-lg-3">                                             
                         <div class="form-group">
                          <label>Siting Capacity</label>
                           {{ Form::text('siting_capacity','',['class'=>'form-control','id'=>'siting_capacity','maxlength'=>'20','onkeypress'=>'return event.charCode >= 48 && event.charCode <= 57','placeholder'=>'Siting Capacity','required']) }}
                          
                         </div>                                         
                      </div>
                      <div class="col-lg-3">                                             
                         <div class="form-group">
                          <label>Average</label>
                           {{ Form::text('average','',['class'=>'form-control','id'=>'average', 'placeholder'=>' Average','maxlength'=>'3','onkeypress'=>'return event.charCode >= 48 && event.charCode <= 57','required']) }}
                            
                         </div>                                         
                      </div>
                        <div class="col-lg-3">                                             
                         <div class="form-group">
                          <label>Select Transport</label>
                              {!! Form::select('transport_id',$transports, null, ['class'=>'form-control','placeholder'=>'Select Transport','required']) !!}
                         </div>                                         
                      </div>
                       <div class="col-lg-3">                                             
                         <div class="form-group">
                          <label>Select Vehicle Type</label>
                              {!! Form::select('vehicle_type_id',$vehicleTypes, null, ['class'=>'form-control','placeholder'=>'Select Vehicle Type','required']) !!}
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
                    <table id="vehicle_table" class="display table">                     
                        <thead>
                            <tr>
                                <th>Sn</th>
                               
                                <th>registration_no </th>
                                <th>chassis no </th>
                                <th>model no </th>
                                <th>engine no </th>
                                <th>seating capacity </th>
                                <th>average </th>
                                <th>transport  </th>
                                <th>vehicle Type </th>
                              
                               
                                <th>Action</th>                                                            
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($Vehicles as $Vehicle)
                        	<tr>
                        		<td>{{ ++$loop->index }}</td>
                        	 
                            <td>{{ $Vehicle->registration_no }}</td>
                            <td>{{ $Vehicle->chassis_no }}</td>
                            <td>{{ $Vehicle->model_no }}</td>
                            <td>{{ $Vehicle->engine_no }}</td>
                            <td>{{ $Vehicle->siting_capacity }}</td>
                            <td>{{ $Vehicle->average }}</td>
                            <td>{{ $Vehicle->transport->name or '' }}</td>
                          
                          
                            <td>{{ $Vehicle->vehicleType->vehicle_type or '' }}</td>
                        	 
                        		<td> 
                               @if(App\Helper\MyFuncs::menuPermission()->w_status == 1)
                        			  <button onclick="callPopupLarge(this,'{{ route('admin.vehicle.edit',Crypt::encrypt($Vehicle->id)) }}')" class="btn_edit btn btn-warning btn-xs"><i class="fa fa-edit"></i></button>
                                @endif

                                 @if(App\Helper\MyFuncs::menuPermission()->d_status == 1) 
                        			<a href="{{ route('admin.vehicle.delete',Crypt::encrypt($Vehicle->id)) }}" onclick="return confirm('Are you sure you want to delete this item?');" class="btn_delete btn btn-danger btn-xs"    ><i class="fa fa-trash"></i></a>
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
<meta name="csrf-token" content="{{ csrf_token() }}"> 
@endpush
@push('scripts')
 <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js" type="text/javascript"></script>
  <script type="text/javascript" src="//cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
    <script>
       $('#vehicle_table').DataTable();
    </script>
    
@endpush