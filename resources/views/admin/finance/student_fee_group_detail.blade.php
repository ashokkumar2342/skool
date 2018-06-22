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
                  <form class="form-vertical" id="form_student_fee_group_detail" class="form_class"> 
                      {{ csrf_field() }}
                         <div class="col-lg-2">                           
                             <div class="form-group">
                              {{ Form::label('academic_year_id','Academic Year',['class'=>' control-label']) }}
                               {{ Form::select('academic_year_id',$academicYear,null,['class'=>'form-control']) }}
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
                                                                                         
                       <div class="col-lg-2" style="padding-top: 20px;">                                             
                       <button class="btn btn-success" type="button" id="btn_student_fee_detail_create">Show</button> 
                       {{-- <input type="submit" name="submit" class="btn btn-success mr-10 mb-30" id="submit" value="Update"/> --}}
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
                                <th>Student Name</th>
                                <th>Registration No</th>
                                 
                                <th>Concession Amount</th>                               
                                <th>Action</th>                                                            
                            </tr>
                        </thead>
                        <tbody id="searchResult">
                         
                                                            
                        </tbody>
                        
                    </table>
                   

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
           url: '{{ route('admin.studentFeeGroupDetail.post') }}',
           type: 'POST',       
           data: $('#form_student_fee_group_detail').serialize() ,
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
        // if (response.class === 'error') {                 
        //      $.each(response.errors, function(index, val) {
        //          toastr[response.class](val) 
        //      }); 
        // }
        //   else {                 
        //     toastr[response.class](response.message)  
            
        // } 
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