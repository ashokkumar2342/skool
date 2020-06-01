  
  <div class="modal-dialog" >

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" id="btn_close" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title"></h4>
      </div>
      <div class="modal-body"> 
             <form action="{{ route('admin.signature.stamp.report.generate') }}" method="post"  target="blank" button-click="btn_close">
                   {{ csrf_field() }}
                    <div class="row">  
                      <div class="form-group col-lg-6">
                        <label>Certificate Type</label>
                        <select name="certificate_type" class="form-control">
                          <option  selected disabled>Select Certificate</option>
                          @foreach ($CertificateTypes as $CertificateType)
                             <option value="{{ $CertificateType->id }}">{{ $CertificateType->name}}</option>   
                          @endforeach  
                        </select> 
                      </div>
                      <div class="form-group col-lg-6">
                        <label>Authority Type</label>
                        <select name="authority_type" class="form-control">
                          <option selected disabled>Select Option</option> 
                            @foreach ($IssueAthortiTypes as $IssueAthortiType)
                             <option value="{{ $IssueAthortiType->id }}">{{ $IssueAthortiType->name}}</option>   
                          @endforeach  
                        </select> 
                      </div>
                       
                    <div class="col-lg-12 text-center" style="padding-top: 10px">
                      <input type="submit" value="Report Generate" class="btn btn-primary">
                    </div> 
                   </div> 
              </form>
                
            </div> 
        </div>
      </div>

     
    <!-- /.content -->

 
