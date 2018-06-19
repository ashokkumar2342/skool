@extends('admin.layout.base')
@section('body')
<section class="content-header">
    <h1>Student Fee Details </h1>
      <ol class="breadcrumb">
      </ol>
</section>
    <section class="content">
        <div class="box">             
            <!-- /.box-header -->
            <div class="box-body">             
                <div class="col-md-12"> 
                  {{-- <form class="form-vertical" id="form_student_fee_detail" class="form_class"> --}}
                    <form  action="{{ route('admin.studentFeeDetail.post') }}" class="add_form" method="post" autocomplete="off" no-reset="true" >
                      {{ csrf_field() }}
                         <div class="col-lg-2">                           
                             <div class="form-group">
                              {{ Form::label('academic_year_id','Academic Year',['class'=>' control-label']) }}
                               {{ Form::select('academic_year_id',$acardemicYear,null,['class'=>'form-control']) }}
                               <p class="errorAmount1 text-center alert alert-danger hidden"></p>
                             </div>    
                        </div>
                         <div class="col-lg-2">                           
                             <div class="form-group">
                              {{ Form::label('class_id','Class',['class'=>' control-label']) }}
                               {{ Form::select('class_id',$classess,null,['class'=>'form-control']) }}
                               <p class="errorAmount1 text-center alert alert-danger hidden"></p>
                             </div>    
                        </div>
                         <div class="col-lg-2">                           
                             <div class="form-group">
                              {{ Form::label('from_date','From Date',['class'=>' control-label']) }}
                               {{ Form::text('from_date','',['class'=>'form-control datepicker']) }}
                               <p class="from_date text-center alert alert-danger hidden"></p>
                             </div>    
                        </div> 
                         <div class="col-lg-2">                           
                             <div class="form-group">
                              {{ Form::label('to_date','To Date',['class'=>' control-label ']) }}
                               {{ Form::text('to_date','',['class'=>'form-control datepicker']) }}
                               <p class="to_date text-center alert alert-danger hidden"></p>
                             </div>    
                        </div>                                                                     
                       <div class="col-lg-2" style="padding-top: 20px;">                                             
                       {{-- <button class="btn btn-success" type="button" id="btn_student_fee_detail_create">Create</button>  --}}
                       <input type="submit" name="submit" class="btn btn-success mr-10 mb-30" id="submit" value="Update"/>
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
                    <table id="student_fee_detail_table" class="display table">                     
                        <thead>
                            <tr>
                                <th>Sn</th>
                                <th>Student</th>
                                <th>Fee Structure</th>
                                <th>Amount</th>
                                <th>Amount</th>
                                <th>Concession Amount</th>
                                                                                          
                                <th>Action</th>                                                            
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($studentFeeDetails as $studentFeeDetail)
                          <tr>
                            <td width="30px">{{ ++$loop->index }}  </td>
                            <td>{{ $studentFeeDetail->feeStructures->name}}</td>
                            <td>{{ $studentFeeDetail->academicYears->name }}</td>
                                
                                <td>{{ $studentFeeDetail->amount }}</td>
                                <td>{{ Carbon\Carbon::parse($studentFeeDetail->last_date)->format('d-m-Y') }}</td>
                                <td> {{ Carbon\Carbon::parse($studentFeeDetail->last_date)->format(' F ') }} </td>
                            <td> {{ $studentFeeDetail->forSessionMonths->name }} </td>
                            <td> 
                              {{-- <button type="button" class="btn_edit btn btn-warning btn-xs" data-toggle="modal" data-id="{{ $studentFeeDetail->id }}"  data-code="{{ $studentFeeDetail->code }}" data-name="{{ $studentFeeDetail->name }}"  data-finescheme="{{ $studentFeeDetail->fine_scheme_id }}" data-refundable="{{ $studentFeeDetail->is_refundable }}"><i class="fa fa-edit"></i> </button> --}}

                              <button class="btn_delete btn btn-danger btn-xs"  data-id="{{ $studentFeeDetail->id }}"  ><i class="fa fa-trash"></i></button>
                            </td>
                          </tr>    
                        @endforeach 
                                                            
                        </tbody>
                        
                    </table>
                    {{ $studentFeeDetails->links()  }}

                </div>
            </div>    

          {{-- <!-- Trigger the modal with a button --> 
          <!--- Model parents      -->     
              <!-- Modal -->
             <div id="student_fee_detail_model" class="modal fade" role="dialog">
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
                               </div>   
                                                      
                            </form> 
                         </div>
                         <div class="modal-footer">
                             <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                             <button type="button" class="btn_update btn btn-success">Update</button>
                            
                         </div>
                     </div>
                </div>
             </div> --}}
 
    </section>
    <!-- /.content -->
@endsection
@push('links')
<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css"> 
   <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

<meta name="csrf-token" content="{{ csrf_token() }}">
{{-- @endpush 
 @push('scripts')
 <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

 <script> 
    $( ".datepicker").datepicker({dateFormat:'dd-mm-yy'});   
 
 </script>
  <script>
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
            $("#student_fee_detail_table").load(location.href + ' #student_fee_detail_table'); 
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
     
  </script>
@endpush --}}