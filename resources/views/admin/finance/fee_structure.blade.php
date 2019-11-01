@extends('admin.layout.base')
@section('body')
<section class="content-header">
    <h1>Fee Structure </h1>
      <ol class="breadcrumb">
      </ol>
</section>
    <section class="content">
        <div class="box">             
            <!-- /.box-header -->
            <div class="box-body">             
                <div class="col-md-12"> 
	                <form class="form-vertical" id="form_fee_structure">                                                     
	                   <div class="col-lg-2">                                             
	                       <div class="form-group"> 
                           {{ Form::label('code','Fee Structure Code',['class'=>'form-label']) }}
                           <span class="fa fa-asterisk"></span>
	                         {{ Form::text('code','',['class'=>'form-control','id'=>'code', 'placeholder'=>'Enter Fee Structure Code','maxlength'=>'3']) }}
	                         <p class="errorCode text-center alert alert-danger hidden"></p>
	                       </div>                                         
	                    </div>
	                     <div class="col-lg-2">                                             
	                       <div class="form-group">
                           {{ Form::label('name','Fee Structure Name',['class'=>'form-label']) }}
                           <span class="fa fa-asterisk"></span> 
	                         {{ Form::text('name','',['class'=>'form-control','id'=>'name','rows'=>4, 'placeholder'=>'Enter Fee Structure Name','maxlength'=>'50']) }}
	                         <p class="errorName text-center alert alert-danger hidden"></p>
	                       </div>                                         
	                    </div>                     
	                    <div class="col-lg-2">                           
                             <div class="form-group">
                              {{ Form::label('fee_account_id','Fee Account Name',['class'=>' control-label']) }}
                              <span class="fa fa-asterisk"></span>
                               {{ Form::select('fee_account_id',$feeAccount,null,['class'=>'form-control','placeholder'=>'Select Fee Account']) }}
                               <p class="errorAmount1 text-center alert alert-danger hidden"></p>
                             </div>    
	                    </div>
                        <div class="col-lg-2">                           
                             <div class="form-group">
                              {{ Form::label('fine_scheme_id','Fine Scheme',['class'=>' control-label']) }}
                              <span class="fa fa-asterisk"></span>
                               {{ Form::select('fine_scheme_id',$fineScheme,null,['class'=>'form-control','placeholder'=>'Select Fine Scheme']) }}
                               <p class="errorAmount1 text-center alert alert-danger hidden"></p>
                             </div>    
                        </div>
                        <div class="col-lg-2">                           
                             <div class="form-group">
                              {{ Form::label('is_refundable','Is Refundable',['class'=>' control-label']) }}
                              <span class="fa fa-asterisk"></span>
                               {{ Form::select('is_refundable',['0'=>'No','1'=>'yes'],null,['class'=>'form-control']) }}
                               <p class="errorAmount1 text-center alert alert-danger hidden"></p>
                             </div>    
                        </div>
	                     <div class="col-lg-2" style="padding-top: 20px;">                                             
	                     <button class="btn btn-success" type="button" id="btn_fee_structure_create">Create</button> 
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
                    <table id="fee_structure_table" class="display table">                     
                        <thead>
                            <tr>
                                <th>SR.No.</th>
                                <th>Fee Structure Code</th>
                                <th>Fee Structure Name</th>
                                <th>Fee Account Name</th>
                                <th>Fine Scheme</th>
                                <th>Refundable</th>                                                            
                                <th>Action</th>                                                            
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($feeStructures as $feeStructure)
                        	<tr>
                        		<td>{{ ++$loop->index }}</td>
                        		<td>{{ $feeStructure->code }}</td>
                        		<td>{{ $feeStructure->name }}</td>
                                <td>{{ $feeStructure->feeAccounts->name or '' }}</td>
                                <td>{{ $feeStructure->fineSchemes->name or '' }}</td>
                        		<td>{{ $feeStructure->is_refundable == 1 ?'yes':'No' }}</td>
                        		<td>
                             @if(App\Helper\MyFuncs::menuPermission()->w_status == 1) 
                        			<button type="button" class="btn_edit btn btn-warning btn-xs" data-toggle="modal" data-id="{{ $feeStructure->id }}"  data-code="{{ $feeStructure->code }}" data-name="{{ $feeStructure->name }}" data-feeaccount="{{ $feeStructure->fee_account_id }}" data-finescheme="{{ $feeStructure->fine_scheme_id }}" data-refundable="{{ $feeStructure->is_refundable }}"><i class="fa fa-edit"></i> </button>
                              @endif 
                               @if(App\Helper\MyFuncs::menuPermission()->d_status == 1)
                        			<button class="btn_delete btn btn-danger btn-xs"  data-id="{{ $feeStructure->id }}"  ><i class="fa fa-trash"></i></button>
                              @endif
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
             <div id="fee_structure_model" class="modal fade" role="dialog">
                 <div class="modal-dialog">
                  <!-- Modal content-->
                     <div class="modal-content">
                         <div class="modal-header">
                             <button type="button" class="close" data-dismiss="modal">&times;</button>
                              <h4 class="modal-title"> Update</h4>
                          </div>
                          <div class="modal-body">
                            <form id="form_model_fee_structure"> 
                        		<input type="hidden" name="id" id="edit_id">
                               <div class="form-group">
                                {{ Form::label('code','Fee Structure Code',['class'=>' control-label']) }}
                                <span class="fa fa-asterisk"></span>
                                 {{ Form::text('code','',['class'=>'form-control','id'=>'edit_code', 'placeholder'=>'Enter fee structure code','maxlength'=>'3']) }}
                                 <p class="errorCode text-center alert alert-danger hidden"></p>
                               </div>       
                               <div class="form-group">
                                {{ Form::label('name','Fee Structure Name',['class'=>' control-label']) }}
                                <span class="fa fa-asterisk"></span>                                
                                 {{ Form::text('name','',['class'=>'form-control','id'=>'edit_name','rows'=>4, 'placeholder'=>'Enter fee structure name','maxlength'=>'50']) }}
                                 <p class="errorName text-center alert alert-danger hidden"></p>
                               </div>      
                               <div class="form-group">
                                {{ Form::label('fee_account','Fee Account Name',['class'=>' control-label']) }}
                                <span class="fa fa-asterisk"></span>
                                {{ Form::select('fee_account',$feeAccount,null,['class'=>'form-control','id'=>'edit_fee_account']) }}
                               </div>  
                                <div class="form-group">
                                {{ Form::label('fine_scheme','Fine Scheme',['class'=>' control-label']) }}
                                <span class="fa fa-asterisk"></span>
                                {{ Form::select('fine_scheme',$fineScheme,null,['class'=>'form-control','id'=>'edit_fine_scheme']) }}
                               </div> 
                               <div class="form-group">
                                {{ Form::label('is_refundable','Is Refundable',['class'=>' control-label']) }}
                                <span class="fa fa-asterisk"></span>
                                 {{ Form::select('is_refundable',['0'=>'No','1'=>'yes'],null,['class'=>'form-control','id'=>'edit_Is_refundable']) }}
                                 <p class="errorAmount1 text-center alert alert-danger hidden"></p>
                               </div>   
                                                      
                            </form> 
                         </div>
                         <div class="modal-footer">
                             <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                             <button type="button" class="btn_update btn btn-success">Update</button>
                            
                         </div>
                     </div>
                </div>
             </div>
 
    </section>
    <!-- /.content -->
