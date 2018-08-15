@extends('admin.layout.auth')
@section('body')
<div class="login-box">
  <div class="login-logo">
    <a href="#"><b>ISKOOL</b></a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Registration Process</p>
    {{-- {{ Auth::user()->name }} --}}
    {!! Form::open(['route'=>'student.resitration.firststep.store']) !!}
      <div class="form-group has-feedback">
      	{!! Form::email('email', '', ['class'=>'form-control', 'placeholder'=>'mail']) !!}
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
        <p class="text-danger">{{ $errors->first('email') }}</p>
      </div>
      <div class="form-group has-feedback">
        {!! Form::text('mobile', '', ['class'=>'form-control', 'placeholder'=>'Mobile']) !!}
        <span class="glyphicon glyphicon-phone form-control-feedback"></span>
        <p class="text-danger">{{ $errors->first('mobile') }}</p>
      </div>
      
      <div class="form-group has-feedback">
      {!! Form::password('password', ['class'=>'form-control', 'placeholder'=>'Password']) !!}
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
        <p class="text-danger">{{ $errors->first('password') }}</p>
      </div>
      <div class="form-group has-feedback">
      {!! Form::password('password_confirm', ['class'=>'form-control', 'placeholder'=>'Confirm Password']) !!}
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
        <p class="text-danger">{{ $errors->first('password_confirm') }}</p>
      </div>
      <div class="row">
        <div class="col-xs-8">
          <p><a href="{{ route('parent.login.form') }}" title="">Login</a></p> 
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Submit</button>
        </div>
        <!-- /.col -->
      </div>
    {!! Form::close() !!}

   
   
  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->
@endsection