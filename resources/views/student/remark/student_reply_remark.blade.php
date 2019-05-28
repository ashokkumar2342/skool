  
  <!-- Main content -->
   
    <style type="text/css" media="screen">
  .bd{
    border-bottom: #eee solid 1px;;
  }
  
</style>
 
  <div class="modal-dialog" style="width:90%">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Remark Reply</h4>
        <button type="button" id="btn_close" class="close" data-dismiss="modal">&times;</button>
        
      </div>
      <div class="modal-body">
       <div class="row"> 
        <div class="col-md-12"> 
             <form action="{{ route('student.reply.remarks.store',$studentRemarks->id) }}" method="post" class="add_form" button-click="btn_close">
                   {{ csrf_field() }}
                   <div class="row">
                    <div class="col-lg-12">
                      <label>Remark</label>
                      <textarea class="form-control"  name="remark" placeholder=""></textarea>
                       
                    </div> 
                   </div>
                   <div class="row">
                    <div class="col-lg-12 text-center" style="padding-top: 10px">
                      <input type="submit" class="btn btn-success">
                    </div> 
                   </div>
                   <table class="table datatablepopup table" id="student_reply_remark_data_table"> 
                     <thead>
                       <tr>
                         <th>Date</th>
                         <th>Remark</th>
                       </tr>
                     </thead>
                     <tbody>
                      @foreach ($studentReplyremarks as $studentReplyremark)
                         
                             <tr>
                               <td>{{ date('d-m-Y',strtotime( $studentReplyremark->created_at)) }}</td>
                               <td>{{ $studentReplyremark->remark }}</td>
                             </tr>
                      @endforeach
                     </tbody>
                   </table>
                 
                
              </form>
                
            </div>   
               
      <!-- /.row -->
          </div>
         
        </div>
      </div>
    </div>

     
    <!-- /.content -->

 
