@extends('admin.layout.base')
@section('body')
<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-xs-12"> 
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">User Profile</h3>
        </div> 
        <div class="box-body"> 
          <section class="content"> 
            <div class="row">
              <div class="col-md-3">

                <!-- Profile Image -->
                <div class="box box-primary">
                  <div class="box-body box-profile">
                    <img class="profile-user-img img-responsive img-circle" src="../../dist/img/user4-128x128.jpg" alt="User profile picture">

                    <h3 class="profile-username text-center">{{ $admins->first_name or '' }}</h3>

                    <p class="text-muted text-center">Role:</p>

                    <ul class="list-group list-group-unbordered">
                      <li class="list-group-item">
                        <b>Menu</b> <a class="pull-right"></a>
                      </li>
                      <li class="list-group-item">
                        <b>Class</b> <a class="pull-right"></a>
                      </li>
                      <li class="list-group-item">
                        <b>Section</b> <a class="pull-right"></a>
                      </li>
                    </ul> 
                     
                  </div> 
                </div> 
              </div> 
              <div class="col-md-9">
                <div class="nav-tabs-custom">
                  <ul class="nav nav-tabs">
                    <li class="active"><a href="#activity" data-toggle="tab">Profile Info</a></li>

                    <li><a href="#settings" data-toggle="tab">Change Password</a></li>
                  </ul>
                  <div class="tab-content">
                    <div class="active tab-pane" id="activity">
                     <ul class="list-group list-group-unbordered mb-3">
                      <li class="list-group-item"> 
                        <b>Name.</b> <a class="float-right"> <input type="text" name="" class="form-control" value="{{ $admins->first_name or '' }}"> </a>
                      </li> 
                      <li class="list-group-item"> 
                        <b>Mobile No.</b> <a class="float-right"> <input type="text" name="" class="form-control" value="{{ $admins->mobile or '' }}"> </a>
                      </li>
                       <li class="list-group-item"> 
                        <b>Birthday.</b> <a class="float-right"> <input type="text" name="" class="form-control" value="{{ $admins->dob or '' }}"> </a>
                      </li> <li class="list-group-item"> 
                        <b>Email.</b> <a class="float-right"> <input type="text" name="" class="form-control" value="{{ $admins->email or '' }}"> </a>
                      </li> 
                    </ul> 
                  </div>
                 <div class="tab-pane" id="settings">
                      <form class="form-horizontal add_form" action="{{ route('admin.password.change') }}" method="post">
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
                                  <button type="submit" class="btn btn-danger">Submit</button>
                                </div>
                              </div>
                            </form>

                  </div>
                </div>

              </div>  
          </div>
      </div>
            </section>


          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
    </div>
    <!-- /.row -->
  </section>
  <!-- /.content -->

  @endsection
