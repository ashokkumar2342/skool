@extends('admin.layout.auth')
@section('body')
<div class="login-box">
  <div class="login-logo">
    <a href="#"><b>EAGESKOOL</b></a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Tre Demo</p>
    {{-- {{ Auth::user()->name }} --}}
    {!! Form::open(['route'=>'try.demo.store']) !!}
    <div class="form-group has-feedback">
        <select name="role" class="form-control">
          <option selected disabled>Select Role</option>
          @foreach ($roles as $role)
            <option value="{{ $role->id }}">{{ $role->name }}</option>
          @endforeach
        </select>
        
      </div>
      <div class="form-group has-feedback">
        {!! Form::text('first_name', '', ['class'=>'form-control', 'placeholder'=>'First Name']) !!}
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
        <p class="text-danger">{{ $errors->first('first_name') }}</p>
      </div>
      <div class="form-group has-feedback">
      	{!! Form::email('email', '', ['class'=>'form-control', 'placeholder'=>'mail','maxlength'=>'100']) !!}
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
        <p class="text-danger">{{ $errors->first('email') }}</p>
      </div>
      <div class="form-group has-feedback">
        {!! Form::text('mobile', '', ['class'=>'form-control', 'placeholder'=>'Mobile','maxlength'=>'10','onkeypress'=>'return event.charCode >= 48 && event.charCode <= 57']) !!}
        <span class="glyphicon glyphicon-phone form-control-feedback"></span>
        <p class="text-danger">{{ $errors->first('mobile') }}</p>
      </div> 
      <div class="form-group has-feedback">
      <div class="captcha">
           <span>{!! captcha_img('math') !!}</span>
           <button type="button" class="btn btn-success"><i class="fa fa-refresh" id="refresh"></i></button>
           </div>
        </div>
        <div class="form-group has-feedback">
           <input id="captcha" type="text" class="form-control" placeholder="Enter Captcha" name="captcha"> 
            <p class="text-danger">{{ $errors->first('captcha') }}</p>
        </div>
      <div class="row">
        <div class="col-xs-8">
          <p><a href="{{ route('admin.login') }}" title="">Login</a></p> 
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
@push('links')
<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css">
@endpush
@push('scripts')
 
<script type="text/javascript">
$('#refresh').click(function(){
  $.ajax({
     type:'GET',
     url:'{{ route('admin.refresh.captcha') }}',
     success:function(data){
        $(".captcha span").html(data);
     }
  });
});
</script>
  @endpush