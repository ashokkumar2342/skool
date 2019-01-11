@extends('admin.layout.base')
@section('body')
<section class="content-header">
    <h1>Vehicle </h1>
      <ol class="breadcrumb">
      </ol>
</section>
    <section class="content">
        <div class="box">             
            <!-- /.box-header -->
            <div class="box-body">             
                <div class="col-md-12"> 
	                <form class="form-horizontal add_form" content-refresh="vehicle_table" action="{{ route('admin.vehicle.post') }}" method="post">              
                  {{ csrf_field() }}                                       
	                   <div class="col-lg-3">                                             
	                       <div class="form-group">
	                         {{ Form::text('registration_no','',['class'=>'form-control','id'=>'registration_no', 'placeholder'=>'  Registration No']) }}
	                        
	                       </div>                                         
	                    </div>
	                     <div class="col-lg-3">                                             
                         <div class="form-group">
                           {{ Form::text('chassis_no','',['class'=>'form-control','id'=>'chassis_no','rows'=>4, 'placeholder'=>'  Chassis No']) }}
              
                         </div>                                         
                      </div> 
                      <div class="col-lg-3">                                             
                         <div class="form-group">
                           {{ Form::text('model_no','',['class'=>'form-control','id'=>'model_no','rows'=>4, 'placeholder'=>' Model No']) }}
                  
                         </div>                                         
                      </div> 
                      <div class="col-lg-3">                                             
                         <div class="form-group">
                           {{ Form::text('engine_no','',['class'=>'form-control','id'=>'engine_no','rows'=>4, 'placeholder'=>' Engine No']) }}
                         
                         </div>                                         
                      </div> 
                      <div class="col-lg-3">                                             
                         <div class="form-group">
                           {{ Form::text('siting_capacity','',['class'=>'form-control','id'=>'siting_capacity','rows'=>4, 'placeholder'=>'Siting Capacity']) }}
                          
                         </div>                                         
                      </div>
                      <div class="col-lg-3">                                             
                         <div class="form-group">
                           {{ Form::text('average','',['class'=>'form-control','id'=>'average','rows'=>4, 'placeholder'=>' Average']) }}
                            
                         </div>                                         
                      </div>
                        <div class="col-lg-3">                                             
                         <div class="form-group">
                              {!! Form::select('transport_id',$transports, null, ['class'=>'form-control','placeholder'=>'Select Transport','required']) !!}
                         </div>                                         
                      </div>
                       <div class="col-lg-3">                                             
                         <div class="form-group">
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
                        			  <button onclick="callPopupLarge(this,'{{ route('admin.vehicle.edit',Crypt::encrypt($Vehicle->id)) }}')" class="btn_edit btn btn-warning btn-xs"><i class="fa fa-edit"></i></button>

                        			<a href="{{ route('admin.vehicle.delete',Crypt::encrypt($Vehicle->id)) }}" onclick="return confirm('Are you sure you want to delete this item?');" class="btn_delete btn btn-danger btn-xs"    ><i class="fa fa-trash"></i></a>
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
    
@endpush