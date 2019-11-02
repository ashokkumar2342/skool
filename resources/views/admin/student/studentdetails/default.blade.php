@extends('admin.layout.base')
@push('links')
   <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
@endpush
@section('body')
<section class="content-header">
    <h1> Student Default <small>Value</small> </h1>
       @includeIf('admin.include.hot_menu', ['menu_type_id' => 3])
       </section>
    <section class="content">        
        {{Form::close()}}
      	<div class="box">        
            <!-- /.box-header -->
            <div class="box-body">
                <div class="row">
                    <div class="col-lg-12 ">                  
                        {{ Form::open(['route'=>'admin.defaultValue.post']) }}                            
                             <div class="row">{{--row start --}}
                                <div class="col-md-12 ">
                                    <div class="form-group">
                                        <div class="col-md-12">                                          
                                             <div class="col-lg-2">                         
                                                <div class="form-group">
                                                    {{ Form::label('academic_year','Academic Year',['class'=>' control-label']) }}
                                                    {!! Form::select('academic_year',$academicYears, @$default->academicYears->id, ['class'=>'form-control','placeholder'=>'Select Academic Year']) !!}
                                                    <p class="text-danger">{{ $errors->first('Academic Year') }}</p>
                                                </div>
                                            </div>
                                            <div class="col-lg-2">                         
                                                <div class="form-group">
                                                    {{ Form::label('class','Class',['class'=>' control-label']) }}
                                                    {!! Form::select('class',$classes, @$default->class_id, ['class'=>'form-control','placeholder'=>'Select Class']) !!}
                                                    <p class="text-danger">{{ $errors->first('Class') }}</p>
                                                </div>
                                            </div>
                                                <div class="col-lg-2">                         
                                                <div class="form-group">
                                                    {{ Form::label('section','Section',['class'=>' control-label']) }}
                                                    {!! Form::select('section',[], null, ['class'=>'form-control','placeholder'=>'Select Section']) !!}
                                                    <p class="text-danger">{{ $errors->first('Section') }}</p>
                                                </div>
                                            </div>
                                            <div class="col-lg-2">                         
                                                <div class="form-group">
                                                    {{ Form::label('religion','Religion',['class'=>' control-label']) }}
                                                    {!! Form::select('religion',$religions, @$default->religions->id, ['class'=>'form-control','placeholder'=>'Select Religion']) !!}
                                                    <p class="text-danger">{{ $errors->first('religion') }}</p>
                                                </div>
                                            </div>
                                            <div class="col-lg-2">                         
                                                <div class="form-group">
                                                    {{ Form::label('category','Category',['class'=>' control-label']) }}
                                                    {!! Form::select('category',$categories,@$default->categories->id, ['class'=>'form-control','placeholder'=>'Select Category']) !!}
                                                    <p class="text-danger">{{ $errors->first('category') }}</p>
                                                </div>
                                            </div>
                                             <div class="col-lg-2">                         
                                                <div class="form-group">
                                                    {{ Form::label('state','State',['class'=>' control-label']) }}
                                                    {!! Form::text('state', @$default->state, ['class'=>'form-control']) !!}
                                                    <p class="text-danger">{{ $errors->first('state') }}</p>
                                                </div>
                                            </div>
                                              <div class="col-lg-2">                         
                                                <div class="form-group">
                                                    {{ Form::label('city','City',['class'=>' control-label']) }}
                                                    {!! Form::text('city', @$default->city, ['class'=>'form-control']) !!}
                                                    <p class="text-danger">{{ $errors->first('city') }}</p>
                                                </div>
                                            </div>
                                            <div class="col-lg-2">                         
                                                <div class="form-group">
                                                    {{ Form::label('pincode','Pincode',['class'=>' control-label']) }}                         
                                                    {{ Form::text('pincode',@$default->pincode,array('class' => 'form-control' )) }}
                                                    <p class="text-danger">{{ $errors->first('pincode') }}</p>
                                                </div>
                                            </div>
                                            @php
                                                $SMSarrayId=1;    
                                              @endphp  
                                            <div class="col-lg-2">                         
                                                <div class="form-group">
                                                    <label>SMS Template Birthday</label>
                                                     <select name="birthday_message_id" class="form-control">
                                                          <option selected disabled>Select Option</option>
                                                          @foreach ($smsbirthdayTemplates as $smsTemplate)
                                                             <option value="{{ $smsTemplate->id }}"{{$default->birthday_message_id==$smsTemplate->id? 'selected' : ''  }}>{{ $SMSarrayId++ }} Template</option> 
                                                          @endforeach 
                                                      </select> 
                                                </div>
                                            </div>
                                             @php
                                                $EmailarrayId=1;    
                                              @endphp
                                            <div class="col-lg-2">                         
                                                <div class="form-group">
                                                    <label>Email Template Birthday</label>
                                                     <select name="birthday_email_id" class="form-control">
                                                          <option selected disabled>Select Option</option>
                                                          @foreach ($emailbirthdayTemplates as $smsTemplate)
                                                             <option value="{{ $smsTemplate->id }}"{{$default->birthday_email_id==$smsTemplate->id? 'selected' : ''  }}>{{ $EmailarrayId++ }} Template</option> 
                                                          @endforeach 
                                                      </select> 
                                                </div>
                                            </div>
                                            @php
                                                $homeworkId=1;    
                                              @endphp    
                                            <div class="col-lg-2">                         
                                                <div class="form-group">
                                                    <label>SMS Template Homework</label>
                                                     <select name="homework_message_id" class="form-control">
                                                          <option selected disabled>Select Option</option>
                                                          @foreach ($smshomeworkTemplates as $smsTemplate)
                                                             <option value="{{ $smsTemplate->id }}"{{$default->homework_message_id==$smsTemplate->id? 'selected' : ''  }}>{{ $homeworkId++ }} Template</option> 
                                                          @endforeach 
                                                      </select> 
                                                </div>
                                            </div>   
                                            @php
                                                $emailhomeworkId=1;    
                                              @endphp    
                                            <div class="col-lg-2">                         
                                                <div class="form-group">
                                                    <label>Email Template Homework</label>
                                                     <select name="homework_email_id" class="form-control">
                                                          <option selected disabled>Select Option</option>
                                                          @foreach ($emailhomeworkTemplates as $smsTemplate)
                                                             <option value="{{ $smsTemplate->id }}"{{$default->homework_email_id==$smsTemplate->id? 'selected' : ''  }}>{{ $emailhomeworkId++ }} Template</option> 
                                                          @endforeach 
                                                      </select> 
                                                </div>
                                            </div>  
                                            @php
                                                $smsclassId=1;    
                                              @endphp    
                                            <div class="col-lg-2">                         
                                                <div class="form-group">
                                                    <label>SMS Template Class Test</label>
                                                     <select name="classTest_message_id" class="form-control">
                                                          <option selected disabled>Select Option</option>
                                                          @foreach ($smsclasstestTemplates as $smsTemplate)
                                                             <option value="{{ $smsTemplate->id }}"{{$default->classTest_message_id==$smsTemplate->id? 'selected' : ''  }}>{{ $smsclassId++ }} Template</option> 
                                                          @endforeach 
                                                      </select> 
                                                </div>
                                            </div>  
                                            @php
                                                $emailclassId=1;    
                                              @endphp    
                                            <div class="col-lg-2">                         
                                                <div class="form-group">
                                                    <label>Email Template Class Test</label>
                                                     <select name="classTest_email_id" class="form-control">
                                                          <option selected disabled>Select Option</option>
                                                          @foreach ($emailclasstestTemplates as $smsTemplate)
                                                             <option value="{{ $smsTemplate->id }}"{{$default->classTest_email_id==$smsTemplate->id? 'selected' : ''  }}>{{ $emailclassId++ }} Template</option> 
                                                          @endforeach 
                                                      </select> 
                                                </div>
                                            </div>  
                                            @php
                                                $smsclassDetilsId=1;    
                                              @endphp    
                                            <div class="col-lg-2">                         
                                                <div class="form-group">
                                                    <label>SMS  Class Test Details</label>
                                                     <select name="class_test_details_message_id" class="form-control">
                                                          <option selected disabled>Select Option</option>
                                                          @foreach ($smsclasstestDetailsTemplates as $smsTemplate)
                                                             <option value="{{ $smsTemplate->id }}"{{$default->class_test_details_message_id==$smsTemplate->id? 'selected' : ''  }}>{{ $smsclassDetilsId++ }} Template</option> 
                                                          @endforeach 
                                                      </select> 
                                                </div>
                                            </div>  
                                            @php
                                                $emailclassDetilsId=1;    
                                              @endphp    
                                            <div class="col-lg-2">                         
                                                <div class="form-group">
                                                    <label>Email  Class Test Details</label>
                                                     <select name="class_test_details_email_id" class="form-control">
                                                          <option selected disabled>Select Option</option>
                                                          @foreach ($emailclasstestDetailsTemplates as $smsTemplate)
                                                             <option value="{{ $smsTemplate->id }}"{{$default->class_test_details_email_id==$smsTemplate->id? 'selected' : ''  }}>{{ $emailclassDetilsId++ }} Template</option> 
                                                          @endforeach 
                                                      </select> 
                                                </div>
                                            </div>  
                                            @php
                                                $smsTimeId=1;    
                                              @endphp    
                                            <div class="col-lg-2">                         
                                                <div class="form-group">
                                                    <label>SMS Template Time Table</label>
                                                     <select name="timetable_message_id" class="form-control">
                                                          <option selected disabled>Select Option</option>
                                                          @foreach ($smsTimetableTemplates as $smsTemplate)
                                                             <option value="{{ $smsTemplate->id }}"{{$default->timetable_message_id==$smsTemplate->id? 'selected' : ''  }}>{{ $smsTimeId++ }} Template</option> 
                                                          @endforeach 
                                                      </select> 
                                                </div>
                                            </div>  
                                            @php
                                                $emailTimeId=1;    
                                              @endphp    
                                            <div class="col-lg-2">                         
                                                <div class="form-group">
                                                    <label>Email Template Time Table</label>
                                                     <select name="timetable_email_id" class="form-control">
                                                          <option selected disabled>Select Option</option>
                                                          @foreach ($smsTimetableTemplates as $smsTemplate)
                                                             <option value="{{ $smsTemplate->id }}"{{$default->timetable_email_id==$smsTemplate->id? 'selected' : ''  }}>{{ $emailTimeId++ }} Template</option> 
                                                          @endforeach 
                                                      </select> 
                                                </div>
                                            </div>  
                                            @php
                                                $medicalSMS=1;    
                                              @endphp    
                                            <div class="col-lg-2">                         
                                                <div class="form-group">
                                                    <label>SMS Template Medical</label>
                                                     <select name="medical_message_id" class="form-control">
                                                          <option selected disabled>Select Option</option>
                                                          @foreach ($smsMedicalTemplates as $smsTemplate)
                                                             <option value="{{ $smsTemplate->id }}"{{$default->medical_message_id==$smsTemplate->id? 'selected' : ''  }}>{{ $medicalSMS++ }} Template</option> 
                                                          @endforeach 
                                                      </select> 
                                                </div>
                                            </div>  
                                            @php
                                                $medicalEmail=1;    
                                              @endphp    
                                            <div class="col-lg-2">                         
                                                <div class="form-group">
                                                    <label>Email Template Medical</label>
                                                     <select name="medical_email_id" class="form-control">
                                                          <option selected disabled>Select Option</option>
                                                          @foreach ($emailMedicalTemplates as $smsTemplate)
                                                             <option value="{{ $smsTemplate->id }}"{{$default->medical_email_id==$smsTemplate->id? 'selected' : ''  }}>{{ $medicalEmail++ }} Template</option> 
                                                          @endforeach 
                                                      </select> 
                                                </div>
                                            </div>
                                            @php
                                                $absentSMS=1;    
                                              @endphp    
                                            <div class="col-lg-2">                         
                                                <div class="form-group">
                                                    <label>SMS Absent Student</label>
                                                     <select name="absent_student_message_id" class="form-control">
                                                          <option selected disabled>Select Option</option>
                                                          @foreach ($smsabsentTemplates as $smsTemplate)
                                                             <option value="{{ $smsTemplate->id }}"{{$default->absent_student_message_id==$smsTemplate->id? 'selected' : ''  }}>{{ $absentSMS++ }} Template</option> 
                                                          @endforeach 
                                                      </select> 
                                                </div>
                                            </div>  
                                            @php
                                                $absentEmail=1;    
                                              @endphp    
                                            <div class="col-lg-2">                         
                                                <div class="form-group">
                                                    <label>Email Absent Student</label>
                                                     <select name="absent_student_email_id" class="form-control">
                                                          <option selected disabled>Select Option</option>
                                                          @foreach ($emailabsentTemplates as $smsTemplate)
                                                             <option value="{{ $smsTemplate->id }}"{{$default->absent_student_email_id==$smsTemplate->id? 'selected' : ''  }}>{{ $absentEmail++ }} Template</option> 
                                                          @endforeach 
                                                      </select> 
                                                </div>
                                            </div>  
                                        </div>
                                    </div>
                                </div>
                            </div>{{--row end --}}   
                                 
                             
                        
                             <div class="row">
                        <div class="col-md-12 text-center">
                            <button class="btn btn-success" type="submit">Submit</button>
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

    $("#class").change(function(){
        sectionSearch($(this).val());
    });     
    
    if ($("#class").val() > 0) {
        sectionSearch($("#class").val(),{{ @$default->section_id }}); 
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