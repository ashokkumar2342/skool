@extends('admin.layout.base')
@section('body')
<section class="content-header">
    <h1>Transport </h1>
      <ol class="breadcrumb">
      </ol>
</section>
    <section class="content">
        <div class="box">             
            <!-- /.box-header -->
            <div class="box-body">             
                <div class="col-md-12"> 
	                <form class="form-horizontal add_form" content-refresh="transport_table" action="{{ route('admin.transport.post') }}" method="post">              
                  {{ csrf_field() }}                                       
	                   <div class="col-lg-2">                                             
	                       <div class="form-group">
	                         {{ Form::text('name','',['class'=>'form-control','id'=>'name', 'placeholder'=>'  Name']) }}
	                         <p class="errorCode text-center alert alert-danger hidden"></p>
	                       </div>                                         
	                    </div>
	                     <div class="col-lg-2">                                             
                         <div class="form-group">
                           {{ Form::text('mobile','',['class'=>'form-control','id'=>'mobile','rows'=>4, 'placeholder'=>'  mobile']) }}
                           <p class="errorName text-center alert alert-danger hidden"></p>
                         </div>                                         
                      </div> 
                      <div class="col-lg-2">                                             
                         <div class="form-group">
                           {{ Form::text('contact_no','',['class'=>'form-control','id'=>'contact_no','rows'=>4, 'placeholder'=>' Contact No']) }}
                           <p class="errorName text-center alert alert-danger hidden"></p>
                         </div>                                         
                      </div> 
                      <div class="col-lg-2">                                             
                         <div class="form-group">
                           {{ Form::text('email','',['class'=>'form-control','id'=>'email','rows'=>4, 'placeholder'=>' Email']) }}
                           <p class="errorName text-center alert alert-danger hidden"></p>
                         </div>                                         
                      </div> 
                      <div class="col-lg-2">                                             
                         <div class="form-group">
                           {{ Form::text('gst_no','',['class'=>'form-control','id'=>'gst_no','rows'=>4, 'placeholder'=>' GST No']) }}
                           <p class="errorName text-center alert alert-danger hidden"></p>
                         </div>                                         
                      </div>
                      <div class="col-lg-2">                                             
                         <div class="form-group">
                           {{ Form::text('ifsc_code','',['class'=>'form-control','id'=>'ifsc_code','rows'=>4, 'placeholder'=>' IFSC Code']) }}
                           <p class="errorName text-center alert alert-danger hidden"></p>
                         </div>                                         
                      </div>
                      <div class="col-lg-2">                                             
                         <div class="form-group">
                           {{ Form::text('account_no','',['class'=>'form-control','id'=>'account_no','rows'=>4, 'placeholder'=>' Account No']) }}
                           <p class="errorName text-center alert alert-danger hidden"></p>
                         </div>                                         
                      </div> 
                      <div class="col-lg-2">                                             
                         <div class="form-group">
                           {{ Form::text('branch_code','',['class'=>'form-control','id'=>'branch_code','rows'=>4, 'placeholder'=>' Branch Code']) }}
                           <p class="errorName text-center alert alert-danger hidden"></p>
                         </div>                                         
                      </div>
                      <div class="col-lg-2">                                             
                         <div class="form-group">
                           {{ Form::text('branch_name','',['class'=>'form-control','id'=>'branch_name','rows'=>4, 'placeholder'=>' Branch Name']) }}
                           <p class="errorName text-center alert alert-danger hidden"></p>
                         </div>                                         
                      </div>
                      <div class="col-lg-4">                                             
                         <div class="form-group">
                           {{ Form::text('account_holder_name','',['class'=>'form-control','id'=>'account_holder_name','rows'=>4, 'placeholder'=>' Account holder Name']) }}
                           <p class="errorName text-center alert alert-danger hidden"></p>
                         </div>                                         
                      </div>
                      <div class="col-lg-2">                                             
	                       <div class="form-group">
	                         {{ Form::text('pincode','',['class'=>'form-control','id'=>'pincode','rows'=>4, 'placeholder'=>' Pincode']) }}
	                         <p class="errorName text-center alert alert-danger hidden"></p>
	                       </div>                                         
	                    </div>                     
	                    <div class="col-lg-6">                         
                          <div class="form-group">
                            {{ Form::textarea('address','',['class'=>'form-control','id'=>'address','rows'=>1, 'placeholder'=>'Permanent Address']) }}
                            <p class="errorDescription text-center alert alert-danger hidden"></p>
                          </div>
                      </div>
                      <div class="col-lg-6">                         
	                        <div class="form-group">
	                          {{ Form::textarea('address','',['class'=>'form-control','id'=>'address','rows'=>1, 'placeholder'=>'Correspondence Address']) }}
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
                    <table id="transport_table" class="display table">                     
                        <thead>
                            <tr>
                                <th>Sn</th>
                               
                                <th>Name</th>
                                <th>Mobile</th>
                                <th>contact no</th>
                                <th>email</th>
                                <th>gst no</th>
                                <th>ifsc code</th>
                                <th>account no</th>
                                <th>branch code</th>
                                <th>branch name</th>
                                <th>account holder name</th>
                                <th>address</th> 
                                <th>pincode</th> 
                                <th>Action</th>                                                            
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
                        		<td> 
                        			{{-- <button type="button" class="btn_edit btn btn-warning btn-xs" data-toggle="modal" data-id="{{ $transport->id }}"  data-code="{{ $transport->code }}" data-name="{{ $transport->name }}" data-description="{{ $transport->description }}" data-target="#add_parent"><i class="fa fa-edit"></i> </button> --}}

                        			<a href="{{ route('admin.transport.delete',Crypt::encrypt($transport->id)) }}" onclick="return confirm('Are you sure you want to delete this item?');" class="btn_delete btn btn-danger btn-xs"    ><i class="fa fa-trash"></i></a>
                        		</td>
                        	</tr>  	 
                        @endforeach	
                           
                        </tbody>
                             

                    </table>
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
    
@endpush