  
  <!-- Main content -->
   
    <style type="text/css" media="screen">
  .bd{
    border-bottom: #eee solid 1px;;
  }
  
</style>
 
  <div class="modal-dialog" style="width:30%">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" id="btn_close" class="close" data-dismiss="modal">&times;</button>
         
      </div>
      <div class="modal-body"> 
              <form action="{{ route('admin.profile.photo.upload') }}" method="post" class="add_form" enctype="multipart/form-data" button-click="btn_close">
                   {{ csrf_field() }}
                   <div class="row">
                    <div class="col-lg-12">
                      
                      <input type="file" name="profile_photo"> 
                    </div> 
                   </div>
                   <div class="row">
                    <div class="col-lg-12 text-center" style="padding-top: 10px">
                      <input type="submit" value="Upload" class="btn btn-success">
                    </div> 
                   </div>
                 
                
              </form> 
          </div>
         
        </div>
      </div>
     
    <!-- /.content -->

 
