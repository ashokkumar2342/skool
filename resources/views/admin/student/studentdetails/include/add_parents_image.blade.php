 
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
        <h4 class="modal-title">Add Parent Image</h4>
      </div>
      <div class="modal-body">
       <div class="row"> 
        <div class="col-md-12"> 
             <form id="parents-form" action="{{ route('admin.parents.image.store') }}"  method="post" button-click="btn_close,parent_info_tab,btn_image_refrash" content-refresh="parents_items" class="add_form" enctype="multipart/form-data">
              {{ csrf_field() }}
                 <div class="col-lg-12">
                  <label>Image</label>
                  <input type="file" class="form-group form-control" name="image" accept=".png, .jpg, .jpeg" /> 
                  <input type="text" hidden="" class="hidden" name="parent_id" value="{{ $parent_id }}"> 
                  </div>
                  <div class="col-lg-12 text-center"> 
                  <input type="submit" class="btn btn-success" style="margin-top: 20px">
                  </div>
            </form>
             
       </div>
    </div>   
  </div>
  </div>
  </div>

                 
   