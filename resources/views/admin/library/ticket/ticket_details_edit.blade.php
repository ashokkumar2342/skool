
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
        <h4 class="modal-title">Tickets Details Edit</h4>
      </div>
      <div class="modal-body">
       <div class="row"> 
        <div class="col-md-12">
          <form action="{{ route('admin.library.ticket.details.update',$tickets->id) }}" method="post" class="add_form" button-click="btn_ticket_details_table_show,btn_close">
                   {{ csrf_field() }}
                   <div class="row"> 
                    <div class="col-lg-6">
                      <label>Tickets Name</label>
                      <input type="text" name="ticket_name" class="form-control" placeholder="" maxlength="50" value="{{ $tickets->name }}"> 
                    </div>  
                    <div class="col-lg-6">
                      <label>No of Days</label>
                      <input type="text" name="no_of_days" class="form-control" placeholder="" maxlength="7" value="{{ $tickets->days }}"> 
                    </div> 
                  </div>
                   <div class="row">
                    <div class="col-lg-12 text-center" style="padding-top: 10px">
                      <input type="submit" value="Update" class="btn btn-success">
                    </div>
                     
                   </div>
                 
                
              </form>
            </div>   
              
      <!-- /.row -->
          </div>
          
        </div>
      </div>
   </div>

    <!-- /.content -->

 

