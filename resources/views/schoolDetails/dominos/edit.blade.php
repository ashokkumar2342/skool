  
  <!-- Main content -->
   
    <style type="text/css" media="screen">
  .bd{
    border-bottom: #eee solid 1px;;
  }
  
</style>
 
  <div class="modal-dialog" style="width:80%">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" id="btn_close" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">School Edit</h4>
      </div>
      <div class="modal-body"> 
             <form action="{{ route('admin.school.dominos.update',$schoolDominos->id) }}" method="post" class="add_form" button-click="btn_quotes_table,btn_close">
                   {{ csrf_field() }}
                    <div class="row">
                    <div class="col-lg-6">
                      <label>School Code</label>
                      <input type="text" name="school_code" class="form-control" placeholder="Enter Code" value="{{ $schoolDominos->school_code }}"> 
                    </div>
                    <div class="col-lg-6">
                      <label>School Name</label>
                      <input type="text" name="school_name" class="form-control" placeholder="Enter Name" value="{{ $schoolDominos->school_name }}"> 
                    </div> 
                    <div class="col-lg-12">
                      <label>School Dominos</label>
                     <textarea  name="school_url" style="width: 100%; height: 50px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">{{ $schoolDominos->school_url }}</textarea> 
                    </div> 
                   <div class="col-lg-12 text-center" style="padding-top: 20px">
                    <input type="submit" class="btn btn-success">
                     
                   </div>
                   </div>
                   
                            
               
                   
                 
                
              </form>
                
          
               
      <!-- /.row -->
          </div>
         
        </div>
      </div>
     
    <!-- /.cont