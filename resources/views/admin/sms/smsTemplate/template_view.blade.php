  
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
        <h4 class="modal-title">Template</h4>
      </div>
      <div class="modal-body">
        <label>SMS Template</label>
         <textarea class="textarea" name="message" placeholder="Message" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">{{ $SMStemplateView->message }} 
         </textarea>
         <label>Email Template</label> 
         <textarea class="textarea" name="message" placeholder="Message" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">{{ $EmailtemplateView->message }} 
         </textarea> 
         
      </div>  
    </div>
  </div>   
             
     
   