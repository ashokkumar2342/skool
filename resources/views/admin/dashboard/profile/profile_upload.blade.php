  
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" id="btn_close" class="close" data-dismiss="modal">&times;</button>
         
      </div>
      <div class="modal-body">              
           <div class="row">
            <div class="col-lg-12">
               <div id="upload-demo"></div>
               <div class="text-center">
                 <input type="file" name="profile_photo" onchange="imageBind(this)" class="form-control"> 
               </div> 
            </div> 
           </div>
           <div class="row">
            <div class="col-lg-12 text-center" style="padding-top: 10px"> 
              <button type="button"   class="btn btn-primary" onclick="imageUpload('{{ route('admin.profile.photo.upload') }}','btn_profile_show,btn_close')">Save</button>
            </div> 
           </div>               
              
          </div>
         
        </div>
      </div>
     
    <!-- /.content -->

 
