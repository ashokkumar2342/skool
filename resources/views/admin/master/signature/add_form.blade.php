  
  <div class="modal-dialog" >

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" id="btn_close" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">{{ @$signatureStamps->id?'Edit':'Add' }} Signature Stamp </h4>
      </div>
      <div class="modal-body"> 
             <form action="{{ route('admin.signature.stamp.store',@$signatureStamps->id) }}" method="post" class="add_form" button-click="btn_stamp_table_show,btn_close">
                   {{ csrf_field() }}
                    <div class="row"> 
                      <div class="form-group col-lg-6">
                        <label>Employee</label><br>
                        <select name="employee" class="form-control select2" {{ @$signatureStamps->id?'disabled':'' }}>
                          <option selected disabled>Select User</option>
                          @foreach ($Employees as $Employee)
                          @if ($Employee->role_id!=12) 
                            <option value="{{ $Employee->id }}"{{ @$signatureStamps->emp_id==$Employee->id?'selected':'' }}>{{ $Employee->name }}</option>
                          @endif
                           @endforeach 
                        </select> 
                      </div>
                      <div class="form-group col-lg-6">
                        <label>Designation</label>
                        <input type="text" name="designation" class="form-control" maxlength="50" value="{{ @$signatureStamps->Designation }}"> 
                      </div>
                      <div class="form-group col-lg-6">
                        <label>Certificate Type</label>
                        <select name="certificate_type" class="form-control" {{ @$signatureStamps->id?'disabled':'' }}>
                          <option  selected disabled>Select Certificate</option>
                          @foreach ($CertificateTypes as $CertificateType)
                             <option value="{{ $CertificateType->id }}"{{ @$signatureStamps->certificate_type_id==$CertificateType->id?'selected':'' }}>{{ $CertificateType->name}}</option>   
                          @endforeach  
                        </select> 
                      </div>
                      <div class="form-group col-lg-6">
                        <label>Authority Type</label>
                        <select name="authority_type" class="form-control" {{ @$signatureStamps->id?'disabled':'' }}>
                          <option selected disabled>Select Option</option> 
                            @foreach ($IssueAthortiTypes as $IssueAthortiType)
                             <option value="{{ $IssueAthortiType->id }}"{{ @$signatureStamps->authority_type_id==$IssueAthortiType->id?'selected':'' }}>{{ $IssueAthortiType->name}}</option>   
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
                        <label>From Date</label>
                        <input type="date" name="from_date" class="form-control" value="{{ @$signatureStamps->from_date}}" {{ @$signatureStamps->id?'disabled':'' }}> 
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

 
