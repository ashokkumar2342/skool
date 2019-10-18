@extends('admin.layout.base')
@push('links')
   <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
   <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.5.1/css/buttons.dataTables.min.css">
    
@endpush
@section('body')

<section class="content-header">
    <h1>Fee Account </h1>
     @includeIf('admin.include.hot_menu', ['menu_type_id' => 4])
</section>
    <section class="content">
        <div class="box">             
            <!-- /.box-header -->
            <div class="box-body">             
                <div class="col-md-12"> 
	                <form class="form" id="form_fee_account">                                                     
	                   <div class="col-lg-4">                                             
	                       <div class="form-group">
                          <label>Fee Account Code</label>
	                         {{ Form::text('code','',['class'=>'form-control','id'=>'code', 'placeholder'=>'Enter Fee Account Code','maxlength'=>'3']) }}
	                         <p class="errorCode text-center alert alert-danger hidden"></p>
	                       </div>                                         
	                    </div>
	                     <div class="col-lg-4">                                             
	                       <div class="form-group">
                          <label>Fee Account Name</label>
	                         {{ Form::text('name','',['class'=>'form-control','id'=>'name','rows'=>4, 'placeholder'=>'Enter Fee Account Name','maxlength'=>'50']) }}
	                         <p class="errorName text-center alert alert-danger hidden"></p>
	                       </div>                                         
	                    </div>                     
	                    <div class="col-lg-4">                         
	                        <div class="form-group">
                            <label>Sorting Order No </label>
	                          {{ Form::text('sorting_order_no','',['class'=>'form-control','id'=>'sorting_order_no','rows'=>1, 'placeholder'=>'Enter Sorting Order No','maxlength'=>'2','onkeypress'=>'return event.charCode >= 48 && event.charCode <= 57']) }}
	                          <p class="errorDescription text-center alert alert-danger hidden"></p>
	                        </div>
	                    </div>
                      <div class="col-lg-12">                         
                          <div class="form-group">
                            <label>Description</label>
                            {{ Form::textarea('description','',['class'=>'form-control','id'=>'description','rows'=>1, 'placeholder'=>'Enter Description','maxlength'=>'250']) }}
                            <p class="errorDescription text-center alert alert-danger hidden"></p>
                          </div>
                      </div>
	                     <div class="col-lg-12 text-center"> 
                        </br>                                          
	                     <button class="btn btn-success" type="button" id="btn_fee_account_create">Create</button> 
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
                    <table id="fee_account_table" class="display table">                     
                        <thead>
                            <tr>
                                <th>Sr.No.</th>
                                <th>Fee Account Code</th>
                                <th>Fee Account Name</th>
                                <th>Sorting Order No</th>
                                <th>Description</th>
                                <th>Action</th>                                                            
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($feeAccounts as $feeAccount)
                        	<tr>
                        		<td>{{ ++$loop->index }}</td>
                        		<td>{{ $feeAccount->code }}</td>
                        		<td>{{ $feeAccount->name }}</td>
                            <td>{{ $feeAccount->orderby_no }}</td>
                        		<td>{{ $feeAccount->description }}</td>
                        		<td> 
                               @if(App\Helper\MyFuncs::menuPermission()->w_status == 1)
                        			<button type="button" class="btn_edit btn btn-warning btn-xs" data-toggle="modal" data-id="{{ $feeAccount->id }}"  data-code="{{ $feeAccount->code }}" data-name="{{ $feeAccount->name }}" data-description="{{ $feeAccount->description }}" data-target="#add_parent"><i class="fa fa-edit"></i> </button>
                              @endif

                               @if(App\Helper\MyFuncs::menuPermission()->d_status == 1) 
                        			<button class="btn_delete btn btn-danger btn-xs"  data-id="{{ $feeAccount->id }}"  ><i class="fa fa-trash"></i></button>
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
             <div id="fee_account_model" class="modal fade" role="dialog">
                 <div class="modal-dialog">
                  <!-- Modal content-->
                     <div class="modal-content">
                         <div class="modal-header">
                             <button type="button" class="close" data-dismiss="modal">&times;</button>
                              <h4 class="modal-title"> Update</h4>
                          </div>
                          <div class="modal-body">
                            <form id="form_model_fee_account"> 
                            		<input type="hidden" name="id" id="edit_id">
                                   <div class="form-group">
                                       <label>Fee Account Code</label>
                                     {{ Form::text('code','',['class'=>'form-control','id'=>'edit_code', 'placeholder'=>'Enter fee account code','maxlength'=>'3']) }}
                                     <p class="errorCode text-center alert alert-danger hidden"></p>
                                   </div>       
                                   <div class="form-group">
                                    <label>Fee Account Name</label>
                                     {{ Form::text('name','',['class'=>'form-control','id'=>'edit_name','rows'=>4, 'placeholder'=>'Enter fee account name','maxlength'=>'30']) }}
                                     <p class="errorName text-center alert alert-danger hidden"></p>
                                   </div>      
                                    <div class="form-group">
                                      <label>Sorting Order No </label>
                                      {{ Form::text('sorting_order_no','',['class'=>'form-control','id'=>'sorting_order_no','rows'=>1, 'placeholder'=>'Enter Orderby No','maxlength'=>'2','onkeypress'=>'return event.charCode >= 48 && event.charCode <= 57']) }}
                                      <p class="errorDescription text-center alert alert-danger hidden"></p> 
                                </div>
                                <div class="form-group">
                                  <label>Description</label>
                                      {{ Form::textarea('description','',['class'=>'form-control','id'=>'edit_description','rows'=>1, 'placeholder'=>'Enter Description','maxlength'=>'200']) }}
                                      <p class="errorDescription text-center alert alert-danger hidden"></p> 
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
  	$('#btn_fee_account_create').click(function(event) {  		  
  		$.ajaxSetup({
  		          headers: {
  		          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  		          }
  		      });
	     $.ajax({
           url: '{{ route('admin.feeAcount.post') }}',
           type: 'POST',       
           data: $('#form_fee_account').serialize() ,
	    })
  		.done(function(data) {
  			if (data.class === 'error') {                 
  			     $.each(data.errors, function(index, val) {
  			         toastr[data.class](val) 
  			     }); 
  			}
  			  else {                 
  			    toastr[data.class](data.message)  
  			    $("#form_fee_account")[0].reset(); 
  			    $("#fee_account_table").load(location.href + ' #fee_account_table'); 
  			} 
  		})
  		.fail(function() {
  			console.log("error");
  		})
  		.always(function() {
  			console.log("complete");
  		}); 
  	});/////////////////delete///////////////////
  	$('#fee_account_table').on('click', '.btn_delete', function(event) {
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
  		         url: '{{ route('admin.feeAcount.delete') }}',
  		         type: 'delete',
  		         data: {id: id},
  		     })
  		     .done(function(data) {
  		         toastr[data.class](data.message)
  		         $("#fee_account_table").load(location.href + ' #fee_account_table'); 
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
  	 $('#fee_account_table').on('click', '.btn_edit', function(event) {
  	     event.preventDefault();  
  	     $('.modal-title').text('Edit');
         $('#edit_id').val($(this).data('id'));        
         $('#edit_code').val($(this).data('code'));        
         $('#edit_name').val($(this).data('name'));        
         $('#edit_orderby_no').val($(this).data('sorting_order_no'));        
         $('#edit_description').val($(this).data('description'));        
               
         $('#fee_account_model').modal('show');
  	});////////////////update/////////////
 	 $('#fee_account_model').on('click', '.btn_update', function(event) {
 	     event.preventDefault(); 
 	     $.ajaxSetup({
  		          headers: {
  		          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  		          }
  		      });
	     $.ajax({
           url: '{{ route('admin.feeAcount.update') }}',
           type: 'put',       
           data: $('#form_model_fee_account').serialize() ,
	    })
  		.done(function(data) {
  			if (data.class === 'error') {                 
  			     $.each(data.errors, function(index, val) {
  			         toastr[data.class](val) 
  			     }); 
  			}
  			  else {                 
  			    toastr[data.class](data.message)  
  			    $("#form_model_fee_account")[0].reset();
  			    $('#fee_account_model').modal('hide');

  			    $("#fee_account_table").load(location.href + ' #fee_account_table'); 
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
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
 <script type="text/javascript" src="//cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
 <script type="text/javascript">
     $(document).ready(function() {
    $('#fee_account_table').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    } );
} );
     @if(@$sectionType || $errors->first())
     $('#add_section').modal('show'); 
     @endif
 </script>
 <script type="text/javascript" src="//cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/1.5.1/js/dataTables.buttons.min.js"></script>
 <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.flash.min.js"></script>
 <script type="text/javascript" language="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
 <script type="text/javascript" language="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/pdfmake.min.js"></script>
 <script type="text/javascript" language="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/vfs_fonts.js"></script>
 <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.html5.min.js"></script>
 <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.print.min.js"></script>
@endpush