@extends('admin.layout.base')
@push('links')
   <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
@endpush
@section('body')
<section class="content-header">
    <h1> Student Edit <small>Details</small> </h1>
       @includeIf('admin.include.hot_menu', ['menu_type_id' => 3])
       
</section>
    <section class="content">        
        {{Form::close()}}
        <div class="box">        
            <!-- /.box-header -->
            <div class="box-body">
                <div class="row">
                    <div class="col-lg-12 ">                 
                       
                    
                        <form action="{{ route('admin.student.update',$student->id) }}" method="post" accept-charset="utf-8" class="add_form" redirect-to="{{ route('admin.student.view',$student->id) }}"> 
                            {{ csrf_field() }}

                             <div class="row">{{--row start --}}
                                <div class="col-md-12 ">
                                    <div class="form-group">
                                        <div class="col-md-12">                                          
                                             <div class="col-lg-3">                         
                                                <div class="form-group">
                                                    {{ Form::label('class','Class',['class'=>' control-label']) }}
                                                    {!! Form::select('class',$classes, $student->classes->id, ['class'=>'form-control','placeholder'=>'Select Class','required']) !!}
                                                    <p class="text-danger">{{ $errors->first('session') }}</p>
                                                </div>
                                            </div>
                                                <div class="col-lg-3">                         
                                                <div class="form-group">
                                                    {{ Form::label('section','Section',['class'=>' control-label']) }}
                                                    {!! Form::select('section',[], null, ['class'=>'form-control','placeholder'=>'Select Section','required']) !!}
                                                    <p class="text-danger">{{ $errors->first('session') }}</p>
                                                </div>
                                            </div>
                                             <div class="col-lg-3">                         
                                                <div class="form-group">
                                                    {{ Form::label('registration_no','Registration no',['class'=>' control-label ']) }}                         
                                                    {{ Form::text('registration_no', $student->registration_no ,['class'=>'form-control',' required','disabled']) }}
                                                    <p class="text-danger">{{ $errors->first('registration_no') }}</p>
                                                </div>
                                            </div>
                                             <div class="col-lg-3">                         
                                                <div class="form-group">
                                                    {{ Form::label('admission_no','Admission No',['class'=>' control-label']) }}
                                                    {{ Form::text('admission_no',$student->admission_no,['class'=>'form-control',' required','disabled']) }}
                                                    <p class="text-danger">{{ $errors->first('admission_no') }}</p>
                                                </div>
                                            </div>
                                             <div class="col-lg-3">                         
                                                <div class="form-group">
                                                    {{ Form::label('roll_no','Roll No',['class'=>' control-label']) }}
                                                    {{ Form::text('roll_no', $student->roll_no,['class'=>'form-control',' required']) }}
                                                    <p class="text-danger">{{ $errors->first('roll_no') }}</p>
                                                </div>
                                            </div> 
                                            <div class="col-lg-3">                         
                                                <div class="form-group">
                                                    {{ Form::label('date_of_admission','Date of Admission',['class'=>' control-label']) }}   
                                                    <div class="input-group">
                                                      <div class="input-group-addon">
                                                        <i class="fa fa-calendar"></i>
                                                      </div>                          
                                                    {{ Form::text('date_of_admission',$student->date_of_admission ,array('class' => 'form-control datepicker',' required' )) }}
                                                    </div>
                                                    <p class="text-danger">{{ $errors->first('date_of_admission') }}</p>
                                                </div>
                                            </div>
                                          
                                            <div class="col-lg-6">                         
                                                <div class="form-group">
                                                    {{ Form::label('date_of_activation','Date of Activation',['class'=>' control-label']) }}   
                                                    <div class="input-group">
                                                      <div class="input-group-addon">
                                                        <i class="fa fa-calendar"></i>
                                                      </div>                          
                                                    {{ Form::text('date_of_activation',$student->date_of_activation,array('class' => 'form-control datepicker',' required' )) }}
                                                    </div>
                                                    <p class="text-danger">{{ $errors->first('date_of_activation') }}</p>
                                                </div>
                                            </div>
                                             
                                        </div>
                                    </div>
                                </div>
                             </div> {{--row end --}}
                             <div class="row">{{--row start --}}
                                <div class="col-md-12 ">
                                    <div class="form-group">
                                        <div class="col-md-12">
                                             <div class="col-lg-3">                         
                                                <div class="form-group">
                                                    {{ Form::label('student_name','Student Name',['class'=>' control-label']) }}                         
                                                    {{ Form::text('student_name',$student->name,['class'=>'form-control',' required','maxlength'=>'50']) }}
                                                    <p class="text-danger">{{ $errors->first('student_name') }}</p>
                                                </div>
                                            </div>  
                                             <div class="col-lg-3">                         
                                                <div class="form-group">
                                                    {{ Form::label('nick_name','Nick Name',['class'=>' control-label']) }}                         
                                                    {{ Form::text('nick_name',$student->nick_name,['class'=>'form-control','maxlength'=>'50']) }}
                                                    <p class="text-danger">{{ $errors->first('nick_name') }}</p>
                                                </div>
                                            </div>
                                              
                                             <div class="col-lg-3">                         
                                                <div class="form-group">
                                                    {{ Form::label('email','Email Id',['class'=>' control-label']) }}
                                                    {{ Form::email('email',$student->email,['class'=>'form-control']) }}
                                                    <p class="text-danger">{{ $errors->first('email') }}</p>
                                                </div>
                                            </div>  
                                             <div class="col-lg-3">                         
                                                <div class="form-group">
                                                    {{ Form::label('date_of_birth','Date of Birth',['class'=>' control-label']) }}      
                                                    <div class="input-group">
                                                      <div class="input-group-addon">
                                                        <i class="fa fa-calendar"></i>
                                                      </div>                   
                                                        {{ Form::text('date_of_birth',$student->dob,['class'=>'form-control datepicker','required']) }}
                                                    </div>
                                                   
                                                    <p class="text-danger">{{ $errors->first('date_of_birth') }}</p>
                                                </div>
                                            </div> 
                                              <div class="col-lg-4">                         
                                                <div class="form-group">
                                                    {{ Form::label('gender','Gender',['class'=>' control-label']) }}
                                                    {!! Form::select('gender',$genders, $student->genders->id, ['class'=>'form-control','placeholder'=>'Select Gender','required']) !!}
                                                    <p class="text-danger">{{ $errors->first('gender') }}</p>
                                                </div>
                                            </div>
                                             <div class="col-lg-4">                         
                                                <div class="form-group">
                                                    <label>Aadhaar No</label>
                                                    <span class="fa fa-asterisk"></span>
                                                    <input type="text" name="aadhaar_no" class="form-control" value="{{ $student->adhar_no }}">
                                                </div>
                                            </div>
                                            <div class="col-lg-4">                         
                                                <div class="form-group">
                                                    <label>House Name</label>
                                                    <span class="fa fa-asterisk"></span>
                                                    <select name="house_name" class="form-control">
                                                        <option selected disabled>Select House</option>
                                                        @foreach ($houses as $house)
                                                          <option value="{{ $house->id }}"{{ $house->id==$student->house_no?'selected' : '' }}>{{ $house->name }}</option> 
                                                        @endforeach 
                                                    </select>
                                                  
                                                </div>
                                            </div>       
                                             
                                              
                                        </div>
                                    </div>
                                </div>
                            </div>{{--row end --}}   
                            
                             <div class="row">{{--row start --}}
                                <div class="col-md-12 ">
                                    <div class="form-group">
                                        <div class="col-md-12">
                                             
                                            
                                        </div>
                                    </div>
                                </div>
                            </div> {{--row end --}}               
                             
                        
                             <div class="row">
                        <div class="col-md-12 text-center">
                            <button class="btn btn-success">Submit</button>
                        </div>
                    </div>
                            
                        {{ Form::close() }}
                    </div>
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
    
</script>
 <script type="text/javascript">
    $( ".datepicker" ).datepicker({dateFormat:'dd-mm-yy'});
     
    $("#class").change(function(){
        sectionSearch($(this).val());
    });
     
   
    if ($("#class").val() > 0) {
        sectionSearch($("#class").val(),{{ $student->section_id }}); 
    }
    
     
    function sectionSearch (value,selectVal=null){
        var selected = null;
        $('#section').html('<option value="">Searching ...</option>'); 
      
        $.ajax({
          method: "get",
          url: "{{ route('admin.manageSection.search2') }}",
          data: { id: value }
        })
        .done(function(response ) {            
             if(response.section.length>0){
                $('#section').html('<option value="">Select section</option>');
               for (var i = 0; i < response.section.length; i++) {
                    if(selectVal>0){
                        selected = (selectVal==response.section[i].id)?'selected':''; 
                    }
                    $('#section').append('<option value="'+response.section[i].id+'"'+selected+'>'+response.section[i].name+'</option>'); 
                }
            }
            else{
                $('#section').html('<option value="">Not found</option>');
            } 
                   
        });
    }
 
    
     
</script>
 

@endpush

 