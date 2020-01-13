@extends('admin.layout.base')
@section('body')
<section class="content-header">
  <button onclick="callPopupLarge(this,'{{ route('admin.vehicle.edit') }}')" class="btn_edit btn btn-info btn-sm pull-right">Add Vehicle</button>
    <h1>Vehicle </h1>
     
</section>
    <section class="content"> 
            <div class="box">             
              <!-- /.box-header -->
                <div class="box-body">
                    <table id="vehicle_table" class="display table">                     
                        <thead>
                            <tr>
                                <th>Sr.no.</th>
                               
                                <th>registration no </th>
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
                        			  <button onclick="callPopupLarge(this,'{{ route('admin.vehicle.edit',Crypt::encrypt($Vehicle->id)) }}')" class="btn_edit btn btn-info btn-xs"><i class="fa fa-edit"></i></button>
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