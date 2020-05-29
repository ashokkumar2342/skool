  
    <style type="text/css" media="screen">
  .bd{
    border-bottom: #eee solid 1px;;
  }
  
</style>
 
  <div class="modal-dialog" style="width:80%"> 
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" id="btn_close" class="close" data-dismiss="modal">&times;</button>
         
      </div>
      <div class="modal-body"> 
        <div class="panel panel-default">
          <div class="panel-heading">Approval/Reject</div>
          <div class="panel-body">
             
        <div class="row">
             <form action="{{ route('admin.attendance.leave.verify.store',@$leaveRecord->id) }}" method="post" accept-charset="utf-8" button-click="btn_click_list_show,btn_close">
                   {{ csrf_field() }}
                   <table class="table">
                     <thead>
                       <tr>
                         <th>Student Name</th>
                         <th>Registration No.</th>
                         <th>Father's Name</th>
                         <th>Mother's Name</th>
                         <th>Class</th>
                         <th>Section</th>
                       </tr>
                     </thead>
                     <tbody>
                       <tr>
                         <td>{{ $student->name or ''}}</td>
                         <td>{{ $student->registration_no or ''}}</td>
                         <td>{{ $student->parents[0]->parentInfo->name or ''}}</td>
                         <td>{{ $student->parents[1]->parentInfo->name or ''}}</td>
                         <td>{{ $student->classes->name or '' }}</td>
                         <td>{{ $student->sectionTypes->name or '' }}</td>
                       </tr>
                     </tbody>
                   </table>
                   <div class="col-lg-12"> 
                     <div class="form-group">
                      <label>Remark</label>
                      <textarea class="textarea" name="remark" 
                                style="width: 100%; height: 70px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"> 
                      </textarea>
                    </div>
                    <input type="hidden" name="action" id="action" value="0">
                  <div class="col-lg-12 form-group text-center">
                       <input type="submit" class="btn btn-success" value="Approval" onclick="$('#action').val(1)">  
                       <input type="submit" class="btn btn-danger" value="Reject" onclick="$('#action').val(2)">   
                  </div>    
                  </div> 
              </form>
              </div>         
          </div>
        </div>
      </div>
    </div>
  </div>
            
        

     
    <!-- /.content -->

 
