@extends('admin.layout.base')
@section('body')
@push('links') 
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <style type="text/css">
      .radio label {
    padding-right: 20px;
}
  </style>
@endpush
<section class="content-header">
<h1>Attendence Barcode  </h1>
     
</section>
    <section class="content">
      	<div class="box">    
        {{ $errors->first() }}         
            <!-- /.box-header -->
            <div class="box-body"> 
                     <form  action="{{ route('admin.attendance.barcode.save') }}" method="post" class="add_form">
                      {{ csrf_field() }}
                      <div class="row">
                        <div class="col-lg-4" style="margin-left: 20px">
                          <label>Registration No</label>
                          <input type="text" class="form-control" name="registration_no" onkeyup="callAjax(this,'{{ route('admin.attendance.barcode.show') }}','div_show')"> 
                        </div>
                      </div>
                        <div class="col-lg-12" id="div_show" style="padding-top: 20px">
                        
                          
                        </div>
                        
                       

                             
                      {{ Form::close() }}

            </div>
            

    </section>
    <!-- /.content -->
    
@endsection
 