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
            <h1>Profile</h1>
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
        <!-- Small boxes (Stat box) --> 
        <div class="row">
                  <div class="col-md-3">

                    <!-- Profile Image -->
                    <div class="card card-primary card-outline">
                      <div class="card-body box-profile">
                        <div class="text-center">
                          <img class="profile-user-img img-fluid img-circle" src="{{ route('student.image',$student->picture) }}" alt="{{ $student->name }}">
                        </div>

                        <h3 class="profile-username text-center">{{ $student->name }}</h3> 
                        <ul class="list-group list-group-unbordered mb-3">
                          <li class="list-group-item">
                            <b>Roll No. </b> <a class="float-right">{{ $student->roll_no }}</a>
                          </li>
                          <li class="list-group-item">
                            <b>Registration No.</b> <a class="float-right">{{ $student->registration_no }}</a>
                          </li>
                           <li class="list-group-item">
                            <b>Admission No.</b> <a class="float-right">{{ $student->admission_no }}</a>
                          </li> 
                           <li class="list-group-item">
                            <b>DOB</b> <a class="float-right">{{ date('d-m-Y',strtotime($student->dob)) }}</a>
                          </li>
                          <li class="list-group-item">
                            <b>Gender</b> <a class="float-right">{{ $student->genders->genders or ''}} </a>
                          </li>  
                        </ul>  
                      </div>
                      <!-- /.card-body -->
                    </div>
                    <!-- /.card -->

                    <!-- About Me Box -->
                    <div class="card card-primary">
                      <div class="card-header">
                        <h3 class="card-title">About Me</h3>
                      </div>
                      <!-- /.card-header -->
                      <div class="card-body">
                        <strong><i class="fa fa-book mr-1"></i> Subject</strong> 
                        <p class="text-muted">
                          
                        </p> 
                        <hr> 
                        <strong><i class="fa fa-map-marker mr-1"></i> Permanent Address</strong> 
                        <p class="text-muted">{{ $student->addressDetails->address->p_address or ''}}</p>
                        <hr> 
                        <strong><i class="fa fa-map-marker mr-1"></i> Corespondance Address</strong> 
                        <p class="text-muted">{{ $student->addressDetails->address->c_address or ''}}</p>

                      </div>
                      <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                  </div>
                  <!-- /.col -->
                  <div class="col-md-9">
                    <div class="card">
                      <div class="card-header p-2">
                        <ul class="nav nav-pills">
                          <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">Details</a></li>
                          {{-- <li class="nav-item"><a class="nav-link" href="#timeline" data-toggle="tab">Timeline</a></li> --}}
                          <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Change Password</a></li>
                        </ul>
                      </div><!-- /.card-header -->
                      <div class="card-body">
                        <div class="tab-content">
                          <div class="active tab-pane" id="activity"> 
                            <div class="col-md-8 border_bottom">
                                <ul class="list-group">
                                 
                                  <li class="list-group-item">User Name :-<span class="fs"><input type="text" value="{{ $student->username }}" disabled=""> </span></li> 
                                  <li class="list-group-item">Email :-<span class="fs"><input type="text" maxlength="50" value="{{ $student->addressDetails->address->primary_email or '' }}" disabled> </span></li>
                                  <li class="list-group-item">Class :-<span class="fs"><input type="text" maxlength="50" value="{{ $student->classes->name or ''}}" name="nick_name"> </span></li>
                                  <li class="list-group-item">Section :-<span class="fs"><input type="text" maxlength="50" value="{{ $student->sectionTypes->name or '' }}" > </span></li>
                                  <li class="list-group-item">Father's Name :-<span class="fs"><input type="text" maxlength="10" value="{{ $student->parents[0]->parentInfo->name or ''}}" name="father_name"> </span></li>
                                  <li class="list-group-item">Mother's Name :-<span class="fs"><input type="text" maxlength="50" value="{{ $student->parents[1]->parentInfo->name or ''}}" name="mother_name"> </span></li>
                                  <li class="list-group-item">Father's Mobile No. :-<span  class="fs"><input type="text" maxlength="10" value="{{ $student->parents[0]->parentInfo->mobile or '' }}" name="father_mobile"></span></li>
                                  <li class="list-group-item">Mobile No. :-<span class="fs"><input type="text" maxlength="10" value="{{ $student->addressDetails->address->primary_mobile or ''}}" name="mother_mobile"> </span></li>                                     
                                  
                                  <li class="list-group-item">Category :-<span class="fs"><input type="text" value="{{ $student->addressDetails->address->categories->name or ''}}" disabled=""> </span></li>
                                  <li class="list-group-item">Religion :-<span class="fs"><input type="text" maxlength="50" value="{{ $student->addressDetails->address->religions->name or ''}}" disabled=""> </span></li> 
                                  <li class="list-group-item">City :-<span class="fs"><input type="text" maxlength="50" value="{{ $student->addressDetails->address->city or ''}}" name="city"> </span></li>
                                  <li class="list-group-item">State :-<span class="fs"><input type="text" value="{{ $student->addressDetails->address->state or ''}}" name="state"> </span></li>
                                  <li class="list-group-item">Pincode :-<span class="fs"><input type="text" maxlength="6" value="{{ $student->addressDetails->address->p_pincode or ''}}" name="pincode"> </span></li> 
                                  <li class="list-group-item">Date of Activation :-<span class="fs"><input type="text" maxlength="50" value="{{ Carbon\Carbon::parse($student->date_of_activation)->format('d-m-Y') }}" name="date_of_activation"> </span></li>
                                    
                                  
                                   
                                  

                                  
                                  
                                </ul>
                                
                            </div>
                           
  
                          </div>
                          <!-- /.tab-pane -->
                          <div class="tab-pane" id="timeline">
                            <!-- The timeline -->
                             aa
                          </div>
                          <!-- /.tab-pane -->

                          <div class="tab-pane" id="settings">
                            <form class="form-horizontal add_form" action="{{ route('student.password.change') }}" method="post">
                              {{ csrf_field() }}
                              <div class="form-group">
                                <label  class="col-sm-2 control-label">Old Password</label>

                                <div class="col-sm-10">
                                  <input type="password" class="form-control" name="old_password" >
                                </div>
                              </div>
                              <div class="form-group">
                                <label for="inputEmail" class="col-sm-2 control-label">New Password</label>

                                <div class="col-sm-10">
                                  <input type="password" class="form-control" name="password" id="password">
                                </div>
                              </div>
                              <div class="form-group">
                                <label for="password" class="col-sm-2 control-label">Confirm Password</label>

                                <div class="col-sm-10">
                                  <input type="password" class="form-control" name="confirm_password" id="confirm_password">
                                </div>
                              </div> 
                              <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-10">
                                  <button type="submit" class="btn btn-success">Submit</button>
                                </div>
                              </div>
                            </form>
                          </div>
                          <!-- /.tab-pane -->
                        </div>
                        <!-- /.tab-content -->
                      </div><!-- /.card-body -->
                    </div>
                    <!-- /.nav-tabs-custom -->
                  </div>
                  <!-- /.col -->
                </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
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