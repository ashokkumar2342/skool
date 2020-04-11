  
  
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" id="btn_close" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title"> {{ @$guardianRelationType->id? 'Edit' : 'Add'}} Guardian</h4>
      </div>
      <div class="modal-body">
       <div class="row"> 
        <div class="col-md-12"> 
             <form action="{{ route('admin.guardian.update',@$guardianRelationType->id) }}" method="post" class="add_form" content-refresh="guardianRelationTypes" button-click="btn_close">
                   {{ csrf_field() }}
                   <div class="row">
                    <div class="col-lg-6 form-group"> 
                     <label>Guardian Type</label>
                     <input type="text" name="name" class="form-control" value="{{ @$guardianRelationType->name }}" maxlength="50" placeholder="Enter Guardian Type">        
                    </div>
                    <div class="col-lg-6 form-group"> 
                     <label>Code</label>
                     <input type="text" name="code" class="form-control" value="{{ @$guardianRelationType->code }}" maxlength="5" placeholder="Enter Code">        
                    </div> 
                   </div>
                   <div class="row">
                    <div class="col-lg-12 text-center" style="padding-top: 10px">
                      <input type="submit"  class="btn btn-success">
                    </div>
                     
                   </div>
                 
                
              </form>
                
            </div>   
               
      <!-- /.row -->
          </div>
         
        </div>
      </div>
     
    <!-- /.content -->

 
