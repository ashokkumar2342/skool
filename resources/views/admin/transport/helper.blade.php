@extends('admin.layout.base')
@section('body')
<section class="content-header">
    <h1>Helper </h1>
      <ol class="breadcrumb">
      </ol>
</section>
    <section class="content">
        <div class="box">             
            <!-- /.box-header -->
            <div class="box-body">             
                <div class="col-md-12"> 
	                <form class="form-horizontal add_form" content-refresh="helpers_table" action="{{ route('admin.helper.post') }}" method="post">              
                  {{ csrf_field() }}                                       
	                   <div class="col-lg-3">                                             
	                       <div class="form-group">
	                         {{ Form::text('name','',['class'=>'form-control','id'=>'name', 'placeholder'=>'Name']) }} 
	                       </div>                                         
	                    </div>
	                     
                      <div class="col-lg-3">                                             
                         <div class="form-group">
                           {{ Form::text('mobile','',['class'=>'form-control','id'=>'mobile','rows'=>4, 'placeholder'=>' Mobile']) }} 
                         </div>                                         
                      </div>
                      <div class="col-lg-3">                                             
                         <div class="form-group">
                           {{ Form::text('contact_no','',['class'=>'form-control','id'=>'contact_no','rows'=>4, 'placeholder'=>' Contact No']) }} 
                         </div>                                         
                      </div>
                       
                      <div class="col-lg-3">                                             
                         <div class="form-group">
                           {{ Form::text('license_number','',['class'=>'form-control','id'=>'licensenumber','rows'=>4, 'placeholder'=>' License Number']) }} 
                         </div>                                         
                      </div> 
                      <div class="col-lg-3">                                             
                         <div class="form-group">
                           {{ Form::text('address','',['class'=>'form-control','id'=>'address','rows'=>4, 'placeholder'=>'Permanent Address']) }} 
                         </div>                                         
                      </div>
                      <div class="col-lg-3">                                             
                         <div class="form-group">
                           {{ Form::text('p_address','',['class'=>'form-control','id'=>'p_address','rows'=>4, 'placeholder'=>' Correspondence Address']) }} 
                         </div>                                         
                      </div><div class="col-lg-3">                                             
                         <div class="form-group">
                           {{ Form::date('dob','',['class'=>'form-control','id'=>'dob','rows'=>4, 'placeholder'=>' Date of Birth']) }} 
                         </div>                                         
                      </div>
                       <div class="col-lg-3">                                             
                         <div class="form-group">
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
                    <table id="helpers_table" class="display table">                     
                        <thead>
                            <tr>
                                <th>Sn</th>                               
                                <th>Name</th> 
                                <th>mobile</th> 
                                <th>contact_no</th> 
                                <th>license_number</th> 
                                <th>address</th> 
                                <th>Corresponding Address</th> 
                                <th>dob</th> 
                                <th>Vehicle</th> 
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
                            <td>{{ $helper->address }}</td>
                            <td>{{ $helper->p_address }}</td>
                            <td>{{ $helper->dob }}</td>
                            <td>{{ $helper->vehicles->registration_no or '' }}</td>
                        		 
                        		<td> 
                        			 <button onclick="callPopupLarge(this,'{{ route('admin.helper.edit',Crypt::encrypt($helper->id)) }}')" class="btn_edit btn btn-warning btn-xs"><i class="fa fa-edit"></i></button>
                               
                        			<a href="{{ route('admin.helper.delete',Crypt::encrypt($helper->id)) }}" onclick="return confirm('Are you sure you want to delete this item?');" class="btn_delete btn btn-danger btn-xs"    ><i class="fa fa-trash"></i></a>
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
    
@endpush