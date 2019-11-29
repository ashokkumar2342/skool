@extends('admin.layout.base')
@section('body')
<section class="content-header">
    <h1>Student Fee Assign  </h1>
      
</section>
    <section class="content">
        <div class="box">             
            <!-- /.box-header -->
            <div class="box-body">             
                <div class="col-md-12"> 
                  <form class="form-vertical add_form" success-content-id="student_fee_assign_show" no-reset="true" action="{{ route('admin.studentFeeAssign.show',App\Helper\MyFuncs::menuPermission()->id) }}" method="post">
                    {{ csrf_field() }}
                         <div class="col-lg-2">                           
                             <div class="form-group">
                              {{ Form::label('academic_year_id','Academic Year',['class'=>' control-label']) }}
                               {{ Form::select('academic_year_id',$acardemicYear,null,['class'=>'form-control','required']) }}
                               <p class="errorAmount1 text-center alert alert-danger hidden"></p>
                             </div>    
                        </div>
                       {{--   <div class="col-lg-2">                           
                             <div class="form-group">
                              {{ Form::label('class_id','Class',['class'=>' control-label']) }}
                               {{ Form::select('class_id',$classess,null,['class'=>'form-control','placeholder'=>"Select Class"]) }}
                               <p class="errorAmount1 text-center alert alert-danger hidden"></p>
                             </div>    
                        </div> --}}
                        <div class="col-lg-2">                           
                             <div class="form-group">
                              {{ Form::label('student_id','Registration No',['class'=>' control-label']) }}
                               {{ Form::select('student_id',$students,null,['class'=>'form-control student_list_select','placeholder'=>"Select Registration",'required']) }}
                               <p class="errorAmount1 text-center alert alert-danger hidden"></p>
                             </div>    
                        </div>                                                             
                       <div class="col-lg-2" style="padding-top: 20px;">
                       <input type="submit" class="btn btn-success" id="btn_student_fee_assign_show"  value="Show" style="width: 130px">                                             
                       {{-- <button class="btn btn-success" type="button" id="btn_student_fee_detail_create">Show</button>  --}}
                      </div>                     
                  </form> 
                  <br>
                   <button class="btn btn-success" type="button" id="btn_student_registration_show" data-toggle="modal" data-target="#myModal" style="width: 130px">Search</button>
                </div> 
                <div id="student_fee_assign_show">
                  
                </div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

          
          <!-- Modal -->
          <div id="myModal" class="modal fade" role="dialog">
            <div class="modal-dialog"> 
              <!-- Modal content-->
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h4 class="modal-title">Student Search</h4>
                </div>
                <div class="modal-body">
                  <form class="form-vertical" id="search_form"> 
                    <div class="input-group">
                      <div class="input-group-addon">  
                        <i class="fa fa-search"></i>
                      </div>
                       <input type="text" class="form-control" onkeyup="studentSearch()" name="search" id="search">
                       {{ csrf_field() }} 
                    </div>    
                  </form>
                </div>
                <div class="modal-footer" >
                  <table id="student_search_table"  class="display table"> 
                      <thead>
                          <tr>
                              <th>Sn</th>
                              <th>Name</th>
                              <th>Registration No</th> 
                              <th>Father's Name</th>                               
                              <th>Mother's Name</th>      
                              <th>Action</th>                                                            
                          </tr>
                      </thead>
                      <tbody id="searchResult">
                                                         
                      </tbody>
                      
                  </table>
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
   {{-- <link rel="stylesheet" href="{{ asset('admin_asset/plugins/select2/select2.min.css') }}"> --}}
 <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />


<meta name="csrf-token" content="{{ csrf_token() }}">
@endpush 
 @push('scripts')
 <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
 {{-- <script src="{{ asset('admin_asset/plugins/select2/select2.full.min.js') }}"></script> --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>

 <script> 
    $( ".datepicker").datepicker();   
 
 </script>
  <script>
    function studentSearch(){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $('#searchResult').show()
        var search = $('#search').val();
         
        $.ajax({
            url: '{{ route('admin.student.search') }}',
            type: 'post',
           
            data: {'search':search},
        })
        .done(function(response) {
             $('#searchResult').html(response); 
        })
        .fail(function() {
            console.log("error");
        })
        .always(function() {
            console.log("complete");
        });
    }

    // function studentDetail(studentId){
    //    $.ajaxSetup({
    //              headers: {
    //              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    //              }
    //          });
    //     $.ajax({
    //         url: '',
    //         type: 'post',       
    //         data: {student_id:studentId,academic_year_id:$('#academic_year_id').val()} ,
    //    })
    //    .done(function(response) {

    //       $('#student_fee_assign_show').html(response.data);
    //       $("#myModal").modal("hide");
        
    //    })
    //    .fail(function() {
    //      console.log("error");
    //    })
    //    .always(function() {
    //      console.log("complete");
    //    });   
    // }

    $('#btn_student_fee_detail_create').click(function(event) {        
      $.ajaxSetup({
                headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
       $.ajax({
           url: '{{ route('admin.studentFeeAssign.post') }}',
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
  <script>
    // In your Javascript (external .js resource or <script> tag)
    $(document).ready(function() {
        $('.student_list_select').select2();
    });
  </script>
@endpush