  
  <!-- Main content -->
   
    <style type="text/css" media="screen">
  .bd{
    border-bottom: #eee solid 1px;;
  }
  
</style>
 
  <div class="modal-dialog" style="width:70%">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" id="btn_close" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Remark Add</h4>
      </div>
      <div class="modal-body">
       <div class="row"> 
        <div class="col-md-12"> 
             <form action="{{ route('admin.student.remark.detail.store',$student->id) }}" method="post" class="add_form" button-click="btn_close">
                   {{ csrf_field() }}
                   <div class="row ">
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
                 
                
              </form>
              <hr>
              <table class="table datatablepopup" id="student_remark_data_table"> 
                <thead>
                  <tr>
                    <th>Date</th>
                    <th>Name</th>
                    <th>Remark</th>
                    
                  </tr>
                </thead>
                <tbody>
                  @foreach ($studentRemarks as $studentRemark)
                        <tr>
                           <td>{{ date('d-m-Y', strtotime( $studentRemark->created_at)) }}</td>
                          <td>{{ $studentRemark->admin->first_name }}</td> 
                          <td>{{ $studentRemark->remark }}</td>
                          
                        </tr> 
                  @endforeach
                </tbody>
              </table>
                
            </div>   
               
      <!-- /.row -->
          </div>
         
        </div>
      </div>
     
    <!-- /.content -->

 
