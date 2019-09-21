@extends('admin.layout.base')
@section('body')
  <!-- Main content -->
  <section class="content-header"> 
    <h1>Reset Password</h1> 
    </section>  
    <section class="content"> 
          <div class="box"> 
            <div class="box-body">
              <form action="{{ route('admin.account.reset.password.change') }}" method="post" class="add_form">
              {{ csrf_field() }} 
              <div class="row">
                <div class="col-lg-4">
                  <label>E-mail</label>
                  <select name="email" class="form-control select2">
                    <option >Select E-mail</option>
                    @foreach ($admins as $admin)
                      <option value="{{ $admin->id }}">{{ $admin->email }}</option> 
                    @endforeach 
                  </select>
                  
                </div>
                <div class="col-lg-4">
                  <label>New Password</label>
                  <input type="password" name="new_pass" class="form-control" placeholder="Enter New Password" maxlength="15" required=""> 
                </div>
                <div class="col-lg-4">
                  <label>Confrm Password</label>
                  <input type="password" name="con_pass" class="form-control" placeholder="Enter Confrm Password" maxlength="15" required=""> 
                </div>
                <div class="col-lg-12 text-center" style="margin-top: 10px">
                  <input type="submit" value="Change Password" class="btn btn-success"> 
                </div> 
              </div>
              </form> 
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
     
 
 