@extends('admin.layout.auth')
@section('body')
<div class="login-box">
  <div class="login-logo">
    <a href="#"><b>ISKOOL</b></a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">OTP Verification</p>
    {{-- {{ Auth::user()->name }} --}}
    @if ($parentRegistration->mobile_verify !=1)
    {!! Form::open(['route'=>'student.resitration.verifyMobile']) !!}
       
      <div class="form-group has-feedback">
        {!! Form::hidden('mobile', $parentRegistration->mobile, ['class'=>'form-control', 'placeholder'=>'Mobile']) !!}
        <span class="glyphicon glyphicon-phone form-control-feedback"></span>
        {{-- <p class="text-danger">{{ $errors->first('mobile') }}</p> --}}
      </div>
       
      <div class="form-group has-feedback">
      {!! Form::text('mobile_otp', '',['class'=>'form-control', 'placeholder'=>'Mobile Otp']) !!}
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
        <p class="text-danger">{{ $errors->first('mobile_otp') }}</p>
      </div>
     
       
      <div class="row">
        <div class="col-xs-8">
           
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Verify</button>
        </div>
        <!-- /.col -->
      </div>
      @endif
    {!! Form::close() !!}
    @if ($parentRegistration->email_verify !=1)
          {!! Form::open(['route'=>'student.resitration.verifyEmail']) !!}
          <div class="form-group has-feedback">
            {!! Form::hidden('email', $parentRegistration->email, ['class'=>'form-control', 'placeholder'=>'mail']) !!}
            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
            {{-- <p class="text-danger">{{ $errors->first('email') }}</p> --}}
          </div>
           
           <div class="form-group has-feedback">
          {!! Form::text('email_otp', '',['class'=>'form-control', 'placeholder'=>'Email Otp']) !!}
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            <p class="text-danger">{{ $errors->first('email_otp') }}</p>
          </div>
         
         
           
          <div class="row">
            <div class="col-xs-8">
               
            </div>
            <!-- /.col -->
            <div class="col-xs-4">
              <button type="submit" class="btn btn-primary btn-block btn-flat">Verify</button>
            </div>
            <!-- /.col -->
          </div>
        {!! Form::close() !!}
    @endif
      

 
   
  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->
@endsection

  @push('scripts') 
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
@if(Session::has('message'))
<script type="text/javascript">

    Command: toastr["{{ Session::get('class') }}"]("{{ Session::get('message') }}");
</script>

@endif
 
 <script src={!! asset('admin_asset/dist/js/validation/common.js?ver=1') !!}></script>
    <script src={!! asset('admin_asset/dist/js/customscript.js?ver=1') !!}></script>

@endpush