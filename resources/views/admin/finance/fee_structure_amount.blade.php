@extends('admin.layout.base')
@section('body')
<section class="content-header">
    <h1>Fee Structure Amount </h1>
     
</section>
    <section class="content">
        <div class="box"> 
            <div class="box-body">
            <form action="{{ route('admin.feeStructureAmount.post') }}" method="post" class="add_form" accept-charset="utf-8" select-triger="academic_year_select_box" no-reset="true">
            {{ csrf_field() }} 
                <div class="row">  
                         <div class="col-lg-12">                           
                             <div class="form-group">
                              <label>Academic Year</label>
                              <select name="academic_year_id" id="academic_year_select_box" class="form-control" onchange="callAjax(this,'{{ route('admin.feeStructureAmount.onchange') }}','fee_structure_amount_table_page')">
                                <option selected disabled>Select Academic Year</option>
                                @foreach ($acardemicYears as $acardemicYear)
                                      <option value="{{ $acardemicYear->id }}">{{ $acardemicYear->name }}</option> 
                                @endforeach
                              </select> 
                             </div>    
                        </div> 
                      </div>
                      <div class="col-lg-12" id="fee_structure_amount_table_page">
                          
                        </div>
                    </form>    
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
  <script type="text/javascript" src="//cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
 <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

 <script>
 $(window).load(function(){
   $('#academic_year_select_box').val('{{ $acardemicYearsSet->id }}').trigger('change');
});    

// <select>
//   <option value=''>Select an option...</option>
//   <option value=1>Option 1</option>
//   <option value=2 >Option 2</option>
//   <option value=3>Option 3</option>
//   <option id="lop"  onclick="myFunction()" value=4>Option 4</option>
// </select>
    $( "#fee_structure_amount_table" ).DataTable();
    $( ".datepicker" ).datepicker({dateFormat:'dd-mm-yy'});
    
 
 </script>
  {{-- <script>
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
  </script> --}}
@endpush