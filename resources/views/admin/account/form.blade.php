@extends('admin.layout.base')
@section('body')
    
    <section class="content">

      <div class="row">
        <div class="col-xs-12">          
            <!-- /.box-header -->            
          <div class="box">
            <div class="box-header"> 
              <h3 class="box-title">New User</h3>
              
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <form action="{{ route('admin.account.post') }}" method="post" class="add_form" >
                {{ csrf_field() }}
                    <div class="box-body">
                        <div class="row">
                            <div class="col-lg-3">
                                <div class="form-group">
                                  <label for="exampleInputEmail1">First Name</label>
                                  <span class="fa fa-asterisk"></span>
                                  <input Name="first_name" class="form-control"  placeholder="Enter First Name" required="" maxlength="50">
                                </div>                                
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group">
                                  <label for="exampleInputEmail1">Last Name</label>
                                  
                                  <input Name="last_name" class="form-control"  placeholder="Enter Last Name" maxlength="50">
                                </div>                                
                            </div>
                            <div class="col-lg-6">
                               <div class="form-group">
                                 <label>Role</label>
                                 <span class="fa fa-asterisk"></span>
                                 <select class="form-control" name="role_id">
                                 @foreach($roles as $role)
                                   <option value="{{ $role->id }}">{{ $role->name }}</option>
                                  @endforeach 
                                {{--    <option value="2">Principle</option>
                                   <option value="3">Teacher</option>
                                   <option value="4">Staff</option>
 --}}                                 </select>
                                </div>                               
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                  <label for="exampleInputEmail1">Email Id</label>
                                  <span class="fa fa-asterisk"></span>
                                  <input type="email" name="email" class="form-control" id="exampleInputEmail1" placeholder="Enter Email" maxlength="50">
                                </div>                                
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                  <label for="Password">Password (Min 6 Max 15 Characters )</label>
                                  <span class="fa fa-asterisk"></span>
                                  <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password" maxlength="15" min="6">
                                </div>                               
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                  <label for="exampleInputEmail1">Mobile No.</label>
                                  <span class="fa fa-asterisk"></span>
                                  <input type="text" Name="mobile" class="form-control" maxlength="10" onkeypress='return event.charCode >= 48 && event.charCode <= 57' placeholder="Enter Mobile No.">
                                </div>                                
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                  <label for="exampleInputEmail1">Date Of Birth</label>
                                  <span class="fa fa-asterisk"></span>
                                  {{ Form::date('dob','',['class'=>'form-control', 'placeholder'=>'','required']) }} 
                                </div>                                
                            </div>
                        </div>                     
                                        
                    <!-- /.box-body -->
                    <div class="box-footer text-center">
                      <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->

@endsection
@push('links')
<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.css" />
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.4.1/css/buttons.dataTables.min.css">
@endpush
 @push('scripts')
 <script type="text/javascript" src="//cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
 <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>  
 <script> 
 $( function() {
    $( "#dob" ).datepicker({dateFormat:'dd-mm-yy'});
  
});  

 </script>

@endpush