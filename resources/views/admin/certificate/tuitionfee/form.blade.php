@extends('admin.layout.base')
@section('body')
<section class="content-header">
    <h1>Student Fee Collection </h1>
      <ol class="breadcrumb">
      </ol>
</section>
    <section class="content">
        <div class="box">             
            <!-- /.box-header -->
            <div class="box-body"> 
                <div class="row">  
                    <div class="col-md-12"> 
                        <form class="form-vertical fee_collection_form"> 
                            <div class="col-lg-2">                           
                                 <div class="form-group">
                                  {{ Form::label('student_id','Registration No',['class'=>' control-label']) }}
                                   {{ Form::select('student_id',$students,null,['class'=>'form-control student_list_select','placeholder'=>"Select Registration",'required',]) }}
                                   <p class="errorAmount1 text-center alert alert-danger hidden"></p>
                                 </div>    
                            </div>                                                             
                           <div class="col-lg-1" style="padding-top: 20px;"> 
                           <button class="btn btn-success" type="button" id="btn_student_registration_show">Show</button>
                          </div>                     
                        </form> 
                      <div class="col-md-1" style="padding-top: 20px;">
                           <button class="btn btn-warning" type="button" id="btn_student_registration_show" data-toggle="modal" data-target="#myModal">Search</button>
                           
                      </div>
                     
                    </div> 

                 </div>  
            </div>
            <!-- /.box-body -->
         </div>
          <!-- /.box -->
          <div class="box">             
              <!-- /.box-header -->
              <div class="box-body">             
                  <div class="col-md-12" id="fee_collection_detail"> 
                     
                  </div>  
                  <div class="col-md-12" id="fee_detail"> 
                     
                  </div>
                  <div class="col-md-12" id="reciept_detail" style="display: none"> 
                     
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
    $('#btn_student_registration_show').click(function(event) {        
      $.ajaxSetup({
                headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
       $.ajax({
           url: '{{ route('admin.student.certificateIssu.tuition.result') }}',
           type: 'get',       
           data: $('.fee_collection_form').serialize() ,
      })
      .done(function(response) {
         $('#fee_collection_detail').html(response);
      })
      .fail(function() {
        console.log("error");
      })
      .always(function() {
        console.log("complete");
      }); 
    }); 
/////////////////////shwo fee detaila//////////////
    // $('#show_fee_btn').click(function(event) {  
      function callAjax(){ 
      $.ajaxSetup({
                headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
       $.ajax({
           url: '{{ route('admin.studentFeeCollection.search') }}',
           type: 'get',       
           data: $('#show_fee_detail_form').serialize() ,
      })
      .done(function(response) {
         $('#fee_detail').html(response);
      })
      .fail(function() {
        console.log("error");
      })
      .always(function() {
        console.log("complete");
      }); 
    }  

    function showHide(){ 

          if ($('#siblig_chk').is(":checked")) {
              $("#siblig_div").show();
              $('.checkbox').prop('checked', $(this).prop("checked")); 
               
          } else {
              $("#siblig_div").hide();
             
          }
          $('.checked_all').on('change', function() {     
                  $('.checkbox').prop('checked', $(this).prop("checked"));              
          }); 
    } 
    function paymentmode(value){
        if(value==1){
            $('#payment_mode_detail').hide(500);
        }else{
            $('#payment_mode_detail').show(500);
        }
       
    }

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

    function studentDetail(studentId){
       $.ajaxSetup({
                 headers: {
                 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                 }
             });
        $.ajax({
            url: '{{ route('admin.studentFeeCollection.show') }}',
            type: 'get',       
            data: {student_id:studentId} ,
       })
       .done(function(response) {
          $('#fee_collection_detail').html(response);
          $("#myModal").modal("hide");
          $("#searchResult" ).empty();
          $("#search_form").trigger( "reset" );

       })
       .fail(function() {
         console.log("error");
       })
       .always(function() {
         console.log("complete");
       });   
    }

    function feeCollectionSubmit(){
        $.ajaxSetup({
                  headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                  }
              });
         $.ajax({
             url: '{{ route('admin.studentFeeCollection.post') }}',
             type: 'post',       
             data: $('#fee_collection_submit_form').serialize() ,
        })
        .done(function(response) {
             $('#reciept_detail').html(response);
             var divContents = $("#reciept_detail").html();
              var printWindow = window.open('', '', 'height=600,width=800');
              printWindow.document.write('<html><head><title>DIV Contents</title>');
              printWindow.document.write('</head><body >');
              printWindow.document.write(divContents);
              printWindow.document.write('</body></html>');
              printWindow.document.close();
              printWindow.print();
        })
        .fail(function() {
          console.log("error");
        })
        .always(function() {
          console.log("complete");
        }); 
    }
    //fee Collection Print
    function feeCollectionPrint(){
        $.ajaxSetup({
                  headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                  }
              });
         $.ajax({
             url: '{{ route('admin.studentFeeCollection.print') }}',
             type: 'post',       
             data: $('#fee_collection_submit_form').serialize() ,
        })
        .done(function(response) {
            
            // window.open('http://www.google.com');
            // window.location.attr(href) = 'http://www.google.com'
            // window.open('http://www.google.com', '_blank');
        })
        .fail(function() {
          console.log("error");
        })
        .always(function() {
          console.log("complete");
        }); 
    }



  </script>
  <script>
    // In your Javascript (external .js resource or <script> tag)
    $(document).ready(function() {
        $('.student_list_select').select2();

    });

  </script>
@endpush