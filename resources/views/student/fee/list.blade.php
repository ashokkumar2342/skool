@extends('student.layouts.app')
@section('contant')
@push('links')
<style>
  .table td, .table th {
      padding: .0rem; 
      vertical-align: top;
      border-top: 1px solid #dee2e6;
  }
  .border_bottom{
    border-bottom: solid 1px #eee; 
  }  
  b{
    color:#275064;
    align-items: right;
  }
  .fs{
      float: right; font-weight:800;padding-right: 10px;
  }
</style>
@endpush

 <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Fee Details</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right"> 
              <li class="breadcrumb-item"><a href="#">Home</a></li> 
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid"> 
        <div class="row">
         <div class="card"> 
 
         </div>
        </div>
        
      </div> 
    </section>
    <!-- /.content -->


@endsection
@push('scripts')
<script>
  var password = document.getElementById("password")
    , confirm_password = document.getElementById("confirm_password");

  function validatePassword(){
    if(password.value != confirm_password.value) {
      confirm_password.setCustomValidity("Passwords Don't Match");
    } else {
      confirm_password.setCustomValidity('');
    }
  }

  password.onchange = validatePassword;
  confirm_password.onkeyup = validatePassword;
</script>
@endpush