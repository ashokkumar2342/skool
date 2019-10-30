  
  <!-- Main content -->
   
    <style type="text/css" media="screen">
  .bd{
    border-bottom: #eee solid 1px;;
  }
  
</style>
 
  <div class="modal-dialog" style="width:50%">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" id="btn_close" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Template Add</h4>
      </div>
      <div class="modal-body"> 
             <form action="{{ route('admin.sms.template.store') }}" method="post" class="add_form" button-click="btn_outhor_table_show,btn_Homework_table_show,btn_class_test_table_show,btn_class_test_details,btn_time_table_table,btn_time_medical,btn_time_absent_student,btn_close">
                   {{ csrf_field() }}
                   <div class="form-group">
                    <select name="name" class="form-control">
                      
                      @foreach ($templteNames as $templteName)
                      <option value="{{ $templteName->id }}">{{ $templteName->name }}</option>
                        
                      @endforeach
                      
                    </select>
                   
                  </div> 
                  <textarea class="textarea" name="message" placeholder="Message"
                            style="width: 100%; height: 125px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
               
                   <div class="row">
                    <div class="col-lg-12 text-right" style="padding-top: 10px">
                      <input type="submit" class="btn btn-success">
                    </div>
                     
                   </div>
                 
                
              </form>
                
          
               
      <!-- /.row -->
          </div>
         
        </div>
      </div>
     
    <!-- /.content -->

 
