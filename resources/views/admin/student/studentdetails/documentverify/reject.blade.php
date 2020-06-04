<div class="modal-dialog"> 
<div class="modal-content">
<div class="modal-header">
<button type="button" id="second_btn_close" class="close" data-dismiss="modal">&times;</button>
<h4 class="modal-title"></h4>
</div>
<div class="modal-body">
<div class="row">
  <div class="col-lg-12 form-group">
    <label>Remark</label>
    <textarea class="form-control" id="remark" name="remark"></textarea> 
  </div>
  <input type="hidden" id="document_id" name="document_id" value="{{ $document_id }}">
  <div class="col-lg-12 form-group text-center">
    <a  class="btn btn-danger" success-popup="true" button-click="second_btn_close" onclick="callAjax(this,'{{ route('admin.document.reject.store') }}'+'?remark='+$('#remark').val()+'&document_id='+$('#document_id').val())">Reject</a>
     
   </div> 
 </div> 
</div> 
</div> 
</div>
 

