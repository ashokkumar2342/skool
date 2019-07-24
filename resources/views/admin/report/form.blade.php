@extends('admin.layout.base')
@push('links')
   <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
   <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.5.1/css/buttons.dataTables.min.css">
   <style type="text/css" media="screen">
       #bloodgroup{
        display:none;
       }
        #category{
        display:none;
       } 
        #religion{
        display:none;
       }
         #gender{
        display:none;
       }
        #class{
        display:none;
       }
        #section{
        display:none;
       }
   </style>
@endpush
@section('body')
<section class="content-header">
    <h1> Student Report</h1>

</section>
    <section class="content">        
        {{Form::close()}}
      	<div class="box">        
            <!-- /.box-header -->
            <div class="box-body">
                <div class="row">
                    <div class="col-lg-12 ">                  
                        {{-- {{ Form::open(['route'=>'admin.student.excel.store']) 'method'=>'POST','files'=>'true' }} --}}
                        {{-- {!! Form::open(array('route' => 'admin.student.report.post','method'=>'get')) !!}  --}}
                    <form action="{{ route('admin.student.report.post') }}" data-table-without-pagination="report_dataTable" success-content-id="report_result" method="post" no-reset="true" accept-charset="utf-8" id="report_form" class="add_form">
                            {{ csrf_field() }}
                        <div class="col-md-12">  
                            <div class="col-lg-3">                         
                                <div class="form-group">
                                    {{ Form::label('report_for','Report For',['class'=>' control-label']) }}
                                    {!! Form::select('report_for',[                                               
                                                        7=>'All',
                                                        1=>'Blood Group',
                                                        2=>'Category',
                                                        3=>'Religion',
                                                        4=>'Gender',
                                                        5=>'City',
                                                        6=>'State',
                                                        
                                        ], null, ['class'=>'form-control','placeholder'=>'Select','required']) !!}
                                    <p class="text-danger">{{ $errors->first('report_for') }}</p>
                                </div>
                                 
                            </div>
                            <div class="col-lg-3" id="blood">                         
                                <div class="form-group">  
                                  {{ Form::label('bloodgroup','BloodGroup',['class'=>' control-label']) }}
                                <select name="bloodgroup" id="bloodgroup" class="form-control">
                                        <option value="">Select BloodGroup</option>                                    
                                    @foreach (App\model\BloodGroup::all() as $bloodgroup)
                                        <option value="{{ $bloodgroup->id }}">{{ $bloodgroup->name }}</option>                                  
                                     @endforeach 
                                </select> 
                                </div>
                            </div>
                            <div class="col-lg-3" id="cate" style="display:none">                                                   
                                <div class="form-group">
                                    {{ Form::label('category','Category',['class'=>' control-label']) }}
                                    <select name="category" id="category" class="form-control">
                                        <option value="">Select Category</option>
                                      @foreach (App\model\Category::all() as $category)                                            
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>                                  
                                      @endforeach 
                                    </select>                                    
                                </div>
                            </div> 
                             <div class="col-lg-3" id="rel" style="display:none">                         
                                <div class="form-group">
                                    {{ Form::label('religion','Religion',['class'=>' control-label']) }}
                                    <select name="religion" id="religion" class="form-control">
                                     {{ Form::label('religion','Religion',['class'=>' control-label']) }}
                                     <option selected disabled>Select Religion</option>
                                     @foreach (App\model\Religion::all() as $religion) 
                                           <option value="{{ $religion->id }}">{{ $religion->name }}</option>                                  
                                     @endforeach 
                                 </select> 
                                 </div>
                             </div> 
                             <div class="col-lg-3" id="gen" style="display:none">                         
                                <div class="form-group">
                                    {{ Form::label('gender','Gender',['class'=>' control-label']) }}
                                    <select name="gender" id="gender" class="form-control">
                                     {{ Form::label('gender','gender',['class'=>' control-label']) }}
                                     <option selected disabled>Select Gender</option>
                                     @foreach (App\model\Gender::all() as $gender)                                            
                                           <option value="{{ $gender->id }}">{{ $gender->genders }}</option>                                  
                                     @endforeach 
                                    </select> 
                                 </div>
                             </div>
                            <div class="col-lg-3" id="cit" style="display:none">                         
                                <div class="form-group">
                                     {{ Form::label('city','City',['class'=>' control-label']) }}
                                    <select name="city" id="city" class="form-control">
                                     {{ Form::label('city','city',['class'=>' control-label']) }}
                                      <option selected disabled>Select City</option>
                                     @foreach (App\Student::all() as $student)   
                                           <option value="{{ $student->city }}">{{ $student->city }}</option> 
                                                                            
                                     @endforeach 

                                    </select> 
                                     
                                 </div>
                            </div> 
                            <div class="col-lg-3" id="stat" style="display:none">                         
                                <div class="form-group">
                                     {{ Form::label('state','State',['class'=>' control-label']) }}
                                    <select name="state" id="state" class="form-control">
                                     {{ Form::label('state','state',['class'=>' control-label']) }}
                                      <option selected disabled>Select State</option> 
                                     @foreach (App\Student::all() as $student)
                                                                                
                                           <option value="{{ $student->state }}">{{ $student->state }}</option> 
                                                                            
                                     @endforeach 

                                    </select> 
                                     
                                 </div>
                            </div> 
                            <div class="col-lg-3" id="school_class1">                         
                                <div class="form-group">
                                    {{ Form::label('school_class','All Student/Class',['class'=>' control-label']) }}
                                    {!! Form::select('school_class',[                                               
                                                        1=>'All Student',
                                                        2=>'Class',
                                                        
                                        ], null, ['class'=>'form-control','required']) !!}
                                    <p class="text-danger">{{ $errors->first('school_class') }}</p>
                                </div>
                            </div>                             
                             <div class="col-lg-3" id="cl" style="display:none">                         
                                <div class="form-group">
                                    {{ Form::label('class','Class',['class'=>' control-label']) }}
                                      <select name="class" id="class" class="form-control">
                                            <option value="">Select</option>                                 

                                      @foreach (App\model\ClassType::all() as $class)
                                            <option value="{{ $class->id }}">{{ $class->name }}</option>                                  
                                      @endforeach 
                                    </select>                              
                                </div>
                            </div>
                            <div class="col-lg-3" id="se" style="display:none">                         
                                <div class="form-group">
                                    {{ Form::label('section','Section',['class'=>' control-label']) }}
                                      <select name="section" id="section" class="form-control"> 
                                    </select>
                                   
                                </div>
                            </div> 
                            </div>
                            <div id="bloodgroupcheck" style="">
                            <div class="row">

                                <div class="form-group col-sm-2" id="phone">
                                    <label for="reg_input">Phone Number</label>
                                   <input name="student_phone"value="1" type="checkbox">
                               </div>
                                
                                <div class="form-group col-sm-2" id="email">
                                    <label for="reg_input">Email</label>
                                    <input name="student_email" value="2" type="checkbox">
                                </div> 
                                <div class="form-group col-sm-2" id="email">
                                    <label for="reg_input">Date of Birth</label>
                                    <input name="student_dob" value="3" type="checkbox">
                                </div> 
                                <div class="form-group col-sm-2" id="email">
                                    <label for="reg_input">Gender</label>
                                    <input name="student_gen" value="4" type="checkbox">
                                </div> 
                                <div class="form-group col-sm-2" id="email">
                                    <label for="reg_input">Religion</label>
                                    <input name="student_rel" value="5" type="checkbox">
                                </div> 
                                <div class="form-group col-sm-2" id="email">
                                    <label for="reg_input">Address</label>
                                    <input name="student_add" value="6" type="checkbox">
                                </div>  
                            </div>
                        </div>
                             <div class="col-lg-6" style="padding-top: 20px;">                         
                                <div class="form-group">
                                  <button class="btn btn-success" type="submit">Show</button>
                                    
                                </div>
                            </div>
                        </div>

                        {{ Form::close() }}
                    </div>
                </div>
                <div id="report_result">
                
                </div>
            </div>
            <!-- /.box-body -->
            
        </div>
        <!-- /.box -->

    </section>
    <!-- /.content -->
