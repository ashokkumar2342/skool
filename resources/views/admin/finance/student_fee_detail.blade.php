@extends('admin.layout.base')
@section('body')
<section class="content-header">
    <h1>Student Fee Details </h1>
    
</section>
    <section class="content">
        <div class="box">             
            <!-- /.box-header -->
            <div class="box-body">             
                <div class="col-md-12"> 
                  <form success-content-id="student_fee_details_table" class="form-vertical add_form" action="{{ route('admin.studentFeeDetail.post') }}" method="post" data-table="student_fee_datatable">
                    {{ csrf_field() }}
                         <div class="col-lg-2">                           
                             <div class="form-group">
                              {{ Form::label('academic_year_id','Academic Year',['class'=>' control-label']) }}
                              <span class="fa fa-asterisk"></span>
                               {{ Form::select('academic_year_id',$acardemicYear,null,['class'=>'form-control','placeholder'=>"Select Academic Year"]) }}
                               <p class="errorAmount1 text-center alert alert-danger hidden"></p>
                             </div>    
                        </div>
                         <div class="col-lg-3">                           
                             <div class="form-group">
                              <label> Class</label>
                               <select name="class_id" id="class_id" class="form-control" onchange="callAjax(this,'{{ route('admin.studentFeeDetail.filter',1) }}','section_student_select_box')">
                                 <option selected disabled>Select Class</option>
                                 <option value="0">All</option>
                                 @foreach ($classess as $classes)
                                   <option value="{{ $classes->id }}">{{ $classes->name }}</option> 
                                 @endforeach 
                               </select>
                             </div>    
                        </div>
                        <div  id="section_student_select_box">
                          
                        </div>
                        <div  id="student_select_box">
                          
                        </div>
                          
                                                                                           
                       <div class="col-lg-1" style="padding-top: 20px;">                                             
                       <button class="btn btn-success" type="submit" >Submit</button> 
                      </div>                     
                  </form> 
                </div> 
                <div class="col-md-12" id="student_fee_details_table">
                  
                </div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
   

           
 
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

 <script> 
    $( ".datepicker").datepicker();   
 
 </script>
  <script>
    $('#student_fee_datatable').DataTable();       
    $('#btn_student_fee_detail_create').click(function(event) {        
      $.ajaxSetup({
                headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
       $.ajax({
           url: '{{ route('admin.studentFeeDetail.post') }}',
           type: 'POST',       
           data: $('#form_student_fee_detail').serialize() ,
      })
      .done(function(data) {
        if (data.class === 'error') {                 
             $.each(data.errors, function(index, val) {
                 toastr[data.class](val) 
             }); 
        }
          else {                 
            toastr[data.class](data.message)  
            $("#form_student_fee_detail")[0].reset(); 
            // $("#student_fee_detail_table").load(location.href + ' #student_fee_detail_table'); 
            $("#student_fee_details_table").html(data.students); 
        } 
      })
      .fail(function() {
        console.log("error");
      })
      .always(function() {
        console.log("complete");
      }); 
    });/////////////////delete///////////////////
    $('#student_fee_detail_table').on('click', '.btn_delete', function(event) {
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
               url: '{{ route('admin.feeStructureLastDate.delete') }}',
               type: 'delete',
               data: {id: id},
           })
           .done(function(data) {
               toastr[data.class](data.message)
               $("#student_fee_detail_table").load(location.href + ' #student_fee_detail_table'); 
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
     $('#student_fee_detail').on('click', '.btn_edit', function(event) {
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
            $("#form_model_student_fee_detail")[0].reset();
            $('#student_fee_detail_model').modal('hide');

            $("#student_fee_detail_table").load(location.href + ' #student_fee_detail_table'); 
        } 
      })
      .fail(function() {
        console.log("error");
      })
      .always(function() {
        console.log("complete");
      });  
  });
 
   $('#academic_year_id').change(function(event) {
     
     event.preventDefault();
   
     $.ajax({
         url: '{{ route('admin.academic.year.search') }}',
         type: 'get', 
         data: {academic_year_id: $('#academic_year_id').val()},
     })
     .done(function(data) {

         $("#from_date").val(data.start_date);
         $("#to_date").val(data.end_date);
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