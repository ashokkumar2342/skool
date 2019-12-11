@extends('admin.layout.base')
@push('links')
   <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
@endpush
@section('body')
<style>
   
   </style>
<section class="content-header">
    <h1> New Student<small>Details</small> </h1>
      
     </section>      
    <section class="content">        
      
      	<div class="box">        
            <!-- /.box-header -->
            <div class="box-body">
                <div class="row">

                    
                    <div class="col-lg-12 "> 
                    <form action="{{ route('admin.student.post') }}" call-back="redirectStudent" method="post" class="add_form">
                              {{ csrf_field() }}                                            
                             <div class="row">{{--row start --}}
                                <div class="col-md-12 ">
                                    <div class="form-group">
                                        <div class="col-lg-3">                         
                                            <div class="form-group">
                                            {{ Form::label('sibling_registration','Sibling Ragistration',['class'=>' control-label']) }}
                                                <span class="fa fa-asterisk"></span>
                                                <select name="sibling_registration"  class="form-control" id="sibling_registration" onchange="if(this.value==='yes'){
                                                    showHideDiv(1,'registration_div_yes');
                                                    showHideDiv(0,'registration_div_no');
                                                }else{
                                                    showHideDiv(0,'registration_div_yes');
                                                    showHideDiv(1,'registration_div_no');
                                                    $('#sibling_registration_no').val('');

                                                }">
                                                    <option selected disabled>Select Sibling Ragistration</option>
                                                    <option value="yes">Yes</option>
                                                    <option value="no">No</option>
                                                     
                                                </select>
                                            </div>
                                        </div>
                                        <div id="registration_div_yes" style="display: none;">
                                            <div class="col-lg-3">                         
                                                <div class="form-group">
                                                {{ Form::label('sibling_register','Sibling Register No',['class'=>' control-label']) }}
                                                    <span class="fa fa-asterisk"></span>
                                                    <input type="text" onblur="callAjax(this,'{{ route('admin.student.details.show') }}','sibling_details')" name="sibling_registration_no" id="sibling_registration_no" class="form-control">
                                                </div>
                                            </div>  
                                            <div class="col-lg-6">                         
                                                <div class="form-group" id="sibling_details">

                                                </div>
                                            </div>  
                                        </div>
                                        <div id="registration_div_no" style="display: none;">
                                            <div class="col-lg-3">                         
                                                <div class="form-group">
                                                {{ Form::label('sibling_mobile_no','Mobile No',['class'=>' control-label']) }}
                                                    <span class="fa fa-asterisk"></span>
                                                    <input type="text" maxlength="10" onkeypress='return event.charCode >= 48 && event.charCode <= 57'  name="mobileno" id="mobileno" class="form-control">
                                                </div>
                                            </div>  
                                            <div class="col-lg-6">                         
                                                <div class="form-group" id="sibling_details">
                                                    <div class="form-group">
                                                    {{ Form::label('emailid','Email Id',['class'=>' control-label']) }}
                                                        <span class="fa fa-asterisk"></span>
                                                        <input type="text"  name="emailid" id="email" class="form-control">
                                                    </div>
                                                </div>
                                            </div>  
                                        </div>
                                        
                                       
                                    </div>
                                    </div>                      
                                    <div class="form-group">
                                        <div class="col-md-12">                                     

                                            <div class="col-lg-3">                         
                                                <div class="form-group">
                                                    {{ Form::label('class','Class',['class'=>' control-label']) }}
                                                    <span class="fa fa-asterisk"></span>
                                                    
                                                    {!! Form::select('class',$classes, @$default->class_id, ['class'=>'form-control','placeholder'=>'Select Class']) !!}
                                                    <p class="text-danger">{{ $errors->first('session') }}</p>
                                                </div>
                                            </div>
                                            <div class="col-lg-3">                         
                                                <div class="form-group">
                                                    {{ Form::label('section','Section',['class'=>' control-label']) }}
                                                    <span class="fa fa-asterisk"></span>
                                                    {!! Form::select('section',[], null, ['class'=>'form-control','placeholder'=>'Select Section']) !!}
                                                    <p class="text-danger">{{ $errors->first('session') }}</p>
                                                </div>
                                            </div>
                                             <div class="col-lg-3">                         
                                                <div class="form-group">
                                                    {{ Form::label('registration_no','Registration No.',['class'=>' control-label ']) }}
                                                    <span class="fa fa-asterisk"></span> 
                                                    <input type="text" class="form-control" name="registration_no" maxlength="{{ $schoolinfo->reg_length }}" min="{{ $schoolinfo->reg_length }}" placeholder="Enter Registration No."> 
                                                </div>
                                            </div>
                                            <input type="hidden" name="reg_length" value="{{ $schoolinfo->reg_length }}">
                                             <div class="col-lg-3">                         
                                                <div class="form-group">
                                                    {{ Form::label('admission_no','Admission No.',['class'=>' control-label']) }}
                                                    <span class="fa fa-asterisk"></span>
                                                    {{ Form::text('admission_no','',['class'=>'form-control','maxlength'=>'20']) }}
                                                    <p class="text-danger">{{ $errors->first('admission_no') }}</p>
                                                </div>
                                            </div>
                                             <div class="col-lg-3">                         
                                                <div class="form-group">
                                                    {{ Form::label('roll_no','Roll No.',['class'=>' control-label']) }}
                                                    <span class="fa fa-asterisk"></span>
                                                    {{ Form::text('roll_no','',['class'=>'form-control','onkeypress'=>'return event.charCode >= 48 && event.charCode <= 57','maxlength'=>'4']) }}
                                                    <p class="text-danger">{{ $errors->first('roll_no') }}</p>
                                                </div>
                                            </div> 
                                            <div class="col-lg-3">                         
                                                <div class="form-group">
                                                    {{ Form::label('date_of_admission','Date of Admission',['class'=>' control-label']) }}
                                                    <span class="fa fa-asterisk"></span>   
                                                    <div class="input-group">
                                                      <div class="input-group-addon">
                                                        <i class="fa fa-calendar"></i>
                                                      </div>                          
                                                    {{ Form::date('date_of_admission', @$default->admission_date,array('class' => 'form-control datepicker' )) }}
                                                    </div>
                                                    <p class="text-danger">{{ $errors->first('date_of_admission') }}</p>
                                                </div>
                                            </div>
                                             
                                            <div class="col-lg-6">                         
                                                <div class="form-group">
                                                    {{ Form::label('date_of_activation','Date of Activation',['class'=>' control-label']) }}
                                                    <span class="fa fa-asterisk"></span>   
                                                    <div class="input-group">
                                                      <div class="input-group-addon">
                                                        <i class="fa fa-calendar"></i>
                                                      </div>                          
                                                    {{ Form::date('date_of_activation',@$default->activation_date ,array('class' => 'form-control datepicker' )) }}
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
                                                    <span class="fa fa-asterisk"></span>                         
                                                    {{ Form::text('student_name','',['class'=>'form-control','maxlength'=>'50']) }}
                                                    <p class="text-danger">{{ $errors->first('student_name') }}</p>
                                                </div>
                                            </div>  
                                             <div class="col-lg-3">                         
                                                <div class="form-group">
                                                    {{ Form::label('nick_name','Nick Name',['class'=>' control-label']) }}
                                                   {{--  <span class="fa fa-asterisk"></span> --}}                         
                                                    {{ Form::text('nick_name','',['class'=>'form-control','maxlength'=>'20']) }}
                                                    <p class="text-danger">{{ $errors->first('nick_name') }}</p>
                                                </div>
                                            </div> 
                                            <div class="col-lg-6">                         
                                                <div class="form-group">
                                                    {{ Form::label('date_of_birth','Date of Birth',['class'=>' control-label']) }}
                                                    <span class="fa fa-asterisk"></span>   
                                                    <div class="input-group">
                                                      <div class="input-group-addon">
                                                        <i class="fa fa-calendar"></i>
                                                      </div>                          
                                                    {{ Form::text('date_of_birth','',array('class' => 'form-control datepicker' )) }}
                                                    </div>
                                                    <p class="text-danger">{{ $errors->first('date_of_birth') }}</p>
                                                </div>
                                            </div> 
                                              <div class="col-lg-3">                         
                                                <div class="form-group">
                                                    {{ Form::label('gender','Gender',['class'=>' control-label']) }}
                                                    <span class="fa fa-asterisk"></span>
                                                    {!! Form::select('gender',$genders, @$default->genders->id, ['class'=>'form-control','placeholder'=>'Select Gender']) !!}
                                                    <p class="text-danger">{{ $errors->first('gender') }}</p>
                                                </div>
                                            </div>
                                            <div class="col-lg-3">                         
                                                <div class="form-group">
                                                    <label>Aadhaar No.</label>
                                                    <span class="fa fa-asterisk"></span>
                                                    <input type="text" name="aadhaar_no" class="form-control"  maxlength="12" placeholder="Enter Adhaar No." onkeypress='return event.charCode >= 48 && event.charCode <= 57'>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">                         
                                                <div class="form-group">
                                                    <label>House Name</label>
                                                    <span class="fa fa-asterisk"></span>
                                                    <select name="house_name" class="form-control">
                                                        <option selected disabled>Select House</option>
                                                        @foreach ($houses as $house)
                                                          <option value="{{ $house->id }}"{{ @$default->house_id==$house->id? 'selected' : '' }}>{{ $house->name }}</option> 
                                                        @endforeach 
                                                    </select>
                                                  
                                                </div>
                                            </div>       
                                            
                                            
                                        </div>
                                    </div>
                                </div>
                            </div> {{--row end --}}               
                             
                        @if(App\Helper\MyFuncs::menuPermission()->d_status == 1)
                                <div class="row">
                        <div class="col-md-12 text-center">
                            <button class="btn btn-success" type="submit">Submit</button>
                        </div>
                    </div>  
                        @endif
                        
                            
                        </form>
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
    $('#date_of_birth').datepicker({
     dateFormat: "dd-mm-yy",
     maxDate: new Date('{{ date('Y')-2 }}')
    });
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

function redirectStudent() {
 $(document).ajaxSuccess(function(event, xhr, settings) {   
   var json = xhr.responseText;
   var obj = JSON.parse(json); 
   window.location.replace(" {{ url('admin/student/view') }}/"+obj.student_id); 
 });
}
 
</script>

@endpush