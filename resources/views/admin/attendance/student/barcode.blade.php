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
                        <div class="col-lg-4">
                          <label>Registration No</label>
                          <input type="text" class="form-control" name="registration_no"> 
                        </div>
                        <input type="submit" class="btn btn-success" value="Save" style="margin-top: 24px">
                        
                      </div>

                             
                      {{ Form::close() }}

            </div>
            

    </section>
    <!-- /.content -->
    
@endsection
 