@endsection
 @push('scripts')
 <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
 <script type="text/javascript">
    $(document).ready(function() {
       $("#blood").hide();
       $("#cate").hide();
        $("#cl").hide();        
        $("#se").hide(); 
    });
    $( ".datepicker" ).datepicker({dateFormat:'dd-mm-yy'});
    $("#class").change(function(){
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
    
    $( "#report_for" ).change(function() { 
        var report = $("#report_for").val();                
         
        switch (report) {
            case '1':
            console.log('1'); 
                $("#blood").show(); 
                $("#cate").hide(); 
                $("#rel").hide(); 
                $("#gen").hide();
                $("#cit").hide();  
                $("#stat").hide();  
                $("#religion").hide(); 
                $("#gender").hide(); 
                $("#bloodgroup").show();              
                $("#category").hide();  
                $("#city").hide();  
                $("#state").hide();  
                break;
            case '2': 
            console.log('2'); 
                 $("#cate").show(); 
                 $("#blood").hide();
                $("#bloodgroup").hide(); 
                $("#rel").hide(); 
                $("#gen").hide();
                $("#cit").hide();  
                $("#stat").hide();  
                $("#religion").hide(); 
                $("#gender").hide(); 
                $("#category").show(); 
                $("#city").hide();
                $("#state").hide(); 
                break;
            case '3':
               $("#cate").hide(); 
                $("#blood").hide();
                $("#bloodgroup").hide();  
                $("#category").show(); 
                $("#rel").show(); 
                $("#gen").hide();
                $("#cit").hide();  
                $("#stat").hide();  
                $("#religion").show(); 
                $("#gender").hide(); 
                $("#city").hide(); 
                $("#state").hide();

                 
                break;
            case '4':
                $("#cate").hide(); 
                 $("#blood").hide();
                 $("#bloodgroup").hide();  
                 $("#category").hide(); 
                 $("#rel").hide(); 
                 $("#gen").show();
                 $("#cit").hide();  
                 $("#stat").hide();  
                 $("#religion").hide(); 
                 $("#gender").show();
                 $("#city").hide(); 
                 $("#state").hide();
                break;
            case '5':
                $("#cate").hide(); 
                 $("#blood").hide();
                 $("#bloodgroup").hide();  
                 $("#category").hide(); 
                 $("#rel").hide(); 
                 $("#gen").hide();
                 $("#cit").show();  
                 $("#stat").hide();  
                 $("#religion").hide(); 
                 $("#cit").show(); 
                 $("#gender").hide();
                 $("#city").show();
                 $("#state").hide();
                break;
            case '6':
                $("#cate").hide(); 
                 $("#blood").hide();
                 $("#bloodgroup").hide();  
                 $("#category").hide(); 
                 $("#rel").hide(); 
                 $("#gen").hide();
                 $("#cit").hide();  
                 $("#stat").show();  
                 $("#religion").hide(); 
                 $("#gender").hide();
                 $("#city").hide(); 
                 $("#state").show();
                break;
            case '7':
                $("#cate").hide(); 
                 $("#blood").hide();
                 $("#bloodgroup").hide();  
                 $("#category").hide(); 
                 $("#rel").hide(); 
                 $("#gen").hide();
                 $("#cit").hide();  
                 $("#stat").hide();  
                 $("#religion").hide(); 
                 $("#gender").hide();
                 $("#city").hide();
                 $("#state").hide();
        }    
       // if($("#report_for").val() == 1){
       //   $("#blood").show(); 
       //   $("#cate").remove();
       // }
       // else if($("#report_for").val() == 2){
       //  $("#blood").remove();
       //  $("#cate").show(); 
       // }
         
    });
    $( "#report_form" ).on( "click", "#school_class", function() { 
       if($("#school_class").val() == 1){                  
        $("#cl").hide('slow');        
        $("#se").hide('slow');
        $("#class").hide('slow');        
        $("#section").hide('slow');
       }
       else if($("#school_class").val() == 2){   

        $("#cl").show('slow');        
        $("#se").show('slow');
         $("#class").show('slow');        
        $("#section").show('slow');  
       }
       else{ 
       } 
    });
</script>
<script type="text/javascript" src="//cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/1.5.1/js/dataTables.buttons.min.js"></script>
 <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.flash.min.js"></script>
 <script type="text/javascript" language="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
 <script type="text/javascript" language="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/pdfmake.min.js"></script>
 <script type="text/javascript" language="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/vfs_fonts.js"></script>
 <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.html5.min.js"></script>
 <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.print.min.js"></script>

@endpush