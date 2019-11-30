  
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
        <h4 class="modal-title">Email Template Add</h4>
      </div>
      <div class="modal-body"> 
        <div class="row">
          <form action="{{ route('admin.email.template.store',$messagePurposes->id) }}" method="post" class="add_form" button-click="btn_close" select-triger="message_purpose_box">
                {{ csrf_field() }}
                
                  <div class="col-md-12">
                     <div class="form-group">
                     <input type="text" name="subject" class="form-control" maxlength="100" placeholder="Subject">
                      
                    </div>
                  </div>
                  <div class="col-md-12">
                     <div class="form-group">
                    <textarea class="textarea summernote" name="message" placeholder="Message"
                         style="width: 100%; height: 125px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                      
                    </div>
                  </div>
                  <div class="col-lg-12 text-right" style="padding-top: 10px">
                    <input type="submit" class="btn btn-success">
                  </div>
                  </form>
              </div>  
           
        </div>
             
                
          
               
      <!-- /.row -->
          </div>
         
        </div>
      </div>
     
    <!-- /.content -->

 
