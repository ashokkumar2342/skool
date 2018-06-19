@extends('admin.layout.base')
@section('body')
<section class="content-header">
    <h1>Class Fee Structure </h1>
      <ol class="breadcrumb">
      </ol>
</section>
    <section class="content">
        <div class="box">             
            <!-- /.box-header -->
            <div class="box-body">             
                <div class="col-md-12"> 
	                <form class="form-vertical" id="form_class_fee_structure">
                      
                         <div class="col-lg-2">                           
                             <div class="form-group">
                              {{ Form::label('class_id','Class',['class'=>' control-label']) }}
                               {{ Form::select('class_id',$classess,null,['class'=>'form-control','placeholder'=>'Select Class']) }}
                               <p class="errorAmount1 text-center alert alert-danger hidden"></p>
                             </div>    
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
                    <table id="class_fee_structure_table" class="display table">                     
                        <thead>
                            <tr>
                                <th>Sn</th>
                                 
                                <th>Fee Structure</th>
                                <th>Class</th>
                                <th>Is Applicable</th>                                        
                                <th>Action</th>                                                            
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($classFeeStructures as $classFeeStructure)
                        	<tr>
                        		<td>{{ ++$loop->index }}</td>
                        		<td>{{ $classFeeStructure->feeStructures->name}}</td>
                        		  
                            <td>{{ $classFeeStructure->classess->alias }}</td>
                        		<td><button class="btn_is_applicable btn {{ $classFeeStructure->isapplicable_id == 1 ? 'btn-success':'btn-danger'  }}  btn-xs" data-id="{{ $classFeeStructure->id }}">{{ $classFeeStructure->isapplicable_id == 1 ? 'Yes':'No' }}</button></td>
                        		<td> 
                                    <button class="btn_delete btn btn-danger btn-xs"  data-id="{{ $classFeeStructure->id }}"><i class="fa fa-trash"></i></button>
                                </td>
                        		{{-- 	<button type="button" class="btn_edit btn btn-warning btn-xs" data-toggle="modal" data-id="{{ $classFeeStructure->id }}"  data-code="{{ $classFeeStructure->code }}" data-name="{{ $classFeeStructure->name }}"  data-finescheme="{{ $classFeeStructure->fine_scheme_id }}" data-refundable="{{ $classFeeStructure->is_refundable }}"><i class="fa fa-edit"></i> </button>
                        			<button class="btn_delete btn btn-danger btn-xs"  data-id="{{ $classFeeStructure->id }}"><i class="fa fa-trash"></i></button> --}}
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
             <div id="fee_structure_last_date_model" class="modal fade" role="dialog">
                 <div class="modal-dialog">
                  <!-- Modal content-->
                     <div class="modal-content">
                         <div class="modal-header">
                             <button type="button" class="close" data-dismiss="modal">&times;</button>
                              <h4 class="modal-title"> Update</h4>
                          </div>
                          <div class="modal-body">
                            <form id="form_model_fee_structure"> 
                        	{{-- 	<input type="hidden" name="id" id="edit_id">
                               <div class="form-group">
                                {{ Form::label('code','Code',['class'=>' control-label']) }}
                                 {{ Form::text('code','',['class'=>'form-control','id'=>'edit_code', 'placeholder'=>'Enter fee structure code']) }}
                                 <p class="errorCode text-center alert alert-danger hidden"></p>
                               </div>       
                               <div class="form-group">
                                {{ Form::label('name','Name',['class'=>' control-label']) }}                                
                                 {{ Form::text('name','',['class'=>'form-control','id'=>'edit_name','rows'=>4, 'placeholder'=>'Enter fee structure name']) }}
                                 <p class="errorName text-center alert alert-danger hidden"></p>
                               </div>      
                               <div class="form-group">
                                {{ Form::label('fee_account','Fee Account',['class'=>' control-label']) }}
                                {{ Form::select('fee_account',$feeStructur,null,['class'=>'form-control','id'=>'edit_fee_account']) }}
                               </div>  
                                <div class="form-group">
                                {{ Form::label('fine_scheme','Fine Scheme',['class'=>' control-label']) }}
                                {{ Form::select('fine_scheme',$acardemicYear,null,['class'=>'form-control','id'=>'edit_fine_scheme']) }}
                               </div> 
                               <div class="form-group">
                                {{ Form::label('is_refundable','Is Refundable',['class'=>' control-label']) }}
                                 {{ Form::select('is_refundable',['0'=>'No','1'=>'yes'],null,['class'=>'form-control','id'=>'edit_Is_refundable']) }}
                                 <p class="errorAmount1 text-center alert alert-danger hidden"></p>
                               </div> --}}   
                                                      
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
    $("#class_id").change(function(e){      
        $.ajaxSetup({
                  headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                  }
              });               
        e.preventDefault();
        $('#searchResult').html('Searching ...');
        $.ajax({
          method: "get",
          url: "{{ route('admin.classFeeStructure.saveShow') }}",
          data: $(this).serialize(),
        })
        .done(function(response) {            
            if(response.length>0){
                $('#searchResult').html('');
                for (var i = 0; i < response.length; i++) {
                  $('#searchResult').append(response[i]);
                  
                } 
            }
            else{
                $('#searchResult').html('<tr><td colspan="7"><h4 class="text-danger text-center">Record not found</h4></td></tr>');
            }
            
        })
        .fail(function() {
            console.log("error");
        })
        .always(function() {
            console.log("complete");
        });
        
     }); 
  	$('#btn_class_fee_structure_create').click(function(event) {  		  
  		$.ajaxSetup({
  		          headers: {
  		          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  		          }
  		      });
	     $.ajax({
           url: '{{ route('admin.classFeeStructure.post') }}',
           type: 'POST',       
           data: $('#form_class_fee_structure').serialize() ,
	    })
  		.done(function(data) {
  			if (data.class === 'error') {                 
  			     $.each(data.errors, function(index, val) {
  			         toastr[data.class](val) 
  			     }); 
  			}
  			  else {                 
  			    toastr[data.class](data.message)  
  			    $("#form_class_fee_structure")[0].reset(); 
  			    $("#class_fee_structure_table").load(location.href + ' #class_fee_structure_table'); 
  			} 
  		})
  		.fail(function() {
  			console.log("error");
  		})
  		.always(function() {
  			console.log("complete");
  		}); 
  	});/////////////////isapplicable///////////////////
    $('#class_fee_structure_table').on('click', '.btn_is_applicable', function(event) { 
         event.preventDefault();  
         console.log('test');
         var id = $(this).data("id");
         $.ajaxSetup({
             headers: {
                 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
             }
         });      
         $.ajax({
             url: '{{ route('admin.classFeeStructure.isApplicable') }}',
             type: 'post',
             data: {id: id},
         })
         .done(function(data) {
             toastr[data.class](data.message)
             $("#class_fee_structure_table").load(location.href + ' #class_fee_structure_table'); 
         })
         .fail(function() {
             console.log("error");
         })
         .always(function() {
             console.log("complete");
         });  
    });
    /////////////////delete///////////////////
  	$('#class_fee_structure_table').on('click', '.btn_delete', function(event) {
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
  		         url: '{{ route('admin.classFeeStructure.delete') }}',
  		         type: 'delete',
  		         data: {id: id},
  		     })
  		     .done(function(data) {
  		         toastr[data.class](data.message)
  		         $("#class_fee_structure_table").load(location.href + ' #class_fee_structure_table'); 
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
  	 $('#fee_structure_last_date').on('click', '.btn_edit', function(event) {
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
           url: '{{ route('admin.feeStructureLastDate.update') }}',
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
  			    $("#form_model_fee_structure_last_date")[0].reset();
  			    $('#fee_structure_last_date_model').modal('hide');

  			    $("#fee_structure_last_date_table").load(location.href + ' #fee_structure_last_date_table'); 
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