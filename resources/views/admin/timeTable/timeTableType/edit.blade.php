
     <style type="text/css" media="screen">
  .bd{
    border-bottom: #eee solid 1px;;
  }
  
</style>
 
  <div class="modal-dialog" style="width:90%">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" id="btn_close" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Time Table Type Edit</h4>
      </div>
      <div class="modal-body">
       <div class="row"> 
        <div class="col-md-12">
         <form action="{{ route('admin.time.table.type.update',$timeTableType->id) }}" method="post" class="add_form" button-click="btn_close" content-refresh="datatable">
                            {{ csrf_field() }}
                            <div class="row"> 
                             <div class="col-lg-5">
                               <label>Name</label>
                                 <input type="text" name="name" class="form-control" placeholder="" required="" maxlength="" value="{{ $timeTableType->name }}"> 
                             </div>
                             <div class="col-lg-7">
                               <label>Discription</label>
                                 <textarea class="form-control" name="discription" placeholder="" required="" maxlength="">{{$timeTableType->discription  }}</textarea>
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

 

