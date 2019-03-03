@extends('admin.layout.base')
@section('body')
<section class="content-header">
    <h1>Vehicle Type </h1>
      <ol class="breadcrumb">
      </ol>
</section>
    <section class="content">
        <div class="box">             
            <!-- /.box-header -->
            <div class="box-body">             
                <div class="col-md-12"> 
	                <form class="add_form" content-refresh="vehicleType_table" action="{{ route('admin.vehicleType.post') }}" method="post">              
                  {{ csrf_field() }}                                       
	                   <div class="col-lg-4">                                             
	                       <div class="form-group">
                          <label>Vehicle Type</label>
	                         {{ Form::text('vehicle_type','',['class'=>'form-control','id'=>'vehicle_type', 'placeholder'=>'  Vehicle Type','maxlength'=>'50']) }}
	                        
	                       </div>                                         
	                    </div>
	                     
                      <div class="col-lg-8">                                             
                         <div class="form-group">
                          <label>Description</label>
                           {{ Form::text('description','',['class'=>'form-control','id'=>'description','rows'=>4, 'placeholder'=>' Description','maxlength'=>'250']) }}
                          
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
                    <table id="vehicleType_table" class="display table">                     
                        <thead>
                            <tr>
                                <th>Sn</th>
                               
                                <th>Vehicle Type</th> 
                                <th>Description</th> 
                                <th>Action</th>                                                            
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($VehicleTypes as $VehicleType)
                        	<tr>
                        		<td>{{ ++$loop->index }}</td>
                        	 
                            <td>{{ $VehicleType->vehicle_type }}</td>
                             
                        		<td>{{ $VehicleType->description }}</td>
                        		<td> 
                               @if(App\Helper\MyFuncs::menuPermission()->w_status == 1)
                        			<button onclick="callPopupLarge(this,'{{ route('admin.vehicleType.edit',Crypt::encrypt($VehicleType->id)) }}')" class="btn_edit btn btn-warning btn-xs"><i class="fa fa-edit"></i></button>
                              @endif

                               @if(App\Helper\MyFuncs::menuPermission()->d_status == 1) 
                        			<a href="{{ route('admin.vehicleType.delete',Crypt::encrypt($VehicleType->id)) }}" onclick="return confirm('Are you sure you want to delete this item?');" class="btn_delete btn btn-danger btn-xs"    ><i class="fa fa-trash"></i></a>
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
       $('#vehicleType_table').DataTable();
    </script>
    
    
@endpush