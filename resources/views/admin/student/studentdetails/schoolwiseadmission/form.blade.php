@extends('admin.layout.base')
@push('links')
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
@endpush
@section('body')
<style>

</style>
<section class="content-header">
    <h1>Admission Application Form<small>Details</small> </h1>

</section>      
<section class="content"> 
    <div class="box"> 
        <div class="box-body">

            <form action="{{ route('admin.student.school.wise.admission.store') }}" call-back="redirectStudent" method="post" class="add_form">
                {{ csrf_field() }}
                <div class="row"> 
                <div class="col-lg-4">                         
                    <div class="form-group">
                        <label>Academic Year</label>
                        <span class="fa fa-asterisk"></span>
                         <select name="academic_year_id" class="form-control" onchange="callAjax(this,'{{ route('admin.student.registration.academicYear') }}','select_class_box')">
                             <option selected disabled>Select Academic Year</option>
                             @foreach ($academicYears as $academicYear)
                               <option value="{{ $academicYear->academic_year_Id }}">{{ $academicYear->name }}</option> 
                             @endforeach
                              
                         </select>
                    </div>
                </div>
                </div>                                            
                <div class="row">  
                    <div class="col-lg-4">                         
                        <div class="form-group">
                            {{ Form::label('sibling_registration','Sibling Ragistration',['class'=>' control-label']) }}
                            <span class="fa fa-asterisk"></span>
                            <select name="sibling_registration"  class="form-control" id="sibling_registration" onchange="if(this.value==='yes'){
                                showHideDiv(1,'registration_div_yes');
                                showHideDiv(0,'registration_div_no');
                                showHideDiv(0,'application_div_yes');
                            }if(this.value==='no'){
                                showHideDiv(0,'registration_div_yes');
                                showHideDiv(0,'application_div_yes');
                                showHideDiv(1,'registration_div_no');
                                $('#sibling_registration_no').val('');

                            }if(this.value==='app'){
                                showHideDiv(0,'registration_div_yes');
                                showHideDiv(0,'registration_div_no');
                                showHideDiv(1,'application_div_yes');
                                $('#sibling_registration_no').val('');

                            }">
                            <option selected disabled>Select Sibling Registration</option>
                            <option value="no">No Sibling</option>
                            <option value="yes">Choose Sibling From Registration No.</option>
                            <option value="app">Choose Sibling From Application No.</option>

                        </select>
                    </div>
                </div>
                <div id="registration_div_yes" style="display: none;">
                    <div class="col-lg-4">                         
                        <div class="form-group">
                            {{ Form::label('sibling_register','Sibling Registration No.',['class'=>' control-label']) }}
                            <span class="fa fa-asterisk"></span>
                            <input type="text" onblur="callAjax(this,'{{ route('admin.student.details.show') }}','sibling_details')" name="sibling_registration_no" id="sibling_registration_no" class="form-control">
                        </div>
                    </div>  
                    <div class="col-lg-4">                         
                        <div class="form-group" id="sibling_details">

                        </div>
                    </div>  
                </div>
                <div id="application_div_yes" style="display: none;">
                    <div class="col-lg-4">                         
                        <div class="form-group">
                            {{ Form::label('sibling_register','Sibling Application No.',['class'=>' control-label']) }}
                            <span class="fa fa-asterisk"></span>
                            <input type="text" {{-- onblur="callAjax(this,'{{ route('admin.student.details.show') }}','sibling_details')" --}} name="sibling_application_no" id="sibling_application_no" class="form-control">
                        </div>
                    </div>  
                    <div class="col-lg-6">                         
                        <div class="form-group" id="sibling_details">

                        </div>
                    </div>  
                </div>
                <div id="registration_div_no" style="display: none;">
                    <div class="col-lg-4">                         
                        <div class="form-group">
                            {{ Form::label('sibling_mobile_no','Mobile No',['class'=>' control-label']) }}
                            <span class="fa fa-asterisk"></span>
                            <input type="text" maxlength="10" onkeypress='return event.charCode >= 48 && event.charCode <= 57'  name="mobileno" id="mobileno" class="form-control">
                        </div>
                    </div>  
                    <div class="col-lg-4">                         
                        <div class="form-group" id="sibling_details">
                            <div class="form-group">
                                {{ Form::label('emailid','Email Id',['class'=>' control-label']) }}
                                <span class="fa fa-asterisk"></span>
                                <input type="email"  name="emailid" id="email" class="form-control">
                            </div>
                        </div>
                    </div>  
                </div>
             </div> 
             

                <div class="row">                         
                <div class="col-lg-4">                         
                    <div class="form-group">
                        {{ Form::label('class','Class',['class'=>' control-label']) }}
                        <span class="fa fa-asterisk"></span>
                        <select name="class" class="form-control" id="select_class_box">
                            <option selected disabled>Select Class</option>}
                             
                        </select>

                        {{-- {!! Form::select('class',$classes, @$default->class_id, ['class'=>'form-control','placeholder'=>'Select Class']) !!}
                        <p class="text-danger">{{ $errors->first('session') }}</p> --}}
                    </div>
                </div> 
                <div class="col-lg-4">                         
                    <div class="form-group">
                        {{ Form::label('student_name','Student Name',['class'=>' control-label']) }}
                        <span class="fa fa-asterisk"></span>                         
                        {{ Form::text('student_name','',['class'=>'form-control','maxlength'=>'50','placeholder'=>'Enter Name']) }}
                        <p class="text-danger">{{ $errors->first('student_name') }}</p>
                    </div>
                </div>  
                <div class="col-lg-4">                         
                    <div class="form-group">
                        {{ Form::label('nick_name','Nick Name',['class'=>' control-label']) }}
                        {{--  <span class="fa fa-asterisk"></span>    --}}                       
                        {{ Form::text('nick_name','',['class'=>'form-control','maxlength'=>'20','placeholder'=>'Enter Nick Name']) }}
                        <p class="text-danger">{{ $errors->first('nick_name') }}</p>
                    </div>
                </div> 
                <div class="col-lg-4">                         
                    <div class="form-group">
                        {{ Form::label('date_of_birth','Date of Birth',['class'=>' control-label']) }}
                        <span class="fa fa-asterisk"></span>   
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                            </div>                          
                            @php
                              $date = date('Y-m-d');
                         @endphp                 
                        {{ Form::date('dob','',array('class' => 'form-control','max'=>date('Y-m-d',strtotime($date ."-730 days")),'min'=>date('Y-m-d',strtotime($date ."-7300 days")) )) }} 
                        </div>
                        <p class="text-danger">{{ $errors->first('date_of_birth') }}</p>
                    </div>
                </div> 
                <div class="col-lg-4">                         
                    <div class="form-group">
                        {{ Form::label('gender','Gender',['class'=>' control-label']) }}
                        <span class="fa fa-asterisk"></span>
                        {!! Form::select('gender',$genders, @$default->genders->id, ['class'=>'form-control','placeholder'=>'Select Gender']) !!}
                        <p class="text-danger">{{ $errors->first('gender') }}</p>
                    </div>
                </div>
                <div class="col-lg-4">                         
                    <div class="form-group">
                        <label>Aadhaar No.</label>
                        <span class="fa fa-asterisk"></span>
                        <input type="text" name="aadhaar_no" class="form-control"  maxlength="12" placeholder="Enter Adhaar No." onkeypress='return event.charCode >= 48 && event.charCode <= 57'>
                    </div>
                </div> 
                <div class="col-lg-3 form-group">
                    <label>Last School Name</label>
                    <input type="text" name="last_school_name" maxlength="100" class="form-control" placeholder="Enter Last School Name"> 
                 </div>
                 <div class="col-lg-3 form-group">
                    <label>Max Marks</label>
                    <input type="text" name="max_marks" maxlength="6" class="form-control" placeholder="Enter Max Marks"> 
                 </div>
                 <div class="col-lg-3 form-group">
                    <label>Marks OBT</label>
                    <input type="text" name="marks_obt" maxlength="6" class="form-control" placeholder="Enter Marks OBT"> 
                 </div>
                 <div class="col-lg-3 form-group">
                    <label>Marks Percent</label>
                    <input type="text" name="marks_percent" maxlength="6" class="form-control" placeholder="Enter Marks Percent"> 
                 </div>

                @if(App\Helper\MyFuncs::menuPermission()->d_status == 1)

                <div class="col-md-12 text-center">
                    <button class="btn btn-success" type="submit">Submit</button>
                </div>
            </div>  
            @endif
        </form>


    
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