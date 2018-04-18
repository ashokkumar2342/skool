@extends('admin.layout.base')
@push('links')
   <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
@endpush
@section('body')
<section class="content-header">
    <h1> Certificate Issue <small>Details</small> </h1>
      <ol class="breadcrumb">
       <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>        
      </ol>
</section>
    <section class="content">        
        {{Form::close()}}
      	<div class="box">        
            <!-- /.box-header -->
            <div class="box-body">
                <div class="row">
                    <div class="col-lg-12 ">                  
                        {{-- {{ Form::open(['route'=>'admin.student.excel.store']) 'method'=>'POST','files'=>'true' }} --}}
                        {!! Form::open(array('route' => 'admin.student.certificateIssu.post','method'=>'POST', 'files'=>'true' )) !!}                            
                             <div class="row">{{--row start --}}
                                <div class="col-md-12 ">
                                    <div class="form-group">
                                        <div class="col-md-12">                                          
                                            <div class="col-lg-4">                         
                                              <div class="form-group">
                                                  {{ Form::label('registration_no','Registration no',['class'=>' control-label ']) }}                         
                                                  {{ Form::text('registration_no','',['class'=>'form-control',' required']) }}
                                                  <p class="text-danger">{{ $errors->first('registration_no') }}</p>
                                              </div>
                                            </div>
                                            <div class="col-lg-4">                         
                                              <div class="form-group">
                                                  {{ Form::label('date','Date',['class'=>' control-label ']) }}                         
                                                  {{ Form::text('date','',['class'=>'form-control datepicker',' required']) }}
                                                  <p class="text-danger">{{ $errors->first('date') }}</p>
                                              </div>
                                            </div>
                                            <div class="col-lg-4">                         
                                                <div class="form-group">
                                                    {{ Form::label('certificate_type','Certificate Type',['class'=>' control-label']) }}
                                                    {!! Form::select('certificate_type',[
                                                                'SLC'=>'SLC',
                                                                'CLC'=>'CLC',
                                                                'MarkSheet'=>'MarkSheet',
                                                                'Certificate'=>'Certificate',
                                                                
                                                        ], null, ['class'=>'form-control','placeholder'=>'Select','required']) !!}
                                                    <p class="text-danger">{{ $errors->first('certificate_type') }}</p>
                                                </div>
                                            </div> 
                                            <div class="col-lg-4">                         
                                              <div class="form-group">
                                                  {{ Form::label('reason','Reason',['class'=>' control-label ']) }}                         
                                                  {{ Form::textarea('reason','',['class'=>'form-control datepicker','rows'=>'2',' required']) }}
                                                  <p class="text-danger">{{ $errors->first('reason') }}</p>
                                              </div>
                                            </div>
                                             <div class="col-lg-4">                         
                                              <div class="form-group">
                                                  {{ Form::label('attachment','Attachment',['class'=>' control-label ']) }}                         
                                                  {{ Form::file('attachment','',['class'=>'form-control datepicker','rows'=>'2']) }}
                                                  <p class="text-danger">{{ $errors->first('attachment') }}</p>
                                              </div>
                                            </div>
                                         
                                             <div class="col-lg-4" style="padding-top: 20px;">                         
                                                <div class="form-group">
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
    
    
</script>

@endpush