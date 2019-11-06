@extends('admin.layout.base')
@section('body')
<!-- Main content -->
<section class="content-header text-center"> 
  <h1>Reset Password</h1> 
</section>  
<section class="content" style="margin-top:100px">
<div class="row text-center" style="margin-left:320px" style="margin-top: 600px"> 
  <div class="col-lg-7 text-center"> 
  <div class="login-box-body"> 
    <form action="{{ route('admin.account.reset.password.change') }}" method="post" class="add_form" no-reset="">
      {{ csrf_field() }} 
      <div class="form-group has-feedback">
        <label>E-mail ID</label>
        <select name="email" class="form-control form-group select2">
          <option >Select E-mail ID</option>
          @foreach ($admins as $admin)
          <option value="{{ $admin->id }}">{{ $admin->email }}</option> 
          @endforeach 
      </select>
  </div>

  <div class="form-group has-feedback">
    <label>New Password</label>
    <input type="password" name="new_pass" class="form-control" placeholder="Enter New Password" maxlength="15" required="">
</div>
<div class="form-group has-feedback">
    <label>Confirm Password</label>
    <input type="password" name="con_pass" class="form-control" placeholder="Enter Confirm Password" maxlength="15" required="">
 
    
    <div class="col-lg-12" style="margin-top: 5px">
      <button type="submit" class="btn-sm btn-primary ">Reset Password</button>
  </div>
  
 </form>
  </div>
</div> 
</div>
 </section>
<!-- /.content -->

@endsection
@push('links')
<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css">
@endpush
@push('scripts')
<script type="text/javascript" src="//cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
      $('#event_type_data_table').DataTable();
  });

    $('#btn_event_type_table_show').click();
</script>
@endpush


