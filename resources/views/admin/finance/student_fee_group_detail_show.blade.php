@extends('admin.layout.base')
@section('body')
<section class="content-header">
    <h1>Student Fee Group Wise </h1>
      <ol class="breadcrumb">
      </ol>
</section>
    <section class="content">
        {{-- <div class="box">             
            
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
                               {{ Form::select('class_id',$classess,null,['class'=>'form-control','placeholder'=>'Select Class']) }}
                               <p class="errorAmount1 text-center alert alert-danger hidden"></p>
                             </div>    
                        </div>
                        <div class="col-lg-3">                         
                            <div class="form-group">
                                {{ Form::label('section','Section',['class'=>' control-label']) }}
                                {!! Form::select('section',[], null, ['class'=>'form-control','placeholder'=>'Select Section','required']) !!}
                                <p class="text-danger">{{ $errors->first('session') }}</p>
                            </div>
                        </div>
                                                                                         
                       <div class="col-lg-2" style="padding-top: 20px;">                                             
                       <button class="btn btn-success" type="button" id="btn_student_fee_detail_create">Show</button> 
                        
                      </div>                     
                  </form> 
                </div> 
            </div>
            <!-- /.box-body -->
          </div> --}}
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
                                 
                                <th>Old Fee Group</th>                               
                                <th>New Fee Group</th>                                                            
                            </tr>
                        </thead>
                        <tbody id="searchResult">
                          @foreach ($students as $student)  
                          <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $student->name }}</td>
                            <td>{{ $student->registration_no}}</td> 
                            <td>
                              <input type="" name="old_fee_group" value="" class="form-control">
                             {{--  <select name="old_fee_group" class="form-control">
                                @foreach ($feeGroups as $feeGroup)
                                <option value=""></option> 
                                @endforeach
                                 
                              </select> --}}
                            </td>
                            <td>
                              <select name="old_fee_group" class="form-control">
                                @foreach ($feeGroups as $feeGroup)
                                <option value="">{{ $feeGroup->name }}</option> 
                                @endforeach
                                 
                              </select>
                            </td>
                          </tr>
                          @endforeach
                                                            
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
    $("#class_id").change(function(){
        $('#section').html('<option value="">Searching ...</option>');
        $.ajax({
          method: "get",
          url: "{{ route('admin.manageSection.search') }}",
          data: { id: $(this).val() }
        })
        .done(function( response ) {            
            if(response.length>0){
                $('#section').html('<option value="">Select Section</option>');
                for (var i = 0; i < response.length; i++) {
                    $('#section').append('<option value="'+response[i].id+'">'+response[i].name+'</option>');
                } 
            }
            else{
                $('#section').html('<option value="">Not found</option>');
            }            
        });
    });  
 
 </script>
  <script>
    $('#btn_student_fee_detail_create').click(function(event) {        
      $.ajaxSetup({
                headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
       $.ajax({
           url: '{{ route('admin.studentFeeGroupDetail.search') }}',
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