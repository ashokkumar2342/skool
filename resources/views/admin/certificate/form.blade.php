@extends('admin.layout.base')
@push('links')
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
@endpush
@section('body')
<section class="content-header">
    <h1> Certificate Apply <small>Details</small> </h1>

</section>
<section class="content"> 
    <div class="box">        
        <!-- /.box-header -->
        <div class="box-body"> 
                    <form action="{{ route('admin.student.certificateIssu.post') }}" method="post" class="add_form" accept-charset="utf-8" no-reset="true">
                    {{ csrf_field() }} 
                        <div class="row">  
                            <div class="col-lg-3 form-group">                         
                                <label>Academic Year</label>
                                <select name="academic_year_id" class="form-control">
                                    <option selected disabled>Select Academic Year</option>
                                    @foreach ($academicYears as $academicYear)
                                    <option value="{{ $academicYear->id }}"{{ @$default->year==$academicYear->id? 'selected' : ''  }}>{{ $academicYear->name }}</option>
                                    @endforeach
                                </select>
                            </div>                   
                            <div class="col-lg-3 form-group">                         
                                <label>Registration No</label>
                                <select name="registration_no" class="form-control select2">
                                    <option selected disabled>Select Registration</option>
                                    @foreach ($students as $student)
                                    <option value="{{ $student->id }}">{{ $student->registration_no }}--{{ $student->name }}</option>
                                    @endforeach
                                </select>
                            </div> 
                            <div class="col-lg-3">                         
                                <div class="form-group">
                                    {{ Form::label('date','Date',['class'=>' control-label ']) }}                         
                                    {{ Form::text('date',date('d-m-Y'),['class'=>'form-control datepicker','id'=>'date','placeholder'=>'Date',' required']) }}
                                    <p class="text-danger">{{ $errors->first('date') }}</p>
                                </div>
                            </div> 
                            <div class="col-lg-3">                         
                                <div class="form-group">
                                    {{ Form::label('certificate_type','Certificate Type',['class'=>' control-label']) }}
                                    {!! Form::select('certificate_type',[ 
                                        '2'=>'School Leaving Certificate',
                                        '3'=>'Character Certificate',
                                        '4'=>'Date of Birth Certificate',

                                        ], null, ['class'=>'form-control','placeholder'=>'Select']) !!}
                                        <p class="text-danger">{{ $errors->first('certificate_type') }}</p>
                                    </div>
                                </div> 
                                <div class="col-lg-3">                         
                                    <div class="form-group">
                                        {{ Form::label('attachment','Attachment',['class'=>' control-label ']) }}                         
                                        {{ Form::file('attachment',['class'=>'form-control','rows'=>'2']) }}
                                        <p class="text-danger">{{ $errors->first('attachment') }}</p>
                                    </div>
                                </div>
                                <div class="col-lg-9">                         
                                    <div class="form-group">
                                        {{ Form::label('reason','Reason',['class'=>' control-label ']) }}                         
                                        {{ Form::textarea('reason','',['class'=>'form-control datepicker','rows'=>'2']) }}
                                        <p class="text-danger">{{ $errors->first('reason') }}</p>
                                    </div>
                                </div> 
                                <div class="col-lg-3 form-group">
                                    <label>SLC No</label>
                                    <input type="text" name="slc_no" class="form-control"> 
                                </div><div class="col-lg-3 form-group">
                                    <label>Udise Code</label>
                                    <input type="text" name="udise_code" class="form-control"> 
                                </div>
                                <div class="col-lg-3 form-group">
                                    <label>Department School Code</label>
                                    <input type="text" name="department_school_code" class="form-control"> 
                                </div>
                                <div class="col-lg-3 form-group">
                                    <label>File No</label>
                                    <input type="text" name="file_no" class="form-control"> 
                                </div> 
                                <div class="col-lg-12 text-center" style="padding-top: 20px;">                         
                                    <div class="form-group ">
                                        <button class="btn btn-success">Apply</button> 
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
        $( ".datepicker" ).datepicker({dateFormat:'dd-mm-yy'});


    </script>

    @endpush