@extends('admin.layout.base')
@section('body')
<section class="content-header">
    <h1>Transport Registration </h1>
      <ol class="breadcrumb">
      </ol>
</section>
    <section class="content">
        <div class="box">             
            <!-- /.box-header -->
            <div class="box-body">             
                <div class="col-md-12"> 
	                <form class="form add_form" content-refresh="route_table" action="{{ route('admin.transportRegistration.post') }}" method="post">              
                  {{ csrf_field() }}                                       
	                   <div class="col-lg-4">                                             
                         <div class="form-group">
                          {{ Form::label('student_id','Registration No',['class'=>' control-label']) }}
                           {{ Form::select('student_id',$students,null,['class'=>'form-control student_list_select','placeholder'=>"Select Registration",'required']) }}
                           <p class="errorAmount1 text-center alert alert-danger hidden"></p>
                         </div>                                         
                      </div>
                      <div class="col-lg-4">                                             
                         <div class="form-group">
                          {{ Form::label('morning_route_id','Morning Rroute',['class'=>' control-label']) }}
                           {{ Form::select('morning_route_id',$routes,null,['class'=>'form-control','placeholder'=>"Select Morning Route",'required']) }}
                           <p class="errorAmount1 text-center alert alert-danger hidden"></p>
                         </div>                                         
                      </div>
                       <div class="col-lg-4">                                             
                         <div class="form-group">
                          {{ Form::label('evening_route_id','Evening Rroute',['class'=>' control-label']) }}
                           {{ Form::select('evening_route_id',$routes,null,['class'=>'form-control','placeholder'=>"Select Evening Route",'required']) }}
                           <p class="errorAmount1 text-center alert alert-danger hidden"></p>
                         </div>                                         
                      </div>
                       <div class="col-lg-4">                                             
                         <div class="form-group">
                          {{ Form::label('morning_boarding_point_id','Morning Boarding Point',['class'=>' control-label']) }}
                           {{ Form::select('morning_boarding_point_id',$boardingPoints,null,['class'=>'form-control','placeholder'=>"Select Morning Boarding Point",'required']) }}
                           <p class="errorAmount1 text-center alert alert-danger hidden"></p>
                         </div>                                         
                      </div>
                       <div class="col-lg-4">                                             
	                       <div class="form-group">
                          {{ Form::label('evening_boarding_point_id','Evening Boarding Point',['class'=>' control-label']) }}
                           {{ Form::select('evening_boarding_point_id',$boardingPoints,null,['class'=>'form-control','placeholder'=>"Select Evening Boarding Point",'required']) }}
                           <p class="errorAmount1 text-center alert alert-danger hidden"></p>
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
                    <table id="route_table" class="display table">                     
                        <thead>
                            <tr>
                                <th>Sn</th>
                               
                                <th>Name</th> 
                                <th>Description</th> 
                                <th>Action</th>                                                            
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($transportRegistrations as $transportRegistration)
                        	<tr>
                        		<td>{{ ++$loop->index }}</td>
                        	 
                            <td>{{ $transportRegistration->students->name or '' }}</td>
                            <td>{{ $transportRegistration->morningRoutes->name or ''}}</td>
                            <td>{{ $transportRegistration->eveningRoutes->name or ''}}</td>
                            <td>{{ $transportRegistration->morningBoardingPoints->name or ''}}</td>
                            <td>{{ $transportRegistration->eveningBoardingPoints->name or ''}}</td>
                            
                        		<td> 
                        			<button type="button" class="btn_edit btn btn-warning btn-xs" data-toggle="modal" data-id="{{ $transportRegistration->id }}"  data-code="{{ $transportRegistration->code }}" data-name="{{ $transportRegistration->name }}" data-description="{{ $transportRegistration->description }}" data-target="#add_parent"><i class="fa fa-edit"></i> </button>

                        			<a href="{{ route('admin.transportRegistration.delete',Crypt::encrypt($transportRegistration->id)) }}" onclick="return confirm('Are you sure you want to delete this item?');" class="btn_delete btn btn-danger btn-xs"    ><i class="fa fa-trash"></i></a>
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
   <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
   {{-- <link rel="stylesheet" href="{{ asset('admin_asset/plugins/select2/select2.min.css') }}"> --}}
 <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />


<meta name="csrf-token" content="{{ csrf_token() }}">
@endpush 
 @push('scripts')
 <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
 {{-- <script src="{{ asset('admin_asset/plugins/select2/select2.full.min.js') }}"></script> --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>

 <script> 
    $( ".datepicker").datepicker();   
 
 </script>
 
  <script>
    // In your Javascript (external .js resource or <script> tag)
    $(document).ready(function() {
        $('.student_list_select').select2();
    });
  </script>
@endpush