@extends('admin.layout.base')
@push('links')
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
@endpush
@section('body')
<style>

</style>
<section class="content-header">
    <h1>Take Admission<small>Details</small> </h1>

</section>      
<section class="content">        

    <div class="box">        
        <!-- /.box-header -->
        <div class="box-body"> 
                    <form action="{{ route('admin.student.take.admission.store') }}" call-back="redirectStudent" method="post" class="add_form" no-reset="true">
                        {{ csrf_field() }}                                            
                        <div class="row"> 
                            <div class="col-lg-3">                         
                                <div class="form-group">
                                    <label>Application No.</label>
                                    <span class="fa fa-asterisk"></span>
                                    <input type="text" class="form-control" placeholder="Enter Application No." name="application_no" maxlength="12" onkeypress='return event.charCode >= 48 && event.charCode <= 57'>
                                </div>
                            </div>
                            <div class="col-lg-3">                         
                                <div class="form-group">
                                    {{ Form::label('section','Section',['class'=>' control-label']) }}
                                    <select name="section_id" class="form-control">
                                        @foreach ($sectionTypes as $sectionType)
                                           <option value="{{ $sectionType->id }}">{{ $sectionType->name }}</option> 
                                        @endforeach 
                                    </select>
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
                                    {{ Form::text('admission_no','',['class'=>'form-control','maxlength'=>'20','placeholder'=>'Enter Admission No.']) }}
                                    <p class="text-danger">{{ $errors->first('admission_no') }}</p>
                                </div>
                            </div>
                            <div class="col-lg-3">                         
                                <div class="form-group">
                                    {{ Form::label('roll_no','Roll No.',['class'=>' control-label']) }}
                                    <span class="fa fa-asterisk"></span>
                                    {{ Form::text('roll_no','',['class'=>'form-control','onkeypress'=>'return event.charCode >= 48 && event.charCode <= 57','maxlength'=>'4','placeholder'=>'Enter Roll No.']) }}
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

                            <div class="col-lg-3">                         
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
                            <div class="col-lg-3">                         
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
                            <div class="col-lg-12 text-center">                         
                                <div class="form-group">
                                    <input type="submit" class="btn btn-success">
                                </div>
                            </div>
                        </div>
                     </form>   

       
    </div>
</div>

</section>
<!-- /.content -->
@endsection
@push('scripts')
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script type="text/javascript"> 


</script>

@endpush