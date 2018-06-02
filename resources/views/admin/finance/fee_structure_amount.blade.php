@extends('admin.layout.base')
@section('body')
<section class="content-header">
    <h1>Fee Structure Amount </h1>
      <ol class="breadcrumb">
      </ol>
</section>
    <section class="content">
        <div class="box">             
            <!-- /.box-header -->
            <div class="box-body">             
                <div class="col-md-12"> 
	                <form class="form-vertical" id="form_fee_structure_amount">
                         <div class="col-lg-2">                           
                             <div class="form-group">
                              {{ Form::label('academic_year_id','Academic Year',['class'=>' control-label']) }}
                               {{ Form::select('academic_year_id',$acardemicYear,null,['class'=>'form-control']) }}
                               <p class="errorAmount1 text-center alert alert-danger hidden"></p>
                             </div>    
                        </div>
                         <div class="col-lg-2">                           
                             <div class="form-group">
                              {{ Form::label('fee_structure_id','Fee Structure',['class'=>' control-label']) }}
                               {{ Form::select('fee_structure_id',$feeStructur,null,['class'=>'form-control']) }}
                               <p class="errorAmount1 text-center alert alert-danger hidden"></p>
                             </div>    
                        </div> 
	                     <div class="col-lg-2">                                             
	                       <div class="form-group">
                           {{ Form::label('amount','Amount',['class'=>'form-label']) }}                          
	                         {{ Form::text('amount','',['class'=>'form-control','id'=>'amount','rows'=>4, 'placeholder'=>'Enter Amount']) }}
	                         <p class="errorName text-center alert alert-danger hidden"></p>
	                       </div>                                         
	                    </div>
                                              
	                     <div class="col-lg-2" style="padding-top: 20px;">                                             
	                     <button class="btn btn-success" type="button" id="btn_fee_structure_amount_create">Create</button> 
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
                    <table id="fee_structure_amount_table" class="display table">                     
                        <thead>
                            <tr>
                                <th>Sn</th>
                                <th>Academic Year</th>
                                <th>Fee Structure</th>
                                <th>Amount</th>
                                                                                           
                                <th>Action</th>                                                            
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($feeStructureAmounts as $feeStructureAmount)
                        	<tr>
                        		<td width="30px">{{ ++$loop->index }}  </td>
                            <td>{{ $feeStructureAmount->academicYears->name }}</td>

                        		<td>{{ $feeStructureAmount->feeStructures->name}}</td>
                                
                                <td>{{ $feeStructureAmount->amount }}</td>
                               
                        	 
                        		<td> 
                        			<button type="button" class="btn_edit btn btn-warning btn-xs" data-toggle="modal" data-id="{{ $feeStructureAmount->id }}"  data-academic="{{ $feeStructureAmount->academic_year_id }}" data-feestructur="{{  $feeStructureAmount->fee_structure_id }}"  data-amount="{{ $feeStructureAmount->amount }}"><i class="fa fa-edit"></i> </button>

                        			<button class="btn_delete btn btn-danger btn-xs"  data-id="{{ $feeStructureAmount->id }}"  ><i class="fa fa-trash"></i></button>
                        		</td>
                        	</tr>  	 
                        @endforeach	
                    {{ $feeStructureAmounts->links()  }}
                                                            
                        </tbody>
                        
                    </table>

                </div>
            </div>    

          <!-- Trigger the modal with a button --> 
          <!--- Model parents      -->     
              <!-- Modal -->
             <div id="fee_structure_amount_model" class="modal fade" role="dialog">
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
                                {{ Form::label('fee_structure_id','Fee Structure',['class'=>' control-label']) }}
                                {{ Form::select('fee_structure_id',$feeStructur,null,['class'=>'form-control','id'=>'edit_fee_structure_id']) }}
                               </div>  
                                <div class="form-group">
                                {{ Form::label('academic_year_id','Academic Year',['class'=>' control-label']) }}
                                {{ Form::select('academic_year_id',$acardemicYear,null,['class'=>'form-control','id'=>'edit_academic_year_id']) }}
                               </div>    
                               <div class="form-group">
                                {{ Form::label('amount','Amount',['class'=>' control-label']) }}                                
                                 {{ Form::text('amount','',['class'=>'form-control','id'=>'edit_amount','rows'=>4, 'placeholder'=>'Enter fee structure amount']) }}
                                 <p class="errorName text-center alert alert-danger hidden"></p>
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
   <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

<meta name="csrf-token" content="{{ csrf_token() }}">
@endpush 
 @push('scripts')
 <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

 <script>
 
    $( ".datepicker" ).datepicker({dateFormat:'dd-mm-yy'});
    
 
 </script>
  <script>
  	$('#btn_fee_structure_amount_create').click(function(event) {  		  
  		$.ajaxSetup({
  		          headers: {
  		          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  		          }
  		      });
	     $.ajax({
           url: '{{ route('admin.feeStructureAmount.post') }}',
           type: 'POST',       
           data: $('#form_fee_structure_amount').serialize() ,
	    })
  		.done(function(data) {
  			if (data.class === 'error') {                 
  			     $.each(data.errors, function(index, val) {
  			         toastr[data.class](val) 
  			     }); 
  			}
  			  else {                 
  			    toastr[data.class](data.message)  
  			    $("#form_fee_structure_amount")[0].reset(); 
  			    $("#fee_structure_amount_table").load(location.href + ' #fee_structure_amount_table'); 
  			} 
  		})
  		.fail(function() {
  			console.log("error");
  		})
  		.always(function() {
  			console.log("complete");
  		}); 
  	});/////////////////delete///////////////////
  	$('#fee_structure_amount_table').on('click', '.btn_delete', function(event) {
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
  		         url: '{{ route('admin.feeStructureAmount.delete') }}',
  		         type: 'delete',
  		         data: {id: id},
  		     })
  		     .done(function(data) {
  		         toastr[data.class](data.message)
  		         $("#fee_structure_amount_table").load(location.href + ' #fee_structure_amount_table'); 
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
  	 $('#fee_structure_amount_table').on('click','.btn_edit', function(event) {      
  	     event.preventDefault();  
  	     $('.modal-title').text('Edit');
               
         $('#edit_id').val($(this).data('id'));         
         $('#edit_amount').val($(this).data('amount'));        
         $('#edit_fee_structure_id').val($(this).data('feestructur'));        
         $('#edit_academic_year_id').val($(this).data('academic'));      
        $ 
         $('#fee_structure_amount_model').modal('show');
  	});////////////////update/////////////
 	 $('#fee_structure_amount_model').on('click', '.btn_update', function(event) {     
 	     event.preventDefault(); 
 	     $.ajaxSetup({
  		          headers: {
  		          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  		          }
  		      });
	     $.ajax({
           url: '{{ route('admin.feeStructureAmount.update') }}',
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
            $("#fee_structure_amount_table").load(location.href + ' #fee_structure_amount_table');
 
  			    $('#fee_structure_amount_model').modal('hide');
  			} 
  		})
  		.fail(function() {
  			console.log("error");
  		})
  		.always(function() {
  			console.log("complete");
  		});  
 	});
     
   $('#fee_structure_id').change(function(event) {       
     $.ajax({
       url: '',
       type: 'GET',
       dataType: 'json',
       data: { id: $(this).val() },
     })
     .done(function(response) {
       console.log("success");
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