@endsection
@push('links')
<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css"> 
<meta name="csrf-token" content="{{ csrf_token() }}">
@endpush 
 @push('scripts')
  <script>
  	$('#btn_fee_structure_create').click(function(event) {  		  
  		$.ajaxSetup({
  		          headers: {
  		          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  		          }
  		      });
	     $.ajax({
           url: '{{ route('admin.feeStructure.post') }}',
           type: 'POST',       
           data: $('#form_fee_structure').serialize() ,
	    })
  		.done(function(data) {
  			if (data.class === 'error') {                 
  			     $.each(data.errors, function(index, val) {
  			         toastr[data.class](val) 
  			     }); 
  			}
  			  else {                 
  			    toastr[data.class](data.message)  
  			    $("#form_fee_structure")[0].reset(); 
  			    $("#fee_structure_table").load(location.href + ' #fee_structure_table'); 
  			} 
  		})
  		.fail(function() {
  			console.log("error");
  		})
  		.always(function() {
  			console.log("complete");
  		}); 
  	});/////////////////delete///////////////////
  	$('#fee_structure_table').on('click', '.btn_delete', function(event) {
  		var cm = confirm("Are you Sure Delete!");
  		if (cm == true) {
  		     event.preventDefault();  
  		     var id = $(this).data("id");
  		     $.ajaxSetup({
  		         headers: {
  		             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  		         }
  		     });      
  		     $.ajax({
  		         url: '{{ route('admin.feeStructure.delete') }}',
  		         type: 'delete',
  		         data: {id: id},
  		     })
  		     .done(function(data) {
  		         toastr[data.class](data.message)
  		         $("#fee_structure_table").load(location.href + ' #fee_structure_table'); 
  		     })
  		     .fail(function() {
  		         console.log("error");
  		     })
  		     .always(function() {
  		         console.log("complete");
  		     });
  		} else {
  		    console.log("cancel");
  		}
  	    
  	});///////////////////edit//////////// 
  	 $('#fee_structure_table').on('click', '.btn_edit', function(event) {
  	     event.preventDefault();  
  	     $('.modal-title').text('Edit');
         $('#edit_id').val($(this).data('id'));        
         $('#edit_code').val($(this).data('code'));        
         $('#edit_name').val($(this).data('name'));        
        $('#edit_fee_account').val($(this).data('feeaccount'));   
         $('#edit_fine_scheme').val($(this).data('finescheme'));        
         $('#edit_Is_refundable').val($(this).data('refundable')); 
         $('#fee_structure_model').modal('show');
  	});////////////////update/////////////
 	 $('#fee_structure_model').on('click', '.btn_update', function(event) {
 	     event.preventDefault(); 
 	     $.ajaxSetup({
  		          headers: {
  		          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  		          }
  		      });
	     $.ajax({
           url: '{{ route('admin.feeStructure.update') }}',
           type: 'put',       
           data: $('#form_model_fee_structure').serialize() ,
	    })
  		.done(function(data) {
  			if (data.class === 'error') {                 
  			     $.each(data.errors, function(index, val) {
  			         toastr[data.class](val) 
  			     }); 
  			}
  			  else {                 
  			    toastr[data.class](data.message)  
  			    $("#form_model_fee_structure")[0].reset();
  			    $('#fee_structure_model').modal('hide');

  			    $("#fee_structure_table").load(location.href + ' #fee_structure_table'); 
  			} 
  		})
  		.fail(function() {
  			console.log("error");
  		})
  		.always(function() {
  			console.log("complete");
  		});  
 	});
     
  </script>
@endpush