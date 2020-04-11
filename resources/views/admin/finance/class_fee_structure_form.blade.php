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
                  <div class="pull-right" style="margin-top: 24px">  
                  <button type="button" class="btn btn-warning" onclick="callPopupLarge(this,'{{ route('admin.finance.class.fee.structure.report','fee_structure') }}')">Report</button>
                   </div> 
                </div> 
            </div>
          </div>
          <!-- /.box -->

            <div class="box">             
              <!-- /.box-header -->
                <div class="box-body">
                     <form id="saveClassFeeStructure" action="javascript:;">
                        {{ csrf_field() }}
                         <div class="table-responsive">
                         <table class="table table-bordered table-responsive">
                            <thead>                             
                            <tr> 
                                <th> <input  class="checked_all" type="checkbox" style="display:none"> </th>
                                <th>Fee Structure Name</th>  
                                <th><button type="button" data-click="yes" class="btn btn-success btn-xs"><i class="fa fa-check"></i> Is Applicable</button> </th>
                             <th ><button type="button" data-click="no" class="btn btn-warning btn-xs"><i class="fa fa-check"></i> Is Applicable</button>  </th>  
                            </tr>
                            </thead>
                            <tbody id="searchResult">
                              
                            </tbody>
                           <tfoot>
                             <tr>
                                <td colspan="7">
                                    
                                 <div class="row">                              
                                  <div class="col-md-12 text-center">
                                    <button class="btn btn-success " id="btn_save_classFeeStructure">Save</button>

                                  </div>
                                 </div>  
                                </td>
                            </tr>
                           </tfoot>
                            
                            
                          </tbody>
                      </table>
                    </div>
                    {{ Form::close() }}
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
 <script type="text/javascript">
         $('.checked_all').on('change', function() {     
                 $('.checkbox').prop('checked', $(this).prop("checked"));              
         });
         //deselect "checked all", if one of the listed checkbox product is unchecked amd select "checked all" if all of the listed checkbox product is checked
         $('.checkbox').change(function(){ //".checkbox" change 
             if($('.checkbox:checked').length == $('.checkbox').length){
                    $('.checked_all').prop('checked',true);
             }else{
                    $('.checked_all').prop('checked',false);
             }
         });       
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
          url: "{{ route('admin.classFeeStructure.search') }}",
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
   $('#saveClassFeeStructure').submit(function(e){     
         e.preventDefault();
         $.ajax({
           method: "post",
           url: "{{ route('admin.classFeeStructure.post') }}",
           data: $(this).serialize()+'&class_id='+'&class_id='+$("#class_id").val(),
         })
         .done(function( response ) { 
             toastr.success('Save Succesfully')
         })
         .fail(function() {
            toastr.dange('Something Went Wrong');
        })
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
  <script>
   $( function() {
     
     $('button').click(function(){
         $('#searchResult input:radio:checked').filter(':checked').click(function () {
           $(this).prop('checked', false);
         });
         $('.'+$(this).attr('data-click')).prop('checked', true);
       });
     });
   </script>
@endpush