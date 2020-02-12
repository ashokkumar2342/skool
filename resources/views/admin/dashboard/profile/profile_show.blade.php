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
               
                <div class="">
                  <div class="box-body box-profile">
                    {{-- <img src="{{ url('storage/public/profile/'.'admin01-08-20191564664767.jpg') }}"  title="" width="50" height="50" /> --}}
                    @php
                      $profile = route('admin.profile.photo.show',$admins->profile_pic);
                    
                    @endphp
                   <img  src="{{ ($admins->profile_pic)? $profile : asset('profile-img/user.png') }}" class="profile-user-img img-responsive img-circle">
                  


                   {{--  <img class="profile-user-img img-responsive img-circle" src="{{ url('storage/profile/'.$admins->profile_pic) }}">
 --}}
                    <h3 class="profile-username text-center">{{ $admins->first_name or '' }}</h3>

                     
                    <button  id="btn_upload_photo" style="margin-left: 35%" class="btn btn-primary btn-xs" crop-image="upload-demo" onclick="callPopupLarge(this,'{{ route('admin.profile.photo') }}')">Upload Photo</button>

                     
                  </div> 
                </div> 
              </div> 
              <div class="col-md-9">
                <div class="nav-tabs-custom">
                  <ul class="nav nav-tabs">
                    <li class="active"><a href="#activity" id="profile_tab" data-toggle="tab">Profile Info</a></li>

                    <li><a href="#settings" data-toggle="tab">Change Password</a></li>
                  </ul>
              <form action="{{ route('admin.profile.update') }}" method="post" class="add_form" button-click="btn_profile_show,admin_photo_refrash">
              {{ csrf_field() }} 
                  <div class="tab-content">
                    <div class="active tab-pane" id="activity">
                     <ul class="list-group list-group-unbordered mb-3">
                      <li class="list-group-item"> 
                        <b>Name</b> <a class="float-right"> <input type="text" name="first_name" class="form-control" id="first_name" maxlength="50" value="{{ $admins->first_name or '' }}"> </a>
                      </li> 
                      <li class="list-group-item"> 
                        <b>Mobile.No.</b> <a class="float-right"> <input type="text" name="mobile" class="form-control" value="{{ $admins->mobile or '' }}"  maxlength="10" onkeypress='return event.charCode >= 48 && event.charCode <= 57' > </a>
                      </li>
                       <li class="list-group-item"> 
                        <b>Date of Birth</b> <a class="float-right"> <input type="date" name="dob" class="form-control" value="{{ $admins->dob }}"> </a>
                      </li> <li class="list-group-item"> 
                        <b>Email</b> <a class="float-right"> <input type="email" name="email" class="form-control" value="{{ $admins->email or '' }}" maxlength="50"> </a>
                      </li> 
                    </ul>
                     <input type="submit" value="Update" class="btn btn-success" style="margin-left: 350px">
                  </div> 
              </form>
                 <div class="tab-pane" id="settings">
                      <form class="form-horizontal add_form" action="{{ route('admin.password.change') }}" method="post">
                              {{ csrf_field() }}
                              <div class="form-group">
                                <label  class="col-sm-4 control-label">Old Password</label>

                                <div class="col-sm-8">
                                  <input type="password" class="form-control" name="old_password" maxlength="15" min="6">
                                </div>
                              </div>
                              <div class="form-group">
                                <label for="inputEmail" class="col-sm-4 control-label">New Password</label>

                                <div class="col-sm-8">
                                  <input type="password" class="form-control" name="password" id="password" maxlength="15" min="6">
                                </div>
                              </div>
                              <div class="form-group">
                                <label for="password" class="col-sm-4 control-label">Confirm Password</label>

                                <div class="col-sm-8">
                                  <input type="password" class="form-control" name="confirm_password" id="confirm_password" maxlength="15" min="6">
                                </div>
                              </div> 
                              <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-10 text-center">
                                  <button type="submit" class="btn btn-success">Submit</button>
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