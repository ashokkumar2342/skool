<div class="modal-dialog"> 
<div class="modal-content">
<div class="modal-header">
<button type="button" id="btn_close" class="close" data-dismiss="modal">&times;</button>
<h4 class="modal-title"></h4>
</div>
<div class="modal-body">
<div class="row"> 
<div class="col-md-12 form-group">  
  <form action="{{ route('admin.staff.teacher.mapping.report.generate') }}" method="post" target="blank">
  {{ csrf_field() }} 
<div class="col-lg-6 form-group">
  <label>Report Type</label>
  <select name="report_type" class="form-control">
    <option value="1">Teacher Wise</option> 
    <option value="2">Class/Section Wies</option> 
    <option value="3">Teacher Not Assign Any Class</option> 
    <option value="4">Class Not Assign Any Teacher</option> 
  </select> 
 </div>
 <div class="col-lg-6">
   <input type="submit" class="btn btn-primary form-control" style="margin-top:24px " value="Report Generate">
  </div> 
</form>
</div>
</div>
</div>
</div>
</div> 

