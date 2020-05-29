  
  <div class="modal-dialog" >

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" id="btn_close" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Signature Stamp Add</h4>
      </div>
      <div class="modal-body"> 
             <form action="{{ route('admin.signature.stamp.store') }}" method="post" class="add_form" button-click="btn_event_type_table_show,btn_close">
                   {{ csrf_field() }}
                    <div class="row"> 
                      <div class="form-group col-lg-6">
                        <label>User Name</label>
                        <select name="user_id" class="form-control select2">
                          <option selected disabled>Select User</option>
                          @foreach ($admins as $admin)
                          @if ($admin->role_id!=12) 
                            <option value="{{ $admin->id }}">{{ $admin->first_name }}</option>
                          @endif
                           @endforeach 
                        </select> 
                      </div>
                      <div class="form-group col-lg-6">
                        <label>Certificate Type</label>
                        <select name="certificate_type_id" class="form-control">
                          <option  selected disabled>Select Certificate</option>
                          @foreach ($CertificateTypes as $CertificateType)
                             <option value="{{ $CertificateType->id }}">{{ $CertificateType->name}}</option>   
                          @endforeach  
                        </select> 
                      </div>
                      <div class="form-group col-lg-6">
                        <label>Signature</label>
                        <input type="file" name="signature" class="form-control"> 
                      </div>
                      <div class="form-group col-lg-6">
                        <label>Stamp</label>
                        <input type="file" name="stamp" class="form-control"> 
                      </div>
                      <div class="form-group col-lg-6">
                        <label>Destination</label>
                        <input type="text" name="destination" class="form-control" maxlength="50"> 
                      </div> 
                     <div class="form-group col-lg-6">
                        <label>Issue User Type</label>
                        <select name="stamp_type" class="form-control">
                          <option selected disabled>Select Option</option> 
                            @foreach ($IssueAthortiTypes as $IssueAthortiType)
                             <option value="{{ $IssueAthortiType->id }}">{{ $IssueAthortiType->name}}</option>   
                          @endforeach  
                        </select> 
                      </div>
                       <div class="form-group col-lg-6">
                        <label>From Date</label>
                        <input type="date" name="from_date" class="form-control"> 
                      </div> 
                      <div class="form-group col-lg-6">
                        <label>To Date</label>
                        <input type="date" name="to_date" class="form-control"> 
                      </div> 
                    <div class="col-lg-12 text-center" style="padding-top: 10px">
                      <input type="submit" class="btn btn-success">
                    </div> 
                   </div> 
              </form>
                
            </div> 
        </div>
      </div>

     
    <!-- /.content -->

 
