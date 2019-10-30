  
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
        <h4 class="modal-title">Template</h4>
      </div>
       <div class="modal-body">
       <div class="form-group">
           <div class="col-sm-12 bd"> 
            <p>Tamplate Name :<b>  {{ $smsTemplates->templateType->name or ''}} </b> </p>  
           </div>
        
       <p style="margin-left:12px">Message : </p>
       <b>{{ $smsTemplates->message }}</b> 
        
          
               
      <!-- /.row -->
          </div>
         
        </div>
     </div>
     
    <!-- /.content -->

 
