<div class="modal-dialog"> 
<div class="modal-content">
<div class="modal-header">
<button type="button" id="btn_close" class="close" data-dismiss="modal">&times;</button> 
</div>
<div class="modal-body">
 <form action="{{ route('admin.student.CharacterCertificateIssueTakeStore',$CharCertIssueDetails->id) }}" method="post" class="add_form" button-click="btn_close,btn_slc_table_show">
  <div class="row form-group">
    <div class="col-lg-12 form-group">
      <label>Remarks Verify</label>
      <textarea class="form-control" name="remarks" style="height: 100px"></textarea> 
    </div>
    <input type="hidden" name="take" value="0" id="take">
    <div class="col-lg-12 form-group text-center">
      <input type="submit" class="btn btn-primary" value="Verify" onclick="$('#take').val(2)">
      <input type="submit" class="btn btn-danger" value="Reject" onclick="$('#take').val(3)"> 
     </div> 
  </div> 
  </form> 
</div>
</div>
</div>   
