  
  <div class="modal-dialog" >

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" id="btn_close" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">{{ @$signatureStamps->id?'Edit':'Add' }} Signature Stamp </h4>
      </div>
      <div class="modal-body"> 
             <form action="{{ route('admin.signature.stamp.store',@$signatureStamps->id) }}" method="post" class="add_form" button-click="btn_event_type_table_show,btn_close">
                   {{ csrf_field() }}
                    <div class="row"> 
                      <div class="form-group col-lg-6">
                        <label>User Name</label>
                        <select name="user_id" class="form-control select2">
                          <option selected disabled>Select User</option>
                          @foreach ($admins as $admin)
                          @if ($admin->role_id!=12) 
                            <option value="{{ $admin->id }}"{{ @$signatureStamps->user_id==$admin->id?'selected':'' }}>{{ $admin->first_name }}</option>
                          @endif
                           @endforeach 
                        </select> 
                      </div>
                      <div class="form-group col-lg-6">
                        <label>Certificate Type</label>
                        <select name="certificate_type_id" class="form-control">
                          <option  selected disabled>Select Certificate</option>
                          @foreach ($CertificateTypes as $CertificateType)
                             <option value="{{ $CertificateType->id }}"{{ @$signatureStamps->certificate_type_id==$CertificateType->id?'selected':'' }}>{{ $CertificateType->name}}</option>   
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
                        <input type="text" name="destination" class="form-control" maxlength="50" value="{{ @$signatureStamps->destination }}"> 
                      </div> 
                     <div class="form-group col-lg-6">
                        <label>Issue User Type</label>
                        <select name="issue_user_type" class="form-control">
                          <option selected disabled>Select Option</option> 
                            @foreach ($IssueAthortiTypes as $IssueAthortiType)
                             <option value="{{ $IssueAthortiType->id }}"{{ @$signatureStamps->stamp_type==$IssueAthortiType->id?'selected':'' }}>{{ $IssueAthortiType->name}}</option>   
                          @endforeach  
                        </select> 
                      </div>
                       <div class="form-group col-lg-6">
                        <label>From Date</label>
                        <input type="date" name="from_date" class="form-control" value="{{ @$signatureStamps->from_date}}"> 
                      </div> 
                      <div class="form-group col-lg-6">
                        <label>To Date</label>
                        <input type="date" name="to_date" class="form-control" value="{{ @$signatureStamps->to_date}}"> 
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

 
