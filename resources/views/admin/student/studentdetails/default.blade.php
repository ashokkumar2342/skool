@extends('admin.layout.base')
@push('links')
   <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
@endpush
@section('body')
<section class="content-header">
    <h1> Student Default <small>Value</small> </h1>
       
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
                                          <div class="panel panel-default">
                                            <div class="panel-heading">School Details</div> 
                                              <div class="panel-body">   
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
                                            <div class="col-lg-3">                         
                                                <div class="form-group">
                                                    {{ Form::label('admission_date','Date of Admission',['class'=>' control-label']) }}
                                                    {!! Form::date('admission_date', @$default->admission_date, ['class'=>'form-control']) !!}
                                                    <p class="text-danger">{{ $errors->first('admission_date') }}</p>
                                                </div>
                                            </div>
                                            <div class="col-lg-3">                         
                                                <div class="form-group">
                                                    {{ Form::label('activation_date ','Date of Activation',['class'=>' control-label']) }}
                                                    {!! Form::date('activation_date ', @$default->activation_date , ['class'=>'form-control']) !!}
                                                    <p class="text-danger">{{ $errors->first('activation_date ') }}</p>
                                                </div>
                                            </div>
                                            <div class="col-lg-2">                         
                                                <div class="form-group">
                                                  {{ Form::label('house_id','House Name',['class'=>' control-label']) }}
                                                  {!! Form::select('house_id',$houses, @$default->houses->id, ['class'=>'form-control','placeholder'=>'Select House Name']) !!}
                                                  <p class="text-danger">{{ $errors->first('house_id') }}</p>
                                              </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="panel panel-default">
                                      <div class="panel-heading">Person Details </div> 
                                        <div class="panel-body">
                                            <div class="col-lg-3">                         
                                                <div class="form-group">
                                                    {{ Form::label('religion','Religion',['class'=>' control-label']) }}
                                                    {!! Form::select('religion',$religions, @$default->religions->id, ['class'=>'form-control','placeholder'=>'Select Religion']) !!}
                                                    <p class="text-danger">{{ $errors->first('religion') }}</p>
                                                </div>
                                            </div>
                                            <div class="col-lg-3">                         
                                                <div class="form-group">
                                                    {{ Form::label('gender','Gender',['class'=>' control-label']) }}
                                                    {!! Form::select('gender_id',$genders, @$default->genders->id, ['class'=>'form-control','placeholder'=>'Select Gender']) !!}
                                                    <p class="text-danger">{{ $errors->first('gender_id') }}</p>
                                                </div>
                                            </div>
                                            <div class="col-lg-3">                         
                                                <div class="form-group">
                                                    {{ Form::label('category','Category',['class'=>' control-label']) }}
                                                    {!! Form::select('category',$categories,@$default->categories->id, ['class'=>'form-control','placeholder'=>'Select Category']) !!}
                                                    <p class="text-danger">{{ $errors->first('category') }}</p>
                                                </div>
                                            </div>
                                            <div class="col-lg-3">                         
                                                <div class="form-group">
                                                    {{ Form::label('alive','Parent Alive',['class'=>' control-label']) }}
                                                     <select name="alive" class="form-control" >
                                                       <option value="1" {{ @$default->alive==1? 'selected' :'' }}>Yes</option> 
                                                       <option value="2" {{ @$default->alive==2? 'selected' :'' }}>No</option> 
                                                     </select>                       
                                                     
                                                    <p class="text-danger">{{ $errors->first('nationality') }}</p>
                                                </div>
                                            </div>
                                           </div>
                                           </div>
                                           <div class="panel panel-default">
                                             <div class="panel-heading">Address Details </div> 
                                               <div class="panel-body">
                                             <div class="col-lg-3">                         
                                                <div class="form-group">
                                                    {{ Form::label('state','State',['class'=>' control-label']) }}
                                                    {!! Form::text('state', @$default->state, ['class'=>'form-control']) !!}
                                                    <p class="text-danger">{{ $errors->first('state') }}</p>
                                                </div>
                                            </div>
                                              <div class="col-lg-3">                         
                                                <div class="form-group">
                                                    {{ Form::label('city','City',['class'=>' control-label']) }}
                                                    {!! Form::text('city', @$default->city, ['class'=>'form-control']) !!}
                                                    <p class="text-danger">{{ $errors->first('city') }}</p>
                                                </div>
                                            </div>
                                            <div class="col-lg-3">                         
                                                <div class="form-group">
                                                    {{ Form::label('pincode','Pincode',['class'=>' control-label']) }}                         
                                                    {{ Form::text('pincode',@$default->pincode,array('class' => 'form-control' )) }}
                                                    <p class="text-danger">{{ $errors->first('pincode') }}</p>
                                                </div>
                                            </div>
                                            <div class="col-lg-3">                         
                                                <div class="form-group">
                                                    {{ Form::label('nationality','Nationality',['class'=>' control-label']) }}
                                                     <select name="nationality" class="form-control" >
                                                       <option value="1" {{ @$default->nationality==1? 'selected' :'' }}>Indian</option> 
                                                       <option value="2" {{ @$default->nationality==2? 'selected' :'' }}>Other Country</option> 
                                                     </select>                       
                                                     
                                                    <p class="text-danger">{{ $errors->first('nationality') }}</p>
                                                </div>
                                            </div> 
                                        </div>
                                    </div>
                                    <div class="panel panel-default">
                                      <div class="panel-heading">Medical Details </div> 
                                        <div class="panel-body"> 
                                            <div class="col-lg-3">                         
                                                <div class="form-group">
                                                    {{ Form::label('m_ondate','Medical On Date',['class'=>' control-label']) }}                         
                                                    {{ Form::date('m_ondate',@$default->m_ondate,array('class' => 'form-control' )) }}
                                                    <p class="text-danger">{{ $errors->first('m_ondate') }}</p>
                                                </div>
                                            </div>
                                            <div class="col-lg-3">                         
                                                <div class="form-group">
                                                    {{ Form::label('m_hb','HB',['class'=>' control-label']) }}                         
                                                    {{ Form::text('m_hb',@$default->m_hb,array('class' => 'form-control' )) }}
                                                    <p class="text-danger">{{ $errors->first('m_hb') }}</p>
                                                </div>
                                            </div>
                                            <div class="col-lg-3">                         
                                                <div class="form-group">
                                                    {{ Form::label('m_bp_l','BP Lower',['class'=>' control-label']) }}                         
                                                    {{ Form::text('m_bp_l',@$default->m_bp_l,array('class' => 'form-control' )) }}
                                                    <p class="text-danger">{{ $errors->first('m_bp_l') }}</p>
                                                </div>
                                            </div>
                                            <div class="col-lg-3">                         
                                                <div class="form-group">
                                                    {{ Form::label('m_bp_u','BP Upper',['class'=>' control-label']) }}                         
                                                    {{ Form::text('m_bp_u',@$default->m_bp_u,array('class' => 'form-control' )) }}
                                                    <p class="text-danger">{{ $errors->first('m_bp_u') }}</p>
                                                </div>
                                            </div>
                                            <div class="col-lg-3">                         
                                                <div class="form-group">
                                                    {{ Form::label('m_weight','Weight(In Kg.)',['class'=>' control-label']) }}                         
                                                    {{ Form::text('m_weight',@$default->m_weight,array('class' => 'form-control' )) }}
                                                    <p class="text-danger">{{ $errors->first('m_weight') }}</p>
                                                </div>
                                            </div>
                                             
                                            <div class="col-lg-3">                         
                                                <div class="form-group">
                                                    {{ Form::label('m_height','Height(In Cm.)',['class'=>' control-label']) }}                         
                                                    {{ Form::text('m_height',@$default->m_height,array('class' => 'form-control' )) }}
                                                    <p class="text-danger">{{ $errors->first('m_height') }}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                          </div>
                                        </div>
                                      </div>
                                    </div> 
                                       {{--  <div class="panel panel-default">
                                         <div class="text-center"><b>Birthday Template</b></div> 
                                          <div class="panel-body"> 
                                            @php
                                                $SMSarrayId=1;    
                                              @endphp  
                                            <div class="col-lg-4">                         
                                                <div class="form-group">
                                                    <label> SMS Template</label>
                                                     <select name="birthday_message_id" class="form-control">
                                                          <option selected disabled>Select Option</option>
                                                          @foreach ($smsbirthdayTemplates as $smsTemplate)
                                                             <option value="{{ $smsTemplate->id }}"{{$default->birthday_message_id==$smsTemplate->id? 'selected' : ''  }}>{{ $SMSarrayId++ }} Template</option> 
                                                          @endforeach 
                                                      </select> 
                                                </div>
                                            </div>
                                            <div class="col-lg-4 text-center" style="margin-top: 25px">                         
                                                <div class="form-group">
                                                <a href="#" title="" class="btn btn-info btn-xs" onclick="callPopupLarge(this,'{{ route('admin.medical.template.view',1) }}')"><i class="fa fa-eye"></i></a>
                                              </div>
                                            </div>
                                            @php
                                                $EmailarrayId=1;    
                                              @endphp
                                            <div class="col-lg-4">                         
                                                <div class="form-group">
                                                    <label>Email Template</label>
                                                     <select name="birthday_email_id" class="form-control">
                                                          <option selected disabled>Select Option</option>
                                                          @foreach ($emailbirthdayTemplates as $smsTemplate)
                                                             <option value="{{ $smsTemplate->id }}"{{$default->birthday_email_id==$smsTemplate->id? 'selected' : ''  }}>{{ $EmailarrayId++ }} Template</option> 
                                                          @endforeach 
                                                      </select> 
                                                </div>
                                            </div> 
                                            </div>
                                            </div> 
                                        <div class="panel panel-default">
                                         <div class="text-center"><b>Homework Template</b></div> 
                                          <div class="panel-body"> 
                                          
                                           @php
                                                $homeworkId=1;    
                                              @endphp    
                                            <div class="col-lg-4">                         
                                                <div class="form-group">
                                                    <label> SMS Template</label>
                                                     <select name="homework_message_id" class="form-control">
                                                          <option selected disabled>Select Option</option>
                                                          @foreach ($smshomeworkTemplates as $smsTemplate)
                                                             <option value="{{ $smsTemplate->id }}"{{$default->homework_message_id==$smsTemplate->id? 'selected' : ''  }}>{{ $homeworkId++ }} Template</option> 
                                                          @endforeach 
                                                      </select> 
                                                </div>
                                            </div>
                                            <div class="col-lg-4 text-center" style="margin-top: 25px">                         
                                                <div class="form-group">
                                                <a href="#" title="" class="btn btn-info btn-xs" onclick="callPopupLarge(this,'{{ route('admin.medical.template.view',2) }}')"><i class="fa fa-eye"></i></a>
                                              </div>
                                            </div>
                                            @php
                                                $emailhomeworkId=1;    
                                              @endphp 
                                            <div class="col-lg-4">                         
                                                <div class="form-group">
                                                    <label>Email Template</label>
                                                     <select name="homework_email_id" class="form-control">
                                                          <option selected disabled>Select Option</option>
                                                          @foreach ($emailhomeworkTemplates as $smsTemplate)
                                                             <option value="{{ $smsTemplate->id }}"{{$default->homework_email_id==$smsTemplate->id? 'selected' : ''  }}>{{ $emailhomeworkId++ }} Template</option> 
                                                          @endforeach 
                                                      </select> 
                                                </div>
                                            </div>  
                                            </div>
                                            </div> 
                                        <div class="panel panel-default">
                                         <div class="text-center"><b>Class Test Template</b></div> 
                                          <div class="panel-body">  
                                           @php
                                                $smsclassId=1;    
                                              @endphp    
                                            <div class="col-lg-4">                         
                                                <div class="form-group">
                                                    <label>SMS Template</label>
                                                     <select name="classTest_message_id" class="form-control">
                                                          <option selected disabled>Select Option</option>
                                                          @foreach ($smsclasstestTemplates as $smsTemplate)
                                                             <option value="{{ $smsTemplate->id }}"{{$default->classTest_message_id==$smsTemplate->id? 'selected' : ''  }}>{{ $smsclassId++ }} Template</option> 
                                                          @endforeach 
                                                      </select> 
                                                </div>
                                            </div> 
                                            <div class="col-lg-4 text-center" style="margin-top: 25px">                         
                                                <div class="form-group">
                                                <a href="#" title="" class="btn btn-info btn-xs" onclick="callPopupLarge(this,'{{ route('admin.medical.template.view',3) }}')"><i class="fa fa-eye"></i></a>
                                              </div>
                                            </div>
                                             @php
                                                $emailclassId=1;    
                                              @endphp    
                                            <div class="col-lg-4">                         
                                                <div class="form-group">
                                                    <label>Email Template</label>
                                                     <select name="classTest_email_id" class="form-control">
                                                          <option selected disabled>Select Option</option>
                                                          @foreach ($emailclasstestTemplates as $smsTemplate)
                                                             <option value="{{ $smsTemplate->id }}"{{$default->classTest_email_id==$smsTemplate->id? 'selected' : ''  }}>{{ $emailclassId++ }} Template</option> 
                                                          @endforeach 
                                                      </select> 
                                                </div>
                                            </div> 
                                            </div>
                                            </div>
                                         <div class="panel panel-default">
                                         <div class="text-center"><b>Class Test Detaild Template</b></div> 
                                          <div class="panel-body">  
                                           @php
                                                $smsclassDetilsId=1;    
                                              @endphp    
                                            <div class="col-lg-4">                         
                                                <div class="form-group">
                                                    <label>SMS Template</label>
                                                     <select name="class_test_details_message_id" class="form-control">
                                                          <option selected disabled>Select Option</option>
                                                          @foreach ($smsclasstestDetailsTemplates as $smsTemplate)
                                                             <option value="{{ $smsTemplate->id }}"{{$default->class_test_details_message_id==$smsTemplate->id? 'selected' : ''  }}>{{ $smsclassDetilsId++ }} Template</option> 
                                                          @endforeach 
                                                      </select> 
                                                </div>
                                            </div> 
                                            <div class="col-lg-4 text-center" style="margin-top: 25px">                         
                                                <div class="form-group">
                                                <a href="#" title="" class="btn btn-info btn-xs" onclick="callPopupLarge(this,'{{ route('admin.medical.template.view',4) }}')"><i class="fa fa-eye"></i></a>
                                              </div>
                                            </div>
                                             @php
                                                $emailclassDetilsId=1;    
                                              @endphp    
                                            <div class="col-lg-4">                         
                                                <div class="form-group">
                                                    <label>Email  Template</label>
                                                     <select name="class_test_details_email_id" class="form-control">
                                                          <option selected disabled>Select Option</option>
                                                          @foreach ($emailclasstestDetailsTemplates as $smsTemplate)
                                                             <option value="{{ $smsTemplate->id }}"{{$default->class_test_details_email_id==$smsTemplate->id? 'selected' : ''  }}>{{ $emailclassDetilsId++ }} Template</option> 
                                                          @endforeach 
                                                      </select> 
                                                </div>
                                            </div>  
                                            </div>
                                            </div> 
                                        <div class="panel panel-default">
                                         <div class="text-center"><b>Time Table Template</b></div> 
                                          <div class="panel-body">  
                                            @php
                                                $smsTimeId=1;    
                                              @endphp    
                                            <div class="col-lg-4">                         
                                                <div class="form-group">
                                                    <label> SMS Template</label>
                                                     <select name="timetable_message_id" class="form-control">
                                                          <option selected disabled>Select Option</option>
                                                          @foreach ($smsTimetableTemplates as $smsTemplate)
                                                             <option value="{{ $smsTemplate->id }}"{{$default->timetable_message_id==$smsTemplate->id? 'selected' : ''  }}>{{ $smsTimeId++ }} Template</option> 
                                                          @endforeach 
                                                      </select> 
                                                </div>
                                            </div> 
                                            <div class="col-lg-4 text-center" style="margin-top: 25px">                         
                                                <div class="form-group">
                                                <a href="#" title="" class="btn btn-info btn-xs" onclick="callPopupLarge(this,'{{ route('admin.medical.template.view',5) }}')"><i class="fa fa-eye"></i></a>
                                              </div>
                                            </div>
                                             @php
                                                $emailTimeId=1;    
                                              @endphp    
                                            <div class="col-lg-4">                         
                                                <div class="form-group">
                                                    <label>Email Template  </label>
                                                     <select name="timetable_email_id" class="form-control">
                                                          <option selected disabled>Select Option</option>
                                                          @foreach ($smsTimetableTemplates as $smsTemplate)
                                                             <option value="{{ $smsTemplate->id }}"{{$default->timetable_email_id==$smsTemplate->id? 'selected' : ''  }}>{{ $emailTimeId++ }} Template</option> 
                                                          @endforeach 
                                                      </select> 
                                                </div>
                                            </div>  
                                            </div>
                                            </div> 
                                        <div class="panel panel-default">
                                         <div class=" text-center"><b>Medical Template </b></div> 
                                          <div class="panel-body"> 
                                            @php
                                                $medicalSMS=1;    
                                              @endphp    
                                            <div class="col-lg-4">                         
                                                <div class="form-group">
                                                    <label> SMS Template</label>
                                                     <select name="medical_message_id" class="form-control">
                                                          <option selected disabled>Select Option</option>
                                                          @foreach ($smsMedicalTemplates as $smsTemplate)
                                                             <option value="{{ $smsTemplate->id }}"{{$default->medical_message_id==$smsTemplate->id? 'selected' : ''  }}>{{ $medicalSMS++ }} Template</option> 
                                                          @endforeach 
                                                      </select> 
                                                </div>
                                            </div> 
                                            <div class="col-lg-4 text-center" style="margin-top: 25px">                         
                                                <div class="form-group">
                                                <a href="#" title="" class="btn btn-info btn-xs" onclick="callPopupLarge(this,'{{ route('admin.medical.template.view',6) }}')"><i class="fa fa-eye"></i></a>
                                              </div>
                                            </div>
                                             
                                            @php
                                                $medicalEmail=1;    
                                              @endphp    
                                            <div class="col-lg-4">                         
                                                <div class="form-group">
                                                    <label>Email Template </label>
                                                     <select name="medical_email_id" class="form-control">
                                                          <option selected disabled>Select Option</option>
                                                          @foreach ($emailMedicalTemplates as $smsTemplate)
                                                             <option value="{{ $smsTemplate->id }}"{{$default->medical_email_id==$smsTemplate->id? 'selected' : ''  }}>{{ $medicalEmail++ }} Template</option> 
                                                          @endforeach 
                                                      </select> 
                                                </div>
                                            </div>
                                          </div>
                                        </div>
                                        <div class="panel panel-default">
                                         <div class=" text-center"><b>Student Absent Template</b></div> 
                                          <div class="panel-body">
                                            @php
                                                $absentSMS=1;    
                                              @endphp    
                                            <div class="col-lg-4">                         
                                                <div class="form-group">
                                                    <label>SMS Template</label>
                                                     <select name="absent_student_message_id" class="form-control">
                                                          <option selected disabled>Select Option</option>
                                                          @foreach ($smsabsentTemplates as $smsTemplate)
                                                             <option value="{{ $smsTemplate->id }}"{{$default->absent_student_message_id==$smsTemplate->id? 'selected' : ''  }}>{{ $absentSMS++ }} Template</option> 
                                                          @endforeach 
                                                      </select> 
                                                </div>
                                            </div> 
                                            <div class="col-lg-4 text-center" style="margin-top: 25px">                         
                                                <div class="form-group">
                                                <a href="#" title="" class="btn btn-info btn-xs" onclick="callPopupLarge(this,'{{ route('admin.medical.template.view',7) }}')"><i class="fa fa-eye"></i></a>
                                              </div>
                                            </div>
                                            @php
                                                $absentEmail=1;    
                                              @endphp    
                                            <div class="col-lg-4">                         
                                                <div class="form-group">
                                                    <label>Email Template</label>
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
                                              </div> --}}
 
                           
                                 
                             
                        